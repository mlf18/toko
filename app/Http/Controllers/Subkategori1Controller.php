<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subkategori2;
use App\Subkategori1;
use App\Kategori;

class Subkategori1Controller extends Controller
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
        $kategoris=Kategori::all();
        return view('user.subkategori1.create')->with('kategoris',$kategoris);
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
          'subkategori'=>'required',
          'kategori_id'=>'required',
          ]);
          $subkategori=new Subkategori1();
          $subkategori->subkategori1=$request->input('subkategori');
          $subkategori->kategori_id=$request->input('kategori_id');
          $subkategori->save();
          return redirect('user/subkategori1')->with('success','Post Telah Dibuat');
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
        $subkategori=Subkategori1::find($id);
        $kategoris=Kategori::all();
        // return var_dump($kategoris[1]->id);
        return view('user.subkategori1.edit')->with(['subkategori'=>$subkategori,'kategoris'=>$kategoris]);
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
          'subkategori'=>'required',
          'kategori_id'=>'required',
          ]);
          $subkategori=Subkategori1::find($id);
          $subkategori->subkategori1=$request->input('subkategori');
          $subkategori->kategori_id=$request->input('kategori_id');
          $subkategori->save();
          return redirect('user/subkategori1')->with('success','Post Telah Dibuat');
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
        $subkategori=Subkategori1::find($id);
        $subkategori->delete();
        return redirect('user/subkategori1');
    }
}
