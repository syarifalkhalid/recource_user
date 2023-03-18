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

    $client = new Client();

    $response = $client->get('https://genbi-ntb.com/api/pengumuman/index', [
        'headers' => [
            'Authorization' => 'Bearer ' . session('api_token'),
            'Accept' => 'application/json',
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
    
    // dd($response);
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

public function pengumumanDownload($file_pdf){
    $response = Http::get('https://genbi-ntb.com/api/pdf/' . $file_pdf);
    $contentType = $response->headers()->get('content-type');
    $contentDisposition = $response->headers()->get('content-disposition');
    $fileSize = $response->headers()->get('content-length');

    $headers = [
        'Content-Type' => $contentType,
        'Content-Disposition' => $contentDisposition,
        'Content-Length' => $fileSize
    ];

    Storage::disk('local')->put($file_pdf, $response->body());
    $file = Storage::disk('local')->get($file_pdf);

    return response()->download($file, $file_pdf, $headers);

}

}