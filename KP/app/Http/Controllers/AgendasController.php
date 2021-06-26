<?php

namespace App\Http\Controllers;

use App\Agenda;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AgendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['agendas'] = Agenda::with(['user'])->get();
        return view('agendas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agendas/create');
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
            'judul'          => 'required',
            'tanggal'        => 'required',
            'catatan'        => 'required',
            'foto'           => 'required|file|image|mimes:jpeg,png,gif,webp,jpg|max:4096'
        ]);

        $foto = $request->file('foto');
        $name = $request->judul . "_" . time() . "." . $foto->getClientOriginalExtension();
        $foto->move('upload_agendas', $name);

        $agendas = new Agenda;
        $agendas->judul = $request->judul;
        $agendas->tanggal = $request->tanggal;
        $agendas->catatan = $request->catatan;
        $agendas->foto = $name;
        $agendas->fk_user = Auth::User()->id;


        Session::flash('add', $agendas->save());
        return redirect()->route('agendas.index')->with('Status', 'Data Agenda Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return view('agendas/edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'judul'          => 'required',
            'tanggal'        => 'required',
            'catatan'      => 'required',
            'foto'           => 'file|image|mimes:jpeg,png,gif,webp,jpg|max:4096'
        ]);

        if (!empty($request->file('foto'))) {
            $foto = $request->file('foto');
            $name = $request->judul . "_" . time() . "." . $foto->getClientOriginalExtension();
            $foto->move('upload_agendas', $name);
            $agenda->foto = $name;
        }


        $agenda->judul = $request->judul;
        $agenda->tanggal = $request->tanggal;
        $agenda->catatan = $request->catatan;
        $agenda->fk_user = Auth::User()->id;



        Session::flash('edit', $agenda->save());
        return redirect()->route('agendas.index')->with('Status', 'Data Agenda Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('agendas.index')->with('Status', 'Data Agenda Berhasil Dihapus');
    }
}
