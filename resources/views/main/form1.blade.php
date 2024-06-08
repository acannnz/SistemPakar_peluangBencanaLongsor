@extends('asset.tampilan')

@section('konten')
    <form action='{{ url('main/' . $dataWilayah->id . '/form1') }}' method='POST'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3">
                <a href="{{ url('main') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-3 col-form-label">Wilayah</label>
                <div class="col-sm-9">
                    <input type="text" name="namaWilayah" value="{{ $dataWilayah->nama_wilayah }} "disabled>
                </div>
            </div>

            @foreach ($keteranganKeadaan as $item)
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">{{ $item->keterangan }}</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="keadaan{{ $item->id }}" id="keadaan{{ $item->id }}">
                            <option disabled selected>Pilih</option>
                            @foreach ($item->dataKeadaan as $items)
                                <option value="{{ $items->Keadaan->nilai_keadaan }}">{{ $items->keadaan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach

            <div class="mb-3 row">
                <button class="btn btn-success">PROSES</button>
            </div>
    </form>
    </div>
@endsection
