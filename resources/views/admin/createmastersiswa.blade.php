@extends('admin.body')
@section('title','Create Siswa')
@section('content-title','Create Siswa')
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
                    <form method = "POST" enctype  = "multipart/form-data" action="{{route('siswa.store')}}">
                        @csrf                       
                        <div class = "form-group">
                            <label for = "nama">Nama</label>
                        <input type = "text" class = "form-control" id = "nama" name = "nama" value = "{{old('nama')}}" enctype  = "multipart/form-data" action="{{route('siswa.store')}}">
                        </div>

                        <div class = "form-group">
                            <label for = "Nisn">NISN</label>
                        <input type = "text" class = "form-control" id = "nisn" name = "nisn" value = "{{old('nisn')}}">
                        </div>

                        <div class = "form-group">
                            <label for = "jk">Jenis Kelamin</label>
                        <select type = "text" class = "form-control" id = "jk" name = "jk" value = "{{old('jk')}}">
                            <option selected ></option>
                            <option value = "Laki-laki">Laki-laki</option>
                            <option value = "Perempuan">Perempuan</option>
                        </select>
                        </div>

                        <div class = "form-group">
                            <label for = "Email">Email</label>
                        <input type = "text" class = "form-control" id = "email" name = "email" value = "{{old('email')}}">
                        </div>                        

                        <div class = "form-group">
                            <label for = "Alamat">Alamat</label>
                        <input type = "text" class = "form-control" id = "alamat" name = "alamat" value = "{{old('alamat')}}">
                        </div>

                        <div class = "form-group">
                            <label for = "About">About</label>
                        <input type = "text" class = "form-control" id = "about" name = "about" value = "{{old('about')}}">
                        </div>

                        <div class = "form-group">
                            <label for = "Foto">Foto</label>
                        <input class = "form-control-file" type = "file" class = "form-control" id = "foto" name = "foto" value = "{{old('foto')}}">
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