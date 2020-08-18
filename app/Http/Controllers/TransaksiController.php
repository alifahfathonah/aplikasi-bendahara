<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transaksi = Transaksi::all();
        return view('transaksi.tampil')->with('transaksi', $transaksi);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $transaksi = Transaksi::create($request->input());
        return response()->json($transaksi);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($transaksi_id)
    {
        //
        $transaksi = Transaksi::find($transaksi_id);
        return response()->json($transaksi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $transaksi_id)
    {
        //
        $transaksi = Transaksi::find($transaksi_id);
        $transaksi->nama = $request ->nama;        
        $transaksi->kelas = $request ->kelas;        
        $transaksi->kategori = $request ->kategori;        
        $transaksi->nominal = $request ->nominal;        
        $transaksi->tanggal = $request ->tanggal;        
        
        $transaksi->save();
        return response()->json($transaksi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($transaksi_id)
    {
        //
        $transaksi = Transaksi::destroy($transaksi_id);
        return response()->json($transaksi);
    }
}
