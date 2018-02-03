<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subkategori2;
use App\Subkategori1;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategoris=Kategori::all();
        $sk=Subkategori2::all();
        $subkategoris=Subkategori1::all();
        return view('user.kategoriall')->with(['kategoris'=>$kategoris,'subkategoris'=>$subkategoris,'subkategori2s'=>$sk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.kategori.create');
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
          'kategori'=>'required',
          ]);
          $kategori=new Kategori();
          $kategori->kategori=$request->input('kategori');
          $kategori->save();
          return redirect('user/kategori')->with('success','Post Telah Dibuat');
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
        $kategoris=Kategori::find($id);
        return view('user.kategori.edit')->with('kategoris',$kategoris);
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
          'kategori'=>'required',
          ]);
          $kategori=Kategori::find($id);
          $kategori->kategori=$request->input('kategori');
          $kategori->save();
          return redirect('user/kategori')->with('success','Post Telah Dibuat');
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
        $kategoris=Kategori::find($id);
        $kategoris->delete();
        return redirect('user/kategori');
    }
}
