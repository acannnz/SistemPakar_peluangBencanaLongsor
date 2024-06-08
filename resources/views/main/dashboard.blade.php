@extends('asset.tampilan')

@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('main/create') }}' class="btn btn-primary">Tambah Wilayah</a>
            <a href='{{ url('main/formKeadaan') }}' class="btn btn-warning float-sm-right">Tambah Keadaan</a>
        </div>
        @csrf
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-2">No</th>
                    <th class="col-md-4">Nama Wilayah</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem(); ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->nama_wilayah }}</td>
                        <td>
                            <a href='{{ url('main/' . $item->id . '/form1') }}' class="btn btn-success btn-sm">Cek
                                Longsor</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline'
                                action="{{ url('main/' . $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
        <div class="pd-3">
            {{ $data->withQueryString()->links() }}
        </div>
    </div>
@endsection
