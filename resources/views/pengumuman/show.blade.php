@extends('layouts.main')

@section('title')
    Detail Pengumuman | GenBi
@endsection

@section('content')
    <section class="section col-8">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Pengumuman</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive" style="text-align: justify">
                                <table class="table table-lg">
                                    <tr>
                                        <th>Judul</th>
                                        <th><span>{{ $data['judul'] }}</span></th>
                                    </tr>

                                    <tr>
                                        <th>Deskripsi</th>
                                        <th style="">{{ $data['deskripsi'] }}</th>
                                    </tr>
                                    {{-- <th>File Pengumuman </th> --}}
                                    {{-- <th>
                                        <iframe src="{{ asset('https://genbi-ntb.com/api/pdf/' . $data['file_pdf']) }}"
                                            width="100%" height="600px"></iframe>

                                        {{-- <a href="{{ route('pengumumanDownload', $data['file_pdf']) }}" target="_blank"
                                            style="">Download</a> --}}
                                    </th>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
