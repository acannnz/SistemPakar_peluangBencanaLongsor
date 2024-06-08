@extends('asset.tampilan')

@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('main/tambahKeadaan') }}' class="btn btn-warning float-sm-right ">Tambah Keterangan Keadaan</a>
        </div>
        @csrf
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-2">No</th>
                    <th class="col-md-4">Keterangan</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href='{{ url('main/' . $item->id . '/editKeadaan') }}' class="btn btn-success btn-sm">Tambah
                                Keadaan</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline'
                                action="{{ url('main/') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pd-3">

        </div>
    </div>
@endsection
