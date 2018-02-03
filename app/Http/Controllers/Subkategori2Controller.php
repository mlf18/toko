<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subkategori2;
use App\Subkategori1;
use App\Kategori;
use DB;

class Subkategori2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $sk=Subkategori1::where('kategori_id','=',2)->orderBy('id','desc')->get();
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
        return view('user.subkategori2.create')->with('kategoris',$kategoris);
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
          'subkategori1s_id'=>'required',
          'subkategori2'=>'required',
          'kategori_id'=>'required',
          ]);
          $subk= new Subkategori2();
          $subk->subkategori1s_id=$request->input('subkategori1s_id');
          $subk->kategori_id=$request->input('kategori_id');
          $subk->subkategori2=$request->input('subkategori2');
          $subk->save();
          // return redirect ('admin/subkategori2')->with('success','Post Telah Dibuat');
          return redirect ('user/subkategori2')->with('success','Post Telah Dibuat');
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
        $kategoris=Kategori::all();
        $subkategori2s=Subkategori2::find($id);
        $subkategoris=Subkategori1::where('kategori_id','=',$subkategori2s->kategori_id)->get();
        return view('user.subkategori2.edit')->with(['kategoris'=>$kategoris,'subkategoris'=>$subkategoris,'subkategori2'=>$subkategori2s]);
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
          'subkategori1s_id'=>'required',
          'subkategori2'=>'required',
          'kategori_id'=>'required',
          ]);
          $subk= Subkategori2::find($id);
          $subk->subkategori1s_id=$request->input('subkategori1s_id');
          $subk->kategori_id=$request->input('kategori_id');
          $subk->subkategori2=$request->input('subkategori2');
          $subk->save();
          return redirect('user/subkategori2');
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
        $subk= Subkategori2::find($id);
        $subk->delete();
        return redirect ('user/subkategori2');
    }
    public function selectajax(Request $request){
      if($request->ajax()){
        $subkategoris = Subkategori1::where('kategori_id','=',$request->kategori_id)->orderBy('subkategori1','asc')->get();
        $data = view('user.inc.selectajax',compact('subkategoris'))->render();
        return response()->json(['options'=>$data]);
      }
    }
    public function selectajax2(Request $request){
      if($request->ajax()){
        $subkategoris = Subkategori2::where('subkategori1s_id','=',$request->subkategori_id)->orderBy('subkategori2','asc')->get();
        $data = view('user.inc.selectajax2',compact('subkategoris'))->render();
        return response()->json(['options'=>$data]);
      }
    }
}
