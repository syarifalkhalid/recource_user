<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ApiBerkasController extends Controller
{
    public function showBerkas()
    {
        return view('berkas.index');
    }

    public function berkas(Request $request)
{
    // dd($request);
    ini_set('max_execution_time', 300); // 300 seconds = 5 minutes

    
    // Ambil file dari request
    $file1 = $request->file('foto');
    $file2 = $request->file('ktp');
    $file3 = $request->file('kk');
    $file4 = $request->file('sktm');
    $file5 = $request->file('suket_beasiswa');
    $file6 = $request->file('suket_pernyataan_tidak_menerima_beasiswa');
    $file7 = $request->file('suket_pernyataan_berperan_aktif');
    $file8 = $request->file('transkip');
    $file9 = $request->file('sertifikat');
    $file10 = $request->file('form_a1');
    $file11 = $request->file('motivation_later');
    $file12 = $request->file('bukti_transaksi_qris');

    // Buat nama file baru untuk menghindari kemungkinan nama file yang sama
    $fileNameFoto = time() . '_' . $file1->getClientOriginalName();
    $fileNameKtp = time() . '_' . $file2->getClientOriginalName();
    $fileNameKK = time() . '_' . $file3->getClientOriginalName();
    $fileNameSktm = time() . '_' . $file4->getClientOriginalName();
    $fileNameSuket_beasiswa = time() . '_' . $file5->getClientOriginalName();
    $fileNameSuket_pernyataan_tidak_menerima_beasiswa = time() . '_' . $file6->getClientOriginalName();
    $fileNameSuket_pernyataan_berperan_aktif = time() . '_' . $file7->getClientOriginalName();
    $fileNameTranskip = time() . '_' . $file8->getClientOriginalName();
    $fileNameSertifikat = time() . '_' . $file9->getClientOriginalName();
    $fileNameForm_a1 = time() . '_' . $file10->getClientOriginalName();
    $fileNameMotivation_later = time() . '_' . $file11->getClientOriginalName();
    $fileNameBukti_transaksi_qris = time() . '_' . $file12->getClientOriginalName();

    // Simpan file ke direktori 'public/uploads'
    $file1->storeAs('uploads', $fileNameFoto, 'public');
    $file2->storeAs('uploads', $fileNameKtp, 'public');
    $file3->storeAs('uploads', $fileNameKK, 'public');
    $file4->storeAs('uploads', $fileNameSktm, 'public');
    $file5->storeAs('uploads', $fileNameSuket_beasiswa, 'public');
    $file6->storeAs('uploads', $fileNameSuket_pernyataan_tidak_menerima_beasiswa, 'public');
    $file7->storeAs('uploads', $fileNameSuket_pernyataan_berperan_aktif, 'public');
    $file8->storeAs('uploads', $fileNameTranskip, 'public');
    $file9->storeAs('uploads', $fileNameSertifikat, 'public');
    $file10->storeAs('uploads', $fileNameForm_a1, 'public');
    $file11->storeAs('uploads', $fileNameMotivation_later, 'public');
    $file12->storeAs('uploads', $fileNameBukti_transaksi_qris, 'public');
   

    $client = new Client();
    
    $response = $client->request('post', 'https://genbi-ntb.com/api/berkas', [
        'headers' => [
            'Authorization' => 'Bearer ' . session('api_token'),
            'Accept' => 'application/json',
        ],
        'multipart' => [
            [
                'name' => 'nama',
                'contents' => $request->input('nama'),
            ],
            [
                'name' => 'nim',
                'contents' => $request->input('nim'),
            ],
            [
                'name' => 'universitas',
                'contents' => $request->input('universitas'),
            ],
            [
                'name' => 'prodi',
                'contents' => $request->input('prodi'),
            ],
            [
                'name' => 'semester',
                'contents' => $request->input('semester'),
            ],
            [
                'name' => 'alamat',
                'contents' => $request->input('alamat'),
            ],
            [
                'name' => 'tgl_lahir',
                'contents' => $request->input('tgl_lahir'),
            ],
            [
                'name' => 'tmp_lahir',
                'contents' => $request->input('tmp_lahir'),
            ],
            [
                'name' => 'jenis_kelamin',
                'contents' => $request->input('jenis_kelamin'),
            ],
            [
                'name' => 'agama',
                'contents' => $request->input('agama'),
            ],
            [
                'name' => 'ayah',
                'contents' => $request->input('ayah'),
            ],
            [
                'name' => 'pekerjaan_ayah',
                'contents' => $request->input('pekerjaan_ayah'),
            ],
            [
                'name' => 'ibu',
                'contents' => $request->input('ibu'),
            ],
            [
                'name' => 'pekerjaan_ibu',
                'contents' => $request->input('pekerjaan_ibu'),
            ],
            [
                'name' => 'saudara',
                'contents' => $request->input('saudara'),
            ],
            [
                'name' => 'foto',
                'contents' => fopen(storage_path('app/public/uploads/' . $fileNameFoto), 'r'),
                'filename' => $fileNameFoto
            ],
            [
                'name' => 'ktp',
                'contents' => fopen(storage_path('app/public/uploads/' . $fileNameKtp), 'r'),
                'filename' => $fileNameKtp
            ],
            [
                'name' => 'kk',
                'contents' => fopen(storage_path('app/public/uploads/' . $fileNameKK), 'r'),
                'filename' => $fileNameKK
            ],
            [
                'name' => 'sktm',
                'contents' =>  fopen(storage_path('app/public/uploads/'. $fileNameSktm), 'r'),
                'filename' => $fileNameSktm
            ],
            [
                'name' => 'suket_beasiswa',
                'contents' => fopen(storage_path('app/public/uploads/' . $fileNameSuket_beasiswa), 'r'),
                'filename' => $fileNameSuket_beasiswa
            ],
            [
                'name' => 'suket_pernyataan_tidak_menerima_beasiswa',
                'contents' => fopen(storage_path('app/public/uploads/'. $fileNameSuket_pernyataan_tidak_menerima_beasiswa), 'r'),
                'filename' => $fileNameSuket_pernyataan_tidak_menerima_beasiswa
            ],
            [
                'name' => 'suket_pernyataan_berperan_aktif',
                'contents' =>  fopen(storage_path('app/public/uploads/' . $fileNameSuket_pernyataan_berperan_aktif), 'r'),
                'filename' => $fileNameSuket_pernyataan_berperan_aktif
            ],
            [
                'name' => 'transkip',
                'contents' =>  fopen(storage_path('app/public/uploads/'. $fileNameTranskip), 'r'),
                'filename' => $fileNameTranskip
            ],
            [
                'name' => 'sertifikat',
                'contents' =>  fopen(storage_path('app/public/uploads/' . $fileNameSertifikat), 'r'),
                'filename' => $fileNameSertifikat
            ],
            [
                'name' => 'form_a1',
                'contents' =>  fopen(storage_path('app/public/uploads/' . $fileNameForm_a1), 'r'),
                'filename' => $fileNameForm_a1
            ],
            [
                'name' => 'motivation_later',
                'contents' =>  fopen(storage_path('app/public/uploads/' . $fileNameMotivation_later), 'r'),
                'filename' => $fileNameMotivation_later
            ],
            [
                'name' => 'bukti_transaksi_qris',
                'contents' =>  fopen(storage_path('app/public/uploads/'. $fileNameBukti_transaksi_qris), 'r'),
                'filename' => $fileNameBukti_transaksi_qris
            ],
        ]
    ]);
    
    // $result = $response->getBody()->getContents();
    
    // dd($response);
if ($response->getStatusCode() == 200) {
    // respons berhasil diterima
    $responseBody = $response->getBody();
    session(['form_submitted' => true]);
}
    return redirect()->route('showBerkas')->with('success', 'You have successfully.');
  
    
}
}