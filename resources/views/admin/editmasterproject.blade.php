@extends('admin.body')
@section('title','Edit Project')
@section('content-title','Edit Project')
@section('content')
<div class = "row">
        <div class = "col-lg-12">
            <div class = "card shadow mb-4">
                <div class = "card-body">
                    @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method = "POST" enctype  = "multipart/form-data" action="{{route('project.update',$data->id)}}">
                        @csrf       
                        {{method_field('PUT')}}   
                        <div class = "form-group">
                            <label for = "id_siswa">Nama Siswa</label>
                        <select type = "text" class = "form-control" id = "id_siswa" name = "id_siswa">
                            <option selected ></option>
                            @foreach ($data1 as $item)
                                
                            @if ($data->id_siswa == $item->id)
                            <option value ="{{$item->id}}" selected>{{$item->nama}}</option>  
                            @else
                            <option value="{{$item->id}}">{{$item->nama}}</option> 
                            @endif
                            @endforeach
                        </select>
                        </div> 
                        
                        <div class = "form-group">
                            <label for = "NamaProject">Nama Project</label>
                        <input type = "text" class = "form-control" id = "namaproject" name = "namaproject" value = "{{$data->namaproject}}">
                        </div>

                        <div class = "form-group">
                            <label for = "fotoproject">Foto Project</label>
                        <input class = "form-control-file" type = "file" class = "form-control" id = "fotoproject" name = "fotoproject">
                        <img src = "{{asset('/template/img/'.$data->fotoproject)}}" width="300" class = "img-thumbnail">
                        </div>

                        <div class = "form-group">
                            <label for = "Deskripsi">Deskripsi Project</label>
                        <input type = "text" class = "form-control" id = "deskripsi" name = "deskripsi" value = "{{$data->deskripsi}}">
                        </div>

                        <div class = "form-group">
                            <label for = "Tanggal">Tanggal</label>
                        <input type = "date" class = "form-control" id = "tanggal" name = "tanggal" value = "{{$data->tanggal}}">
                        </div>

                        <div class = "form-group">
                            <input type = "submit" class = "btn btn-success" value = "Simpan">
                            <a href = "{{route('project.index')}}" class = "btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection