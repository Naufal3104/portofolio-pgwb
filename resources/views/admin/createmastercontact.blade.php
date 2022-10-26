@extends('admin.body')
@section('title','Create Contact')
@section('content-title','Create Contact')
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
                    <form method = "POST" enctype  = "multipart/form-data" action="{{route('contact.store')}}">
                        @csrf                       
                        <div class = "form-group">
                            <label for = "id_siswa">Nama Siswa</label>
                        <select type = "text" class = "form-control" id = "id_siswa" name = "id_siswa">
                        @foreach ($data as $item)
                        <option selected ></option>
                        <option value = {{$item->id}}>{{$item->nama}}</option>
                        </select>
                        @endforeach
                        </div>

                        <div class = "form-group">
                            <label for = "Jeniskontak">Jenis Kontak</label>
                        <select type = "text" class = "form-control" id = "id_jenis" name = "id_jenis" value = "{{old('id_jenis')}}">
                            <option selected ></option>
                            <option value = "1">Nomor Telepon</option>
                            <option value = "2">Instagram</option>
                            <option value = "3">Telegram</option>
                        </select>
                        </div>

                        <div class = "form-group">
                            <label for = "Deskripsi">Deskripsi</label>
                        <input type = "text" class = "form-control" id = "deskripsi" name = "deskripsi" value = "{{old('deskripsi')}}">
                        </div>          

                        <div class = "form-group">
                            <input type = "submit" class = "btn btn-success" value = "Simpan">
                            <a href = "{{route('contact.index')}}" class = "btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection