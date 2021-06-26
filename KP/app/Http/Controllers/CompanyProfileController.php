<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Customer;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Foreach_;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('CompanyProfile.index');
    }

    public function home()
    {
        $data['products'] = Product::with(['user'])->get();
        $data['agendas'] = Agenda::all();
        $data['total_order'] = Order::count();
        $data['total_produk'] = Product::count();
        return view('CompanyProfile.home', $data);
    }

    public function about_us()
    {
        return view('CompanyProfile.about');
    }

    public function products()
    {
        $data['products'] = Product::paginate(6);
        return view('CompanyProfile.products', $data);
    }

    public function agenda()
    {
        $data['agendas'] = DB::table('agendas')->select('agendas.id', 'judul', 'tanggal', 'foto', 'catatan', 'fk_user', 'users.username')->join('users', 'users.id', '=', 'agendas.fk_user')
            ->paginate(6);
        return view('CompanyProfile.agenda', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $data['agenda'] = Agenda::with(['user'])->find($id);
        return view('CompanyProfile.showAgenda', $data);
    }

    public function showProduct($id)
    {
        $data['product'] = Product::findOrFail($id);
        return view('CompanyProfile.product_details', $data);
    }

    public function contact()
    {
        return view('CompanyProfile.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CompanyProfile/create_customer');
    }

    public function login()
    {
        return view('CompanyProfile/login');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $customer = Customer::where(['username' => $request->username])->first();
        if ($customer && Hash::check($request->password, $customer->password)) {
            Session::put('customer', $customer);
            return redirect('/product');
        } else {
            Session::flash('login', FALSE);
            return redirect()->route('login.customers');
        }
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
            'name'              => ['required'],
            'username'          => ['required', 'unique:customers'],
            'password'          => ['required', 'min:8'],
            'jenis_kelamin'     => ['required'],
            'tanggal_lahir'     => ['required'],
            'alamat'            => ['required']
        ]);

        $customers = new Customer;
        $customers->name = $request->name;
        $customers->username = $request->username;
        $customers->jenis_kelamin = $request->jenis_kelamin;
        $customers->tanggal_lahir = $request->tanggal_lahir;
        $customers->password = Hash::make($request->password);
        $customers->alamat = $request->alamat;

        Session::flash('add', $customers->save());
        return redirect()->route('login.customers')->with('Status', 'Telah berhasil melakukan pendaftaran!, silahkan login.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $customer = Session::get('customer');
        return view('customers/edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'              => ['required'],
            'username'          => ['required', 'unique:users'],
            'tanggal_lahir'     => ['required'],
            'jenis_kelamin'     => ['required'],
            'alamat'            => ['required']
        ]);
        $customer = Customer::find(Session::get('customer')['id']);
        $customer->name = $request->name;
        $customer->username = $request->username;
        if (!empty($request->password)) {
            $customer->password = Hash::make($request->password);
        }
        $customer->tanggal_lahir = $request->tanggal_lahir;
        $customer->jenis_kelamin = $request->jenis_kelamin;
        $customer->alamat = $request->alamat;

        Session::put('customer', $customer);
        Session::flash('edit', $customer->save());
        return redirect()->route('home')->with('Status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('home');
    }
}
