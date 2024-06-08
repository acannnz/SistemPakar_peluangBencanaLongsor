<?php

namespace App\Http\Controllers;

use App\Models\DataKeadaan;
use App\Models\Hasil;
use App\Models\KeteranganKeadaan;
use App\Models\LongsorData;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = Wilayah::where('id', 'like', "%$katakunci%")
                ->orWhere('nama_wilayah ', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Wilayah::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('main.dashboard', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('main.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama_wilayah', $request->nama_wilayah);

        $request->validate([
            'nama_wilayah' => 'required',
        ], [
            'nama_wilayah.required' => 'Form Nama Wilayah Wajib diisi',
        ]);
        $data = [
            'nama_wilayah' => $request->nama_wilayah,
        ];
        Wilayah::create($data);
        return redirect()->to('main')->with('success', 'Berhasil menambahkan Mata Kuliah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Wilayah::where('id', $id)->delete();
        return redirect('main/')->with('success', 'Berhasil menghapus data');
    }

    function form1Pengecekan(string $id)
    {
        $dataWilayah = Wilayah::where('id', $id)->first();
        $dataKondisi = DataKeadaan::with('keadaan')->get();
        $keteranganKeadaan = KeteranganKeadaan::with('dataKeadaan')->get();
        return view('main.form1', ['dataWilayah' => $dataWilayah, 'dataKondisi' => $dataKondisi, 'keteranganKeadaan' => $keteranganKeadaan]);
    }
    function fungsiPengecekan1(Request $request, string $id)
    {
        $dataWilayah = Wilayah::where('id', $id)->first();
        $totalKeadaan = 0;
        $countKeadaan = 0;
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'keadaan') !== false) {
                $totalKeadaan += $value;
                $countKeadaan++;
            }
        }
        $dataMasuk = $request->all();

        $nilai = 0;
        if ($totalKeadaan != 0) {
            $nilai = $totalKeadaan / $countKeadaan;
        }
        if ($nilai >= 0.7) {
            return view('main.hasil.hasilTinggi', ['dataMasuk' => $dataMasuk, 'dataWilayah' => $dataWilayah]);
        } else if ($nilai >= 0.4) {
            return view('main.hasil.hasilSedang', ['dataWilayah' => $dataWilayah]);
        } else if ($nilai <= 0.4) {
            return view('main.hasil.hasilRendah', ['dataWilayah' => $dataWilayah]);
        }
    }

    function formTampilanKeadaan()
    {
        $data = KeteranganKeadaan::get();
        return view('main.formKeadaan', ['data' => $data]);
    }

    function formTambahKeadaan()
    {
        return view('main.tambahKeadaan');
    }
    function fungsiTambahKeadaan(Request $request)
    {
        Session::flash('keterangan', $request->keterangan);
        $request->validate([
            'keterangan' => 'required',
        ], [
            'keterangan.required' => 'Form Wajib diisi',
        ]);
        $data = [
            'keterangan' => $request->keterangan,
        ];
        KeteranganKeadaan::create($data);
        return redirect()->to('main/formKeadaan')->with('success', 'Berhasil menambahkan Keterangan Keadaan');
    }


    function formEditKeadaan(string $id)
    {
        $data = KeteranganKeadaan::where('id', $id)->first();
        return view('main.editKeadaan')->with('data', $data);
    }
    function fungsiEditKeadaan(Request $request, string $id)
    {
        Session::flash('keadaan', $request->keadaan);
        Session::flash('potensi_keadaan', $request->potensi_keadaan);
        $request->validate([
            'keadaan' => 'required',
            'potensi_keadaan' => 'required',
        ], [
            'keadaan.required' => 'Form Wajib diisi',
            'potensi_keadaan.required' => 'Form Wajib diisi',
        ]);
        $data = [
            'keadaan' => $request->keadaan,
            'kode_keadaan_id' => $request->potensi_keadaan,
            'keterangan_id' => $id,
        ];
        DataKeadaan::create($data);
        return redirect()->to('main/formKeadaan')->with('success', 'Berhasil menambahkan Keadaan');
    }
}
