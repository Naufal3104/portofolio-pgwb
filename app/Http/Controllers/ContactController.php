<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kontak;
use File;
use App\Models\Kontak;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kontak::all();
        $data1 = Siswa::all('id','nisn','nama');
        return view('admin.mastercontact', compact('data','data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Siswa::all();
        $data1=Jenis_kontak::all();
        return view('admin.createmastercontact', compact('data', 'data1'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' =>':attribute harus diisi terlebih dahulu',
            'min' =>':attribute minimal :min karakter',
            'max' =>':attribute minimal :max karakter',
            'numeric' =>':attribute harus diisi angka',
            'mimes' =>':attribute harus bertipe jpg,png,jpeg,svg,gif',
            'size' =>'file yang diupload maksimal :size'
        ];
        $this->validate ($request,[
            'id_siswa' => 'required',
            'id_jenis' => 'required',
            'deskripsi' => 'required|min:5|max:50',
        ],$messages);

        //proses insert database
        Kontak::create([
            'id_siswa' => $request -> id_siswa,
            'id_jenis' =>  $request -> id_jenis,
            'deskripsi' =>  $request -> deskripsi
        ]);

        return redirect('/contact ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Siswa::find($id)->kontak()->get();
        $data1=Jenis_kontak::all();
        $siswa=Siswa::all();
        return view('admin.showmastercontact',compact('data', 'data1','siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Kontak::find($id);
        $data1=Siswa::all();
        return view('admin.editmastercontact', compact('data', 'data1'));
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

        $messages = [
            'required' =>':attribute harus diisi terlebih dahulu',
            'min' =>':attribute minimal :min karakter',
            'max' =>':attribute minimal :max karakter',
            'numeric' =>':attribute harus diisi angka',
            'mimes' =>':attribute harus bertipe jpg,png,jpeg,svg,gif',
            'size' =>'file yang diupload maksimal :size'
        ];
        $this->validate ($request,[
            'id_siswa' => 'required',
            'id_jenis' => 'required',
            'deskripsi' => 'required|min:5|max:50',
        ],$messages);

        $kontak=Kontak::find($id);
            $kontak->id_siswa = $request->id_siswa;
            $kontak->id_jenis = $request->id_jenis;
            $kontak->deskripsi = $request -> deskripsi;                 
            $kontak->save();
            return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Kontak::find($id)->delete();
        return redirect('contact');
    }
}
