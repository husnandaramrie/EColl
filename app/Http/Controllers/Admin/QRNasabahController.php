<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\QRNasabah;
use Str;

class QRNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qrnasabah = QRNasabah::with(['user'])->get();
        return view('admin.qrnasabah.index',compact('qrnasabah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.qrnasabah.create');
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
            'slug' => Str::slug($request->judul),
            'tgl' => date('Y-m-d'),
            'user_id' => auth()->user()->id,
        ]);
        QRNasabah::create($request->all());

        return redirect()->route('admin.qrnasabah.index')->with('success','Data berhasil ditambah');
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
    public function edit(QRNasabah $qrnasabah)
    {
        return view('admin.qrnasabah.edit',compact('qrnasabah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QRNasabah $qrnasabah)
    {
        $this->authorize('update',$qrnasabah);

        $request->request->add([
            'slug' => Str::slug($request->judul),
            'tgl' => date('Y-m-d'),
            'user_id' => auth()->user()->id,
        ]);
        $qrnasabah->update($request->all());
           
        return redirect()->route('admin.qrnasabah.index')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(QRNasabah $qrnasabah)
    {
        $this->authorize('delete',$qrnasabah);
        
        $qrnasabah->delete();
        return redirect()->route('admin.qrnasabah.index')->with('success','Data berhasil dihapus');
    }
}
