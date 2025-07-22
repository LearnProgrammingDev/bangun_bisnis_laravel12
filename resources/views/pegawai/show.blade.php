@extends('layouts.dashboard')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    {{-- Judul Halaman Diubah --}}
                    <h3>Detail Pegawai</h3>
                    <p class="text-subtitle text-muted">
                        Melihat rincian dari data pegawai.
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('pegawai.index') }}">Employess</a>
                            </li>
                            {{-- Breadcrumb Diubah --}}
                            <li class="breadcrumb-item active" aria-current="page">
                                Detail
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    {{-- Judul Kartu Dibuat Dinamis --}}
                    <h5 class="card-title">Employess: {{ $pegawai->nama_lengkap }}</h5>
                </div>
                <div class="card-body">
                    {{--
        Daripada pakai form, kita gunakan definition list (<dl>)
        untuk menampilkan data. Jauh lebih rapi dan semantik.
    --}}
                    <dl class="row">
                        <dt class="col-sm-3 mb-2">Email</dt>
                        <dd class="col-sm-9 mb-2">{{ $pegawai->email }}</dd>

                        <dt class="col-sm-3 mb-2">Nomor Telepon</dt>
                        <dd class="col-sm-9 mb-2">{{ $pegawai->nohp }}</dd>

                        {{-- "Diberikan Kepada" sepertinya adalah label untuk "Alamat" berdasarkan gambar,
             atau bisa jadi ini adalah field terpisah. Jika ini field terpisah, hapus komentar dan gunakan.
             Jika ini hanya frasa pengantar untuk alamat, mungkin lebih baik
             mengintegrasikannya ke dalam bagian "Alamat" jika dimaksudkan untuk menjelaskan konteks alamat.
             Untuk saat ini, saya menganggap ini adalah label terpisah berdasarkan penempatan kode asli.
        --}}
                        <dt class="col-sm-3 mb-2">Diberikan Kepada</dt>
                        <dd class="col-sm-9 mb-2">Kaelyn Towne</dd> {{-- Mengasumsikan ini adalah nilai untuk "Diberikan Kepada" dari gambar --}}

                        <dt class="col-sm-3 mb-2">Alamat</dt>
                        <dd class="col-sm-9 mb-2">
                            {{-- nl2br untuk menjaga format baris baru dari textarea --}}
                            {!! nl2br(e($pegawai->alamat)) !!}
                        </dd>

                        <dt class="col-sm-3 mb-2">Tanggal Lahir</dt>
                        {{-- Format tanggalnya biar bagus, jangan mentahan dari database --}}
                        <dd class="col-sm-9 mb-2">{{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->format('d F Y') }}</dd>

                        <dt class="col-sm-3 mb-2">Hire Date</dt>
                        {{-- Format tanggalnya biar bagus, jangan mentahan dari database --}}
                        <dd class="col-sm-9 mb-2">{{ \Carbon\Carbon::parse($pegawai->hire_date)->format('d F Y') }}</dd>

                        <dt class="col-sm-3 mb-2">Salary</dt>
                        <dd class="col-sm-9 mb-2">
                            {{-- Format mata uang untuk gaji --}}
                            {{ number_format($pegawai->salary, 0, ',', '.') }} IDR
                        </dd>

                        <dt class="col-sm-3 mb-2">Status</dt>
                        <dd class="col-sm-9 mb-2">
                            {{-- Pakai badge biar statusnya keren --}}
                            @if ($pegawai->status == 'active')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger text-dark">InActive</span>
                            @endif
                        </dd>
                    </dl>

                    <hr>

                    {{-- Tombol aksi yang lebih masuk akal untuk halaman detail --}}
                    <div class="mt-3">
                        <a href="" class="btn btn-primary me-2"> {{-- Ditambahkan me-2 untuk margin-right antar tombol --}}
                            <i class="bi bi-pencil-square"></i> Edit Tugas
                        </a>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Tugas
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
