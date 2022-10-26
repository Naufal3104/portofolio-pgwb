@extends('admin.body')
@section('title','Edit Siswa')
@section('content-title','Edit Siswa')
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
                    <form method = "POST" enctype  = "multipart/form-data" action="{{route('siswa.update',$data->id)}}">
                        @csrf       
                        {{method_field('PUT')}}                
                        <div class = "form-group">
                            <label for = "Nama">Nama</label>
                        <input type = "text" class = "form-control" id = "nama" name = "nama" value = "{{$data->nama}}">
                        </div>

                        <div class = "form-group">
                            <label for = "Nisn">NISN</label>
                        <input type = "text" class = "form-control" id = "nisn" name = "nisn" value = "{{$data->nisn}}">
                        </div>

                        <div class = "form-group">
                            <label for = "jk">Jenis Kelamin</label>
                        <select type = "text" class = "form-control" id = "jk" name = "jk">
                            <option selected ></option>
                            <option value = "Laki-laki" @if ($data->jk == 'Laki-laki') selected @endif>Laki-laki</option>
                            <option value = "Perempuan" @if ($data->jk == 'Perempuan') selected @endif>Perempuan</option>
                        </select>
                        </div>

                        <div class = "form-group">
                            <label for = "Email">Email</label>
                        <input type = "text" class = "form-control" id = "email" name = "email" value = "{{$data->email}}">
                        </div>                        

                        <div class = "form-group">
                            <label for = "Alamat">Alamat</label>
                        <input type = "text" class = "form-control" id = "alamat" name = "alamat" value = "{{$data->alamat}}">
                        </div>

                        <div class = "form-group">
                            <label for = "About">About</label>
                        <input type = "text" class = "form-control" id = "about" name = "about" value = "{{$data->about}}">
                        </div>
                        
                        <div class = "form-group">
                            <label for = "Foto">Foto</label>
                        <input class = "form-control-file" type = "file" class = "form-control" id = "foto" name = "foto">
                        <img src = "{{asset('/template/img/'.$data->foto)}}" width="300" class = "img-thumbnail">
                        </div>

                        <div class = "form-group">
                            <input type = "submit" class = "btn btn-success" value = "Simpan">
                            <a href = "{{route('siswa.index')}}" class = "btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection