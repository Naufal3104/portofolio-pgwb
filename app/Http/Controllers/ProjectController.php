<?php

namespace App\Http\Controllers;
use File;
use App\Models\Project;
use App\Models\Siswa;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::all();
        $data1 = Siswa::all('id','nisn','nama');
        return view('admin.masterproject', compact('data', 'data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Siswa::all();
        return view('admin.createmasterproject', compact('data'));
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
            'namaproject' => 'required|min:5|max:30',
            'fotoproject' => 'required|mimes:jpg,jpeg,png,svg,gif',
            'deskripsi' => 'required|min:5|max:50',
            'tanggal' => 'required'
        ],$messages);


        //ambil informasi file
        $file = $request->file('fotoproject');

        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //proses insert database
        Project::create([
            'namaproject' => $request -> namaproject,
            'id_siswa' => $request -> id_siswa,
            'fotoproject' =>  $nama_file,
            'deskripsi' =>  $request -> deskripsi,
            'tanggal' =>  $request -> tanggal
        ]);

        return redirect('/project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data1 = Siswa::find($id)->project()->get();
        return view('admin.showmasterproject', compact('data1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Project::find($id);
        $data1=Siswa::all();
        return view('admin.editmasterproject', compact('data','data1'));
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
            'namaproject' => 'required|min:5|max:30',
            'id_siswa' => 'required',
            'fotoproject' => 'mimes:jpg,jpeg,png,svg,gif',
            'deskripsi' => 'required|min:5|max:50',
            'tanggal' => 'required'
        ],$messages);

        if($request->fotoproject !=''){
            //dengan ganti foto
            
            //ambil informasi file
            $file = $request->file('fotoproject');
    
            //rename
            $nama_file = time()."_".$file->getClientOriginalName();
    
            //proses upload
            $tujuan_upload = './template/img';
            $file->move($tujuan_upload,$nama_file);
    
            $project=Project::find($id);
                $project->namaproject = $request->namaproject;
                $project->id_siswa = $request ->id_siswa;
                $project->deskripsi = $request->deskripsi;
                $project->tanggal = $request->tanggal;
                $project->fotoproject = $nama_file;
                $project->save();
                return redirect()->route('project.index');
    
            }else{
                //tanpa ganti foto
                $project=Project::find($id);
                $project->namaproject = $request->namaproject;
                $project->id_siswa = $request->id_siswa;
                $project->deskripsi = $request->deskripsi;
                $project->tanggal = $request->tanggal;                 
                $project->save();
                return redirect()->route('project.index');
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
        $data=Project::find($id)->delete();
        return redirect('project');
    }
}
