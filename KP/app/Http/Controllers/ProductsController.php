<?php

namespace App\Http\Controllers;

use App\DetailOrder;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with(['user'])->withTrashed()->get();

        for ($i = 0; $i < count($data['products']); $i++) {
            $data['products'][$i]['jumlah_pesanan_terkait'] = DetailOrder::where(['fk_produk' => $data['products'][$i]['id']])->count();
        }
        // $data['products'] = Product::with(['user'])->withTrashed()->get();

        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk'          => ['required', 'unique:products'],
            'stocks'               => ['required', 'min:1'],
            'deskripsi'            => 'required',
            'foto'                 => 'required|file|image|mimes:jpeg,png,gif,webp,jpg|max:4096',
            'harga_produk'         => 'required'
        ]);

        $foto = $request->file('foto');
        $name = $request->nama_produk . "_" . time() . "." . $foto->getClientOriginalExtension();
        $foto->move('upload_products', $name);

        $products = new Product;
        $products->nama_produk = $request->nama_produk;
        $products->stocks = $request->stocks;
        $products->deskripsi = $request->deskripsi;
        $products->foto = $name;
        $products->fk_user = Auth::User()->id;
        $products->harga_products = $request->harga_produk;


        Session::flash('add', $products->save());
        return redirect()->route('products.index')->with('Status', 'Data Product Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_produk'          => ['required', 'unique:products'],
            'stocks'               => ['required', 'min:1'],
            'deskripsi'            => 'required',
            'foto'                 => 'file|image|mimes:jpeg,png,gif,webp,jpg|max:4096',
            'harga_produk'         => 'required'
        ]);

        if (!empty($request->file('foto'))) {
            $foto = $request->file('foto');
            $name = $request->nama_produk . "_" . time() . "." . $foto->getClientOriginalExtension();
            $foto->move('upload_products', $name);
            $product->foto = $name;
        }

        $product->nama_produk = $request->nama_produk;
        $product->stocks = $request->stocks;
        $product->deskripsi = $request->deskripsi;
        $product->fk_user = Auth::User()->id;
        $product->harga_products = $request->harga_produk;


        Session::flash('edit', $product->save());
        return redirect()->route('products.index')->with('Status', 'Data Product Berhasil Diubah');
    }
    public function activateProduct(Request $request, $id)
    {
        $product = DB::table('products')->where("id", $id)->update(['deleted_at' => NULL]);
        Session::flash('edit', $product);
        return redirect()->route('products.index')->with('Status', 'Products berhasil di-aktifkan!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('Status', 'Data Product Berhasil di non-aktifkan');
    }
}
