@extends('admin.body')
@section('title','Edit Jenis Contact')
@section('content-title','Edit Jenis Contact')
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
                    <form method = "POST" enctype  = "multipart/form-data" action="{{route('jeniscontact.update',$data->id)}}">
                        @csrf 
                        {{method_field('PUT')}}                       
                        <div class = "form-group">
                            <label for = "jenis_kontak">Jenis Kontak</label>
                        <input type = "text" class = "form-control" id = "jenis_kontak" name = "jenis_kontak" value = "{{$data->jenis_kontak}}" enctype  = "multipart/form-data" action="{{route('jeniscontact.store')}}">
                        </div>

                        <div class = "form-group">
                            <input type = "submit" class = "btn btn-success" value = "Simpan">
                            <a href = "{{route('jeniscontact.index')}}" class = "btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection