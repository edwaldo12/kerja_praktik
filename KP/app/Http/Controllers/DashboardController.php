<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\DetailOrder;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['total_user'] = User::count();
        $data['total_produk'] = Product::count();
        $data['total_order'] = Order::count();
        $data['total_agenda'] = Agenda::count();
        return view('dashboard.index', $data);
    }

    public function pesanan_perbulan()
    {
        $products = Product::all();
        $result = array();
        for ($i = 0; $i < count($products); $i++) {
            $result[$i]['nama_produk'] = $products[$i]['nama_produk'];
            $result[$i]['pesanan'] = Order::where(['product_id' => $products[$i]['id'],])->whereMonth('created_at', '=', date('m'))->sum('jumlah_pesanan');
        }
        return response()->json($result);
    }

    public function omset_bulanan()
    {
        $orders = Order::all();
        $result = array(
            "Pendapatan"
        );
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $omset = Order::whereMonth('created_at', $bulan)->sum("total_harga_dibayar");
            array_push($result, (int)$omset);
        }
        return response()->json($result);
    }

    public function getDetailOrder($id)
    {
        $result['details'] = DetailOrder::where([
            'fk_order' => $id
        ])->get();
        for ($i = 0; $i < count($result['details']); $i++) {
            $product = Product::withTrashed()->find($result['details'][$i]->fk_produk);
            $result['details'][$i]->nama_produk = $product->nama_produk;
        }
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function get_product()
    {
        $product = Product::where("stocks", "<=", "100")->get();
        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
