<?php

namespace App\Http\Controllers;

use App\Carts;
use App\Customer;
use App\DetailOrder;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function addCart(Request $request)
    {
        $carts = Session::get('carts', []);
        $product = Product::find($request->cart['id']);

        $is_exist = false;
        foreach ($carts as $i => $cart) {
            if ($cart['id'] == $request->cart['id']) {
                $jumlah = $carts[$i]['jumlah_pesanan'] + $request->cart['jumlah_pesanan'];
                if ($jumlah > $product->stocks) {
                    return response()->json(['message' => "Jumlah pesanan ditambah dengan yang ada dikeranjang tidak cukup!"]);
                } else {
                    $carts[$i]['jumlah_pesanan'] = $jumlah;
                    $is_exist = true;
                }
            }
        }

        if (!$is_exist) {
            $cart = $request->cart;
            $cart['stocks'] = $product->stocks;
            array_push($carts, $cart);
        }

        Session::put("carts", $carts);

        return response()->json($carts);
    }

    function index()
    {
        $data['carts'] = json_encode(Session::get('carts', []));
        return view('CompanyProfile/carts', $data);
    }

    function getCart()
    {
        $data['carts'] = Session::get('carts', []);
        return response()->json($data);
    }

    function removeCart($id)
    {
        $carts = Session::get('carts', []);
        foreach ($carts as $i => $cart) {
            if ($cart['id'] == $id) {
                array_splice($carts, $i, 1);
            }
        }
        Session::put('carts', $carts);
        // ada ubah di sini dari ->getCart() menjadi index();
        return $this->index();
    }

    function cartPlus($id, $jumlah_pesanan)
    {
        $carts = Session::get('carts', []);
        foreach ($carts as $i => $cart) {
            if ($cart['id'] == $id) {
                $carts[$i]['jumlah_pesanan'] = $jumlah_pesanan;
            }
        }
        Session::put('carts', $carts);
    }

    function cartMin($id, $jumlah_pesanan)
    {
        $carts = Session::get('carts', []);
        foreach ($carts as $i => $cart) {
            if ($cart['id'] == $id) {
                $carts[$i]['jumlah_pesanan'] = $jumlah_pesanan;
            }
        }
        Session::put('carts', $carts);
    }
    function payCart()
    {
        return view('CompanyProfile/checkout');
    }
    function paid(Request $request)
    {
        $request->validate([
            'number'    => 'required|numeric',
            'address'   => 'required'
        ]);

        $order = new Order;
        $order->fk_customer = session()->get('customer')->id;
        $order->nomor_telepon_pemesan = $request->number;
        $order->alamat = $request->address;
        $total = 0;
        $order->total_harga_dibayar = $total;
        $order->save();

        foreach (Session::get('carts') as $detail) {
            DetailOrder::create([
                'fk_order' => $order->id,
                'fk_produk' => $detail['id'],
                'jumlah_pesanan' => $detail['jumlah_pesanan'],
                'harga_barang' => $detail['harga_produk'],
                'sub_total' => $detail['harga_produk'] * $detail['jumlah_pesanan']
            ]);
            $total += $detail['harga_produk'] * $detail['jumlah_pesanan'];
        }
        $order->total_harga_dibayar = $total;
        $order->save();

        Session::forget('carts');
        return redirect()->route('viewconfirmation', ['id' => $order->id]);
    }
    public function viewConfirmation($id)
    {
        $order = Order::find($id);
        return view('CompanyProfile/confirmation', compact('id', 'order'));
    }

    function confirmation(Request $request, $id)
    {
        $request->validate([
            'upload_file' => 'required|file|image|mimes:png,jpeg,gif,jpg|max:4096'
        ]);

        $detailOrders = Order::find($id)->detailOrders()->get();

        foreach ($detailOrders as $detailOrder) {
            $product = Product::withTrashed()->find($detailOrder->fk_produk);
            $product->stocks = $product->stocks - $detailOrder['jumlah_pesanan'];
            $product->save();
        }

        $foto = $request->file('upload_file');
        $bukti = "Bukti_Pembayaran";
        $name = $bukti . time() . "." . $foto->getClientOriginalExtension();
        $foto->move('upload_bukti_pembayaran', $name);
        $pembayaran = Order::find($id);
        $pembayaran->upload_file = $name;
        $pembayaran->status = '1';
        Session::flash('upload', $pembayaran->save());

        return redirect()->route('home')->with('Status', 'Telah melakukan konfirmasi , kami akan menghubungi anda dalam waktu 2x24 jam.');
    }

    function showHistory()
    {
        $order = Order::where(['fk_customer' => Session::get('customer')->id])->get();

        foreach ($order as $o) {
            if (time() - strtotime($o->created_at) > 60 * 60 * 24) {
                $o->status = '6';
                $o->save();
            }
        }
        $order = Order::with(['detailOrders', 'detailOrders.product'])->where(['fk_customer' => Session::get('customer')->id])->orderBy('created_at', 'DESC')->withTrashed()->paginate(6);
        return view('CompanyProfile/showHistory', compact('order'));
    }

    function showDetailOrder($fk_order)
    {
        $order['pesanan'] = Order::with('detailOrders', 'detailOrders.product')->find($fk_order);
        return view('CompanyProfile/carts_customer', $order);
    }

    public function cancelOrder($id)
    {
        $order = Order::find($id);
        $order->status = '6';

        $detailOrder = DetailOrder::where([
            'fk_order' => $order->id
        ])->get();
        foreach ($detailOrder as $detail) {
            $product = Product::withTrashed()->find($detail['fk_produk']);
            $product->stocks += $detail['jumlah_pesanan'];
            $product->save();
        }
        Session::flash('edit', $order->save());
        return redirect()->route('customer.history')->with('Status', 'Pesanan Dibatalkan');
    }
}
