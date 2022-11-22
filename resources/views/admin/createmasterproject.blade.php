@extends('admin.body')
@section('title','Create Project')
@section('content-title','Create Project')
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
                    <form method = "POST" enctype  = "multipart/form-data" action="{{route('project.store')}}">
                        @csrf             
                        <div class = "form-group">
                        <label for = "id_siswa">Nama Siswa</label>
                            <select type = "text" class = "form-control" id = "id_siswa" name = "id_siswa">
                                @foreach ($data as $item)
                                    @if ($item->id_siswa == $item->id)
                                    <option value ="{{$item->id}}" selected>{{$item->nama}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>         
                        <div class = "form-group">
                            <label for = "NamaProject">Nama Project</label>
                        <input type = "text" class = "form-control" id = "namaproject" name = "namaproject" value = "{{old('namaproject')}}">
                        </div>
                        <div class = "form-group">
                            <label for = "FotoProject">Foto Project</label>
                        <input class = "form-control-file" type = "file" class = "form-control" id = "fotoproject" name = "fotoproject" value = "{{old('fotoproject')}}">
                        </div>

                        <div class = "form-group">
                            <label for = "Deskripsi">Deskripsi Project</label>
                        <input type = "text" class = "form-control" id = "deskripsi" name = "deskripsi" value = "{{old('deskripsi')}}">
                        </div>

                        <div class = "form-group">
                            <label for = "Tanggal">Tanggal</label>
                        <input type = "date" class = "form-control" id = "tanggal" name = "tanggal" value = "{{old('tanggal')}}">
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