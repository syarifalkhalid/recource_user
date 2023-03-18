@extends('layouts.main')

@section('title')
    Dashboard | GenBi
@endsection

@section('content')
    {{-- @if ($user['name'] != null) --}}
        {{-- <h1></h1> --}}
    {{-- @endif --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <center>
                    <a href="index.html"><img
                            src="https://www.generasibaruindonesia.com/asset_easy/images_easy/genbi/logogenbild.jpg?asad"
                            style="width: 50%; height: 50%;" alt="Logo-genbi"></a>
                </center>

            </div>
            <div class="card-body" style="display: flex; justify-content: center; text-align: center">
                Generasi Baru Indonesia (GenBI) merupakan komunitas yang terdiri dari mahasiswa/i penerima
                beasiswa Bank Indonesia yang berada di bawah naungan Bank Indonesia.
            </div>
        </div>
    </section>

    <div class="col-md-12">
        <div class="row">
            <div class="col-12 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Visi</h4>
                    </div>
                    <div class="card-body">
                        <span style="text-align: justify"> Menjadikan kaum muda Indonesia sebagai generasi yang kompeten
                            dalam
                            berbagai bidang keilmuan serta dapat membawa perubahan positif dan menjadi inspirasi bagi bangsa
                            dan negara.
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Misi</h4>
                    </div>
                    <div class="card-body">
                        <p style="text-align: justify"> Menggagas berbagai kegiatan pemberdayaan masyarakat untuk Indonesia
                            yang
                            lebih baik (INITIATE)
                            Menjadi garda terdepan dalam melakukan aksi nyata untuk pembangunan bangsa (ACT)
                            Peduli dan berkontribusi untuk pemberdayaan masyarakat (SHARE)
                            Berbagi inspirasi dan motivasi untuk menjadi energi bagi negeri (INSPIRE)</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Tujuan</h4>
                    </div>
                    <div class="card-body text-justify">
                        <p style="text-align: justify"> Frontliners Bank Indonesia (mengkomunikasikan kelembagaan dan
                            berbagai kebijakan Bank Indonesia
                            kepada sesama mahasiswa dan masyarakat umum)
                            Change Agents (menjadi agen perubahan dan role model di kalangan pelajar, mahasiswa, dan
                            masyarakat)
                            Future Leaders (menjadi pemimpin masa depan di berbagai bidang dan tingkatan)
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
