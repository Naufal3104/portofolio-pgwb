@if ($data->isEmpty())
    <h6 class="text-center">Siswa belum memiliki Kontak</h6>
@else
    <div class="card">
        @foreach($data as $item)
        <div class="card-body">
            <h5>Jenis Kontak</h5>
            {{$item->jenis_contact->jenis_kontak}}
            <h5>Deskripsi</h5>
            {{$item->deskripsi}}
        </div>
        <div class="card-footer">
            <a href = "contact/{{$item->id}}/edit" class = "btn btn-warning btn-circle btn-sm"><i class = "fas fa-edit"></i></a>
            <form action="contact/{{$item->id}}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class = "btn btn-danger btn-circle btn-sm"><i class = "fas fa-trash"></i></button>
            </form>
        </div>
    </div>
    @endforeach
@endif