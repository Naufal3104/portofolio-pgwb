@extends('admin.body')
@section('title','Show Siswa')
@section('content-title','Show Siswa')
@section('content')
<div class = "row">
    <div class = "col-lg-4">
        <div class = "card shadow mb-4">
            <div class = "card-body text-center" style="text-align: center;">
                <img src="{{asset('/template/img/'.$data->foto)}}" alt="image" width="200" class="rounded-circle img-thumbnail mt-4" />
                <h1><br>{{$data->nama}}</h1>
                <h4>{{$data->email}}</h4>
                <h4>{{$data->alamat}}</h4>
            </div>
        </div>
    </div>
    <div class ="col-lg-8">
        <div class = "card shadow">
                <div class ="card header">
                    <div class = "card-body text-center">
                        <h4 class="project">Project<br></h4>
                        @foreach ($data1 as $item)
                        <h4>{{$item->namaproject}}<br></h4>
                        <h4>{{$item->deskripsi}}<br></h4>
                        <h4>{{$item->tanggal}}</h4>
                        @endforeach
                    </div>
                </div>
        </div>
        <h1></h1>
        <div class = "card shadow mb-4">
                <div class ="card header">
                    <div class = "card-body text-center">
                        <h4 class="kontak">Kontak<br></h4>
                        @foreach ($data2 as $item)
                        <h4>{{$item->jenis_contact->jenis_kontak}}</h4>
                        <h4>{{$item->deskripsi}}<br></h4>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection