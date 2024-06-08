@extends('asset.tampilan')

@section('konten')
    <form action='{{ url('main/' . $data->id . '/editKeadaan') }}' method='post'>
        @csrf
        <div class="my-3 p-1 bg-body rounded shadow-sm">
            <a href="{{ url('') }}" class="btn btn-primary">Kembali</a>
            <div class="mb-3 row p-4">
                <label class="col-sm-2 col-form-label">Keterangan Keadaan</label>
                <div class="col-sm-10 py-2">
                    {{ $data->keterangan }}
                </div>

                <label class="col-sm-2 col-form-label my-3">Potensi Keadaan</label>
                <div class="col-sm-10 my-3">
                    <input type="text" class="form-control" name='keadaan' id="keadaan">
                </div>

                <label class="col-sm-3 col-form-label my-3">Potensi Terjadi Longsor</label>
                <div class="col-sm-8 my-3">
                    <div class="col-6 form-check">
                        <input class="form-check-input" type="radio" name="potensi_keadaan" id="radioB1" value="1">
                        <label class="form-check-label" for="radioB1">Tingi</label>
                    </div>
                    <div class="col-6 form-check">
                        <input class="form-check-input" type="radio" name="potensi_keadaan" id="radioB2" value="2">
                        <label class="form-check-label" for="radioB2">Kecil</label>
                    </div>
                </div>


            </div>

            <div class="mb-3 row">
                <label for="role" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
    </form>
    </div>
@endsection
