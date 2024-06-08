@extends('asset.tampilan')

@section('konten')
    <form action='{{ url('main/tambahKeadaan') }}' method='post'>
        @csrf
        <div class="my-3 p-1 bg-body rounded shadow-sm">
            <a href="{{ url('') }}" class="btn btn-primary">Kembali</a>
            <div class="mb-3 row p-4">
                <label class="col-sm-2 col-form-label">Keterangan Keadaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='keterangan' id="keterangan">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="role" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
    </form>
    </div>
@endsection
