<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Echo_;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->name);
        $data['users'] = User::withTrashed()->get();
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/create');
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
            'username'          => ['required', 'unique:users'],
            'password'          => ['required'],
            'email'             => ['required', 'unique:users'],
            'jenis_kelamin'     => ['required'],
            'tanggal_lahir'     => ['required'],
            'alamat'            => ['required'],
            'jabatan'           => ['required']
        ]);



        $users = new User;
        $users->name = $request->name;
        $users->username = $request->username;
        $users->password = Hash::make($request->password);
        $users->jabatan = $request->jabatan;
        $users->email = $request->email;
        $users->tanggal_lahir = $request->tanggal_lahir;
        $users->jenis_kelamin = $request->jenis_kelamin;
        $users->alamat = $request->alamat;

        Session::flash('add', $users->save());
        return redirect()->route('users.index')->with('Status', 'Data User Berhasil Ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'              => ['required'],
            'username'          => ['required', 'unique:users'],
            'tanggal_lahir'     => ['required'],
            'email'             => ['required', 'unique:users'],
            'jenis_kelamin'     => ['required'],
            'alamat'            => ['required'],
            'jabatan'           => ['required']
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jabatan = $request->jabatan;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;

        Session::flash('edit', $user->save());
        return redirect()->route('users.index')->with('Status', 'Data User Berhasil Diubah');
    }
    public function activateUser(Request $request,$id)
    {
        $user = DB::table('users')->where("id",$id)->update(['deleted_at' => NULL]);
        Session::flash('edit', $user);
        return redirect()->route('users.index')->with('Status', 'User berhasil di-aktifkan!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('Status', 'Data User Berhasil di non-aktifkan');
    }
}
