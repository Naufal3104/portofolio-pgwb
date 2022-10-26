<?php

namespace App\Http\Controllers;
use File;
use App\Models\Siswa;
use App\Models\Project;
use App\Models\Kontak;
use App\Models\Jenis_kontak;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('admin.mastersiswa', compact('data',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createmastersiswa');
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
            'nama' => 'required|min:5|max:20',
            'nisn' => 'required|min:12|max:12',
            'jk' => 'required',
            'email' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required|min:10',
            'foto' => 'required|mimes:jpg,jpeg,png,svg,gif'
        ],$messages);


        //ambil informasi file
        $file = $request->file('foto');

        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //proses insert database
        Siswa::create([
            'nama' => $request ->nama,
            'nisn' => $request ->nisn,
            'jk' => $request ->jk,
            'email' => $request ->email,
            'alamat' => $request ->alamat,
            'about' => $request ->about,
            'foto' => $nama_file
        ]);

        return redirect('/siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        $data1 = Siswa::find($id)->project;
        $data2 = Siswa::find($id)->kontak;
        return view('admin.showmastersiswa', compact('data', 'data1', 'data2'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Siswa::find($id);
        return view('admin.editmastersiswa', compact('data'));
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
            'nama' => 'required|min:5|max:20',
            'nisn' => 'required|min:12|max:12',
            'jk' => 'required',
            'email' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required|min:10',
            'foto' => 'mimes:jpg,jpeg,png,svg,gif'
        ],$messages);
        
        if($request->foto !=''){
        //dengan ganti foto
        
        //ambil informasi file
        $file = $request->file('foto');

        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        $siswa=Siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->jk = $request -> jk;
            $siswa->email = $request->email;
            $siswa->alamat = $request->alamat;           
            $siswa->about = $request->about; 
            $siswa->foto = $nama_file;                    
            $siswa->save();
            return redirect()->route('siswa.index');

        }else{
            //tanpa ganti foto
            $siswa=Siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->jk = $request -> jk;
            $siswa->email = $request->email;
            $siswa->alamat = $request->alamat;           
            $siswa->about = $request->about;                     
            $siswa->save();
            return redirect()->route('siswa.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Siswa::find($id)->delete();
        return redirect('siswa');
    }
}
