<?php

namespace App\Http\Controllers;

// require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ApiPengumumganController extends Controller
{
    public function showPengumuman()
{
    
    // Membuat objek client GuzzleHttp
    $client = new Client();
    
    $response = $client->get('https://genbi-ntb.com/api/pengumuman/index', [
        'headers' => [
            'Authorization' => 'Bearer ' . session('api_token')
        ]
    ]);
    
    
$data = json_decode($response->getBody()->getContents(), true)['data']['data'];

    return view('pengumuman.index', ['data' => $data]);
}

public function showDetail(Request $request, $id)
{
    $client = new Client(['base_uri' => 'https://genbi-ntb.com']);
    
    // Lakukan permintaan GET ke endpoint API
    $response = $client->get('/api/pengumuman/detail/' . $id, [
        'headers' => [
            'Authorization' => 'Bearer ' . $request->session()->get('api_token')
        ]
    ]);
    
        $api_data = json_decode($response->getBody()->getContents(), true)['data']['data'];
    
        // cari data dengan ID yang sesuai
        $api_detail_data = null;
        foreach ($api_data as $data) {
            if ($data['id'] == $id) {
                $api_detail_data = $data;
                break;
            }
        }
        
        // jika tidak ditemukan data dengan ID yang sesuai, kirim response error
        if (!$api_detail_data) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        // dd($api_detail_data);
        return view('pengumuman.show', ['data' => $data]);
}

public function pengumumanDownload(Request $request, $id){
    $client = new Client(['base_uri' => 'https://genbi-ntb.com']);
    
    // Lakukan permintaan GET ke endpoint API
    $response = $client->get('/api/pengumuman/detail/' . $id, [
        'headers' => [
            'Authorization' => 'Bearer ' . $request->session()->get('api_token')
        ]
    ]);
    
        $api_data = json_decode($response->getBody()->getContents(), true)['data']['data'];
    
      
        // cari data dengan ID yang sesuai
        $api_detail_data = null;
        foreach ($api_data as $data) {
            if ($data['id'] == $id) {
                $api_detail_data = $data;
                break;
            }
        }
        return $api_detail_data;
        // jika tidak ditemukan data dengan ID yang sesuai, kirim response error
        if (!$api_detail_data) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        // dari API
        $file_contents = $client->get($api_detail_data['file_pdf'])->getBody()->getContents();
        
        // Simpan file ke dalam storage lokal Laravel
        Storage::put('public/pengumuman/' . $api_detail_data['file_pdf'], $file_contents);
        
        // Mendapatkan path file yang disimpan
        $file_path = storage_path('app/public/pengumuman/' . $api_detail_data['file_pdf']);
        
        // Membuat response PDF untuk ditampilkan pada browser
        $response_pdf = response()->make(file_get_contents($file_path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $api_detail_data['file_pdf'] . '"'
        ]);
        
        return $response_pdf;
        
        // header('Content-Type: application/pdf');
        // readfile( storage_path('app/public/penguman/'. $api_detail_data['file_pdf']));
}

}