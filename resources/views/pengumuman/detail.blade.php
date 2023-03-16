@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Pengumuman</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{-- @foreach ($data as $pengumuman) --}}
                                        <h3>{{ $data['judul'] }}</h3>
                                        <p>{{ $pengumuman['deskripsi'] }}</p>
                                        <p>{{ $pengumuman['created_at'] }}</p>
                                        {{-- @if ($pengumuman['file_pdf'] != null)
                                            <a href="{{ url('/path/to/pdf/' . $pengumuman['file_pdf']) }}">Download PDF</a>
                                        @endif --}}
                                    {{-- @endforeach --}}

                                    </tbody>
                                    {{-- @endif --}}

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
