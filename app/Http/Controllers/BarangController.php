<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Subkategori1;
use App\Subkategori2;
use App\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang=Barang::all();
        return view('user.barang.index')->with('barangs',$barang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategoris=Kategori::all();
        return view('user.barang.create')->with('kategoris',$kategoris);
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
        $this->validate($request,[
          'nama'=>'required',
          'subkategori2s_id'=>'required',
          'deskripsi'=>'required',
          'gambar'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          $barang=new Barang();
          if($request->hasFile('gambar')){
            $fileNameExt=$request->file('gambar')->getClientOriginalName();
            $fileName=pathinfo($fileNameExt,PATHINFO_FILENAME);
            $extension=$request->file('gambar')->getClientOriginalExtension();
            $fileNametostore=$request->input('nama').'_'.time().'.'.$extension;
            $path = $request->file('gambar')->storeAs('public/images',$fileNametostore);
          }
          $barang->nama=$request->input('nama');
          $barang->subkategori2s_id=$request->input('subkategori2s_id');
          $barang->deskripsi=$request->input('deskripsi');
          $barang->gambar=$fileNametostore;
          $barang->save();
          return redirect('user/barang/create');
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
        return view('user.barang.show');
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
        $barang=Barang::find($id);
        $sk2=Subkategori2::all();
        $kategori=Kategori::all();
        $sk=Subkategori1::all();
        return view('user.barang.edit')->with(['kategoris'=>$kategori,'subkategori1s'=>$sk,'subkategori2s'=>$sk2,'barang'=>$barang]);
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
        $this->validate($request,[
          'nama'=>'required',
          'subkategori2s_id'=>'required',
          'deskripsi'=>'required',
          'gambar'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          $barang=Barang::find($id);
          if($request->hasFile('gambar')){
            $fileNameExt=$request->file('gambar')->getClientOriginalName();
            $fileName=pathinfo($fileNameExt,PATHINFO_FILENAME);
            $extension=$request->file('gambar')->getClientOriginalExtension();
            $fileNametostore=$request->input('nama').'_'.time().'.'.$extension;
            $path = $request->file('gambar')->storeAs('public/images',$fileNametostore);
          }else{
            $fileNametostore=$barang->gambar;
          }
          $barang->nama=$request->input('nama');
          $barang->subkategori2s_id=$request->input('subkategori2s_id');
          $barang->deskripsi=$request->input('deskripsi');
          $barang->gambar=$fileNametostore;
          $barang->save();
          return redirect('user/barang/create');
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
