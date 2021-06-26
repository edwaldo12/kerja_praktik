<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\DetailOrder;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orders'] = Order::with(['customer'])->get();
        for ($i = 0; $i < count($data['orders']); $i++) {
            $product = Product::where(['id' => $data['orders'][$i]['product_id']])
                ->withTrashed()
                ->first();
            $data['orders'][$i]['is_product_deleted'] = !empty($product->deleted_at);
        }
        return view('orders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['customers'] = Customer::all();
        $data['products'] = Product::all();
        return view('orders.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestOrder = $request->order;
        $requestOrder['fk_id'] = Auth::user()->id;
        $total = 0;
        foreach ($request->detailOrder as $detail) {
            $total += $detail['subtotal'];
        }
        $requestOrder['total_harga_dibayar'] = $total;
        $order = Order::create($requestOrder);
        foreach ($request->detailOrder as $detail) {
            $product = Product::find($detail['id_produk']);
            $product->stocks = $product->stocks - $detail['jumlah_pesanan'];
            $product->save();
            DetailOrder::create([
                'fk_order' => $order->id,
                'fk_produk' => $detail['id_produk'],
                'jumlah_pesanan' => $detail['jumlah_pesanan'],
                'harga_barang' => $detail['harga_barang'],
                'sub_total' => $detail['subtotal']
            ]);
        }
        $response = [
            "success" => true
        ];
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['products'] = Product::get();
        $data['order'] = Order::with(['customer'])->find($id);
        $detailOrder = DetailOrder::where(['fk_order' => $id])->get();
        $data['detailOrder'] = [];
        for ($i = 0; $i < count($detailOrder); $i++) {
            array_push($data['detailOrder'], [
                'id_detailOrder' => $detailOrder[$i]['id'],
                'id_produk' => $detailOrder[$i]['fk_produk'],
                'nama_produk' => Product::withTrashed()->find($detailOrder[$i]['fk_produk'])->nama_produk,
                'jumlah_pesanan' => $detailOrder[$i]['jumlah_pesanan'],
                'harga_barang' => $detailOrder[$i]['harga_barang'],
                'subtotal' => $detailOrder[$i]['sub_total']
            ]);
        }
        $data['detailOrder'] = json_encode($data['detailOrder']);
        return view('orders.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response    
     */
    public function update(Request $request, Order $order)
    {
        $total = 0;

        foreach ($request->detailOrder as $detail) {
            $total += $detail['subtotal'];
        }
        $order->total_harga_dibayar = $total;
        $order->save();

        $detailOrder = DetailOrder::where(['fk_order' => $order->id])->get();


        // $response = [
        //     "success" => $request->detailOrder
        // ];
        // return response()->json($response);

        foreach ($detailOrder as $d) {
            $product = Product::withTrashed()->find($d->fk_produk);
            $product->stocks += $d->jumlah_pesanan;
            $product->save();
            $d->delete();
        }

        foreach ($request->detailOrder as $detail) {
            DetailOrder::create([
                'fk_order' => $order->id,
                'fk_produk' => $detail['id_produk'],
                'jumlah_pesanan' => $detail['jumlah_pesanan'],
                'harga_barang' => $detail['harga_barang'],
                'sub_total' => $detail['subtotal']
            ]);
        }

        $response = [
            "success" => true
        ];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $detailOrder = DetailOrder::where([
            'fk_order' => $order->id
        ])->get();
        foreach ($detailOrder as $detail) {
            $product = Product::withTrashed()->find($detail['fk_produk']);
            $product->stocks += $detail['jumlah_pesanan'];
            $product->save();
        }

        $order->delete();
        return redirect()->route('orders.index')->with('Status', 'Data Order Berhasil Dihapus');
    }

    public function checkStock($id)
    {
        $produk = Product::find($id);
        return response()->json($produk);
    }

    public function confirmAdmin($id)
    {
        $order = Order::find($id);
        $order->status = '2';

        Session::flash('edit', $order->save());
        return redirect()->route('orders.index')->with('Status', 'Data Pesanan Berhasil Dikonfirmasi');
    }

    public function processOrders($id)
    {
        $order = Order::find($id);
        $order->status = '3';

        Session::flash('edit', $order->save());
        return redirect()->route('orders.index')->with('Status', 'Data Pesanan Berhasil Diproses');
    }

    public function onDelivery($id)
    {
        $order = Order::find($id);
        $order->status = '4';

        Session::flash('edit', $order->save());
        return redirect()->route('orders.index')->with('Status', 'Data Pesanan Dikirim');
    }

    public function confirm($id)
    {
        $order = Order::find($id);
        $order->status = '5';

        Session::flash('edit', $order->save());
        return redirect()->route('orders.index')->with('Status', 'Data Pesanan Berhasil Diubah');
    }

    public function hapusPesananUser($id)
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
        return redirect()->route('orders.index')->with('Status', 'Pesanan Berhasil Dibatalkan');
    }
}
