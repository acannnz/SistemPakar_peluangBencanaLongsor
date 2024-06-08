@extends('asset.tampilan')

@section('konten')
    <form action='{{ url('main') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('') }}" class="btn btn-primary">Kembali</a>
            <div class="mb-3 row">
                <label for="nama_wilayah" class="col-sm-2 col-form-label">Nama Wilayah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_wilayah' id="nama_wilayah">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="role" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
    </form>
    </div>
@endsection
