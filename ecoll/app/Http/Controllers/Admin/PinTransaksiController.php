<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PinTransaksi;
use Str;

class PinTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $pintransaksi = PinTransaksi::with(['user'])->get();
    //     return view('admin.pintransaksi.index',compact('pintransaksi'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        return view('admin.pintransaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add([
            'slug' => Str::slug($request->pintransaksi),
            'user_id' => auth()->user()->userid,
            'username' => auth()->user()->username,
            'nama' => auth()->user()->nama,
            'kantor' => auth()->user()->kantor,
            'tanggal' => auth()->user()->tanggal,
            'pin' => auth()->user()->pin,
            'limit' => auth()->user()->limit,
            'waktumax' => auth()->user()->waktumax,
            'saldoawal' => auth()->user()->saldoawal,
            'saldoakhir' => auth()->user()->saldoakhir,
            'kodeopen' => auth()->user()->kodeopen,
        ]);

        $request->request->add([
            'slug' => Str::slug($request->judul),
            'tgl' => date('Y-m-d'),
            'user_id' => auth()->user()->id,
        ]);
        PinTransaksi::create($request->all());

        return redirect()->route('admin.pintransaksi.index')->with('success','Data berhasil ditambah');
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

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(PinTransaksi $pintransaksi)
    // {
    //     return view('admin.pintransaksi.edit',compact('pintransaksi'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PinTransaksi $pintransaksi)
    {
        $this->authorize('update',$pintransaksi);

        $request->request->add([
            // 'slug' => Str::slug($request->judul),
            // 'tgl' => date('Y-m-d'),
            'username' => auth()->user()->id,
            'nama' => auth()->user()->id,
            'kantor' => auth()->user()->id,
            'tanggal' => auth()->user()->id,
            'pin' => auth()->user()->id,
            'limit' => auth()->user()->id,
            'waktumax' => auth()->user()->id,
            'saldoawal' => auth()->user()->id,
            'saldoakhir' => auth()->user()->id,
            'kodeopen' => auth()->user()->id,
        ]);
        $pintransaksi->update($request->all());
           
        return redirect()->route('admin.pintransaksi.index')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PinTransaksi $pintransaksi)
    {
        $this->authorize('delete',$pintransaksi);
        
        $pintransaksi->delete();
        return redirect()->route('admin.pintransaksi.index')->with('success','Data berhasil dihapus');
    }
}
