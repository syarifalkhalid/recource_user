@extends('layouts.main')

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Submit Berkas Pendaftaran</h4>
                    </div>
                    <form action="{{ route('berkasSubmit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h6 class="text-primary">Data Mahasiswa</h6>
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text"
                                                class="form-control @error('nama')
                                        is-invalid
                                        @enderror "
                                                id="nama" name="nama" value="{{ old('nama') }}" required>
                                            @error('nama')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row mt-4">
                                            <div class="form-group col-md-6">
                                                <label for="nim"> Nim </label>
                                                <input type="text"
                                                    class="form-control @error('nim')
                                            is-invalid @enderror"
                                                    name="nim" value="{{ old('nim') }}" id="nim" required>
                                                @error('nim')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="universitas">Universitas</label>
                                                <input type="text"
                                                    class="form-control @error('universitas')
                                            is-invalid
                                            @enderror"
                                                    name="universitas" value="{{ old('universitas') }}" id="universitas"
                                                    required>
                                                @error('universitas')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="form-group col-md-6">
                                                <label for="prodi">Prodi</label>
                                                <input type="text"
                                                    class="form-control @error('prodi')
                                            is-invalid
                                            @enderror"
                                                    name="prodi" value="{{ old('prodi') }}" id="prodi" required>
                                                @error('prodi')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="semester">Semester</label>
                                                <input type="number"
                                                    class="form-control @error('semester')
                                            is-invalid
                                            @enderror"
                                                    name="semester" value="{{ old('semester') }}" id="semester" required>
                                                @error('semester')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="alamat" class=" text-md-right text-left">Alamat</label>
                                            <textarea name="alamat" id="alamat" value="{{ old('alamat') }}"
                                                class="form-control @error('alamat')
                                            is-invalid
                                            @enderror"
                                                required></textarea>
                                            @error('alamat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-6 align-self-center">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="date"
                                                    class="form-control datemask @error('tgl_lahir')
                                            is-invalid
                                            @enderror"
                                                    placeholder="YYYY/MM/DD" name="tgl_lahir"
                                                    value="{{ old('tgl_lahir') }}" id="tgl_lahir" required>
                                                @error('tgl_lahir')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 align-self-center">
                                                <label for="tmp_lahir">Tempat Lahir</label>
                                                <input type="text"
                                                    class="form-control @error('tmp_lahir')
                                            is-invalid
                                            @enderror"
                                                    name="tmp_lahir" value="{{ old('tmp_lahir') }}" id="tmp_lahir"
                                                    required>
                                                @error('tmp_lahir')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-6 align-self-center">
                                                <div class="form-group">
                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect">
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </fieldset>
                                                    @error('jenis_kelamin')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 align-self-center">
                                                <div class="form-group">
                                                    <label for="agama">Agama</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect">
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Khonghucu">Khonghucu</option>
                                                        </select>
                                                    </fieldset>
                                                    @error('agama')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 align-self-center">
                                                <div class="form-group">
                                                    <label for="ayah">Nama Ayah</label>
                                                    <input type="text"
                                                        class="form-control @error('ayah')
                                            is-invalid
                                            @enderror"
                                                        name="ayah" value="{{ old('ayah') }}" id="ayah">
                                                    @error('ayah')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6 align-self-center">
                                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                                <input type="text"
                                                    class="form-control @error('pekerjaan_ayah')
                                            is-invalid
                                            @enderror"
                                                    name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}"
                                                    id="pekerjaan_ayah">
                                                @error('pekerjaan_ayah')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="form-group col-md-6">
                                                <label for="ibu">Nama Ibu</label>
                                                <input type="text"
                                                    class="form-control @error('ibu')
                                            is-invalid
                                            @enderror"
                                                    name="ibu" value="{{ old('ibu') }}" id="ibu" required>
                                                @error('ibu')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                                <input type="text"
                                                    class="form-control @error('pekerjaan_ibu')
                                            is-invalid
                                            @enderror"
                                                    name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}"
                                                    id="pekerjaan_ibu" required>
                                                @error('pekerjaan_ibu')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="saudara">Jumlah Saudara</label>
                                            <input type="text"
                                                class="form-control @error('saudara')
                                        is-invalid
                                        @enderror"
                                                name="saudara" value="{{ old('saudara') }}" id="saudara">
                                            @error('saudara')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 ">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h5 class="text-primary">Berkas Dalam Bentuk Gambar</h5>
                                            <label>Pas Foto</label>

                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('foto')
                                            is-invalid
                                            @enderror"
                                                    id="foto" name="foto" value="{{ old('foto') }}">
                                                <label class="input-group-text bg-primary text-white">Pilih File </label>
                                                @error('foto')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>KTP</label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('ktp')
                                            is-invalid
                                            @enderror"
                                                    id="ktp" name="ktp" value="{{ old('ktp') }}">
                                                <label class="input-group-text bg-primary text-white" for="ktp">Pilih
                                                    File </label>
                                                @error('ktp')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>KTM/Suket Aktif Kuliah</label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('kk')
                                            is-invalid
                                            @enderror"
                                                    id="kk" name="kk" value="{{ old('kk') }}">
                                                <label class="input-group-text bg-primary text-white" for="kk">Pilih
                                                    File </label>
                                                @error('kk')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Surat Rekomendasi</label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('suket_beasiswa')
                                            is-invalid @enderror"
                                                    id="suket_beasiswa" value="{{ old('suket_beasiswa') }}"
                                                    name="suket_beasiswa">
                                                <label class="input-group-text bg-primary text-white"
                                                    for="suket_beasiswa">Pilih
                                                    File </label>
                                                @error('suket_beasiswa')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Surat Tidak Sedang Mendapat Beasiswa/Bekerja</label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('suket_pernyataan_tidak_menerima_beasiswa')
                                            is-invalid @enderror"
                                                    id="suket_pernyataan_tidak_menerima_beasiswa"
                                                    value="{{ old('suket_pernyataan_tidak_menerima_beasiswa') }}"
                                                    name="suket_pernyataan_tidak_menerima_beasiswa">
                                                <label class="input-group-text bg-primary text-white"
                                                    for="suket_pernyataan_tidak_menerima_beasiswa">Pilih
                                                    File </label>
                                                @error('suket_pernyataan_tidak_menerima_beasiswa')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Surat Berperan AKtif GenBI</label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('suket_pernyataan_berperan_aktif')
                                            is-invalid @enderror"
                                                    id="suket_pernyataan_berperan_aktif"
                                                    value="{{ old('suket_pernyataan_berperan_aktif') }}"
                                                    name="suket_pernyataan_berperan_aktif">
                                                <label class="input-group-text bg-primary text-white"
                                                    for="suket_pernyataan_berperan_aktif">Pilih
                                                    File </label>
                                                @error('suket_pernyataan_berperan_aktif')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>SKTM/Slip Gaji</label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('sktm')
                                            is-invalid
                                            @enderror"
                                                    id="sktm" name="sktm">
                                                <label class="input-group-text bg-primary text-white" for="sktm">Pilih
                                                    File </label>
                                                @error('sktm')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 ">
                                            <h5 class="text-primary">Berkas Dalam Bentuk PDF</h5>
                                            <label>Form A1</label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('form_a1')
                                            is-invalid
                                            @enderror"
                                                    id="form_a1" name="form_a1">
                                                <label class="input-group-text bg-primary text-white" for="form_a1">Pilih
                                                    File </label>
                                                @error('form_a1')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Bukti Transaksi Qris & Link Video Edukasi</label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('bukti_transaksi_qris')
                                            is-invalid
                                            @enderror"
                                                    id="bukti_transaksi_qris" name="bukti_transaksi_qris">
                                                <label class="input-group-text bg-primary text-white"
                                                    for="bukti_transaksi_qris">Pilih
                                                    File </label>
                                                @error('bukti_transaksi_qris')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Transkip Nilai </label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('transkip')
                                            is-invalid
                                            @enderror"
                                                    id="transkip" name="transkip" value="{{ old('transkip') }}">
                                                <label class="input-group-text bg-primary text-white" for="transkip">Pilih
                                                    File </label>
                                                @error('transkip')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Piagam Sertifikat </label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('sertifikat')
                                            is-invalid
                                            @enderror"
                                                    name="sertifikat" id="sertifikat">
                                                <label class="input-group-text bg-primary text-white"
                                                    for="sertifikat">Pilih
                                                    File </label>
                                                @error('sertifikat')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Motivation Later</label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('motivation_later')
                                            is-invalid
                                            @enderror"
                                                    name="motivation_later" id="motivation_later">
                                                <label class="input-group-text bg-primary text-white"
                                                    for="motivation_later">Pilih
                                                    File </label>
                                                @error('motivation_later')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group card-footer float-end">
                            <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
