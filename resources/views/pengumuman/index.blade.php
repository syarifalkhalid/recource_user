@extends('layouts.main')

@section('title')
    Pegumuman | GenBi
@endsection

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
                                        @if (isset($data))
                                            @foreach ($data as $pengumuman)
                                                <tr>
                                                    {{-- <td>{{ dd($pengumuman) }}</td> --}}
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pengumuman['judul'] }}</td>
                                                    <td>{{ substr($pengumuman['deskripsi'], 0, 100) }}....</td>
                                                    {{-- <td>{{ $pengumuman['file_pdf'] }}</td> --}}
                                                    <td>
                                                        <div class="buttons">
                                                            <a href="{{ route('showDetail', $pengumuman['id']) }}"
                                                                class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <p>Data tidak tersedia.</p>
                                        @endif
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
