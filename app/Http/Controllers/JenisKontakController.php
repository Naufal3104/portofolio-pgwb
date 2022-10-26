<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kontak;
use Illuminate\Http\Request;

class JenisKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jenis_kontak::all();
        return view('admin.masterjeniscontact', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createmasterjeniscontact');
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
            'jenis_kontak' => 'required|min:3|max:30',
        ],$messages);

        Jenis_kontak::create([
            'jenis_kontak' => $request ->jenis_kontak,
        ]);

        return redirect('/jeniscontact');
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
        $data=Jenis_kontak::find($id);
        return view('admin.editmasterjeniscontact', compact('data'));
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
        $messages = [
            'required' =>':attribute harus diisi terlebih dahulu',
            'min' =>':attribute minimal :min karakter',
            'max' =>':attribute minimal :max karakter',
            'numeric' =>':attribute harus diisi angka',
            'mimes' =>':attribute harus bertipe jpg,png,jpeg,svg,gif',
            'size' =>'file yang diupload maksimal :size'
        ];
        $this->validate ($request,[
            'jenis_kontak' => 'required|min:3|max:30',
        ],$messages);

        $jeniskontak=Jenis_kontak::find($id);
            $jeniskontak->jenis_kontak = $request->jenis_kontak;                 
            $jeniskontak->save();
            return redirect()->route('jeniscontact.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Jenis_kontak::find($id)->delete();
        return redirect('jeniscontact');
    }
}
