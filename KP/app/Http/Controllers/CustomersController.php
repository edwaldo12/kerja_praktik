<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['customers'] = Customer::withTrashed()->get();
        return view('customers/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name'              => ['required'],
        //     'username'          => ['required', 'unique:users'],
        //     'password'          => ['required'],
        //     'jenis_kelamin'     => ['required'],
        //     'tanggal_lahir'     => ['required'],
        //     'alamat'            => ['required']
        // ]);

        // $customers = new Customer;
        // $customers->name = $request->name;
        // $customers->username = $request->username;
        // $customers->jenis_kelamin = $request->jenis_kelamin;
        // $customers->password = Hash::make($request->password);
        // $customers->alamat = $request->alamat;

        // Session::flash('add', $customers->save());
        // return redirect(route('login.customers')->with('Status','Data Pelanggan Berhasil di Tambah'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.ubah', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name'              => ['required'],
            'username'          => ['required', 'unique:users'],
            'jenis_kelamin'     => ['required'],
            'tanggal_lahir'     => ['required'],
            'alamat'            => ['required'],
            'password'          => ['required', 'min:8']
        ]);

        $customer->name = $request->name;
        $customer->username = $request->username;
        $customer->jenis_kelamin = $request->jenis_kelamin;
        if (!empty($request->password)) {
            $customer->password = Hash::make($request->password);
        }
        $customer->alamat = $request->alamat;

        Session::flash('edit', $customer->save());
        return redirect()->route('customers.index')->with('Status', 'Data Pelanggan Berhasil Diubah');
    }
    public function activate(Request $request,$id)
    {
        $customer = DB::table('customers')->where("id",$id)->update(['deleted_at' => NULL]);
        Session::flash('edit', $customer);
        return redirect()->route('customers.index')->with('Status', 'Pelanggan berhasil di-aktifkan!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('Status', 'Pelanggan Berhasil Di non-aktifkan');
    }
}
