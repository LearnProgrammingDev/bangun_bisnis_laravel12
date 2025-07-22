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
                    <h3>Detail Tugas</h3>
                    <p class="text-subtitle text-muted">
                        Melihat rincian dari tugas yang diberikan.
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('tasks.index') }}">Task</a>
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
                    <h5 class="card-title">Tugas: {{ $task->title }}</h5>
                </div>
                <div class="card-body">
                    {{--
                        Daripada pakai form, kita gunakan definition list (<dl>)
                        untuk menampilkan data. Jauh lebih rapi dan semantik.
                    --}}
                    <dl class="row">
                        <dt class="col-sm-3">Judul Tugas</dt>
                        <dd class="col-sm-9">{{ $task->title }}</dd>

                        <dt class="col-sm-3">Diberikan Kepada</dt>
                        {{-- Asumsi ada relasi 'assignedTo' di model Task --}}
                        <dd class="col-sm-9">{{ $task->pegawai->nama_lengkap ?? 'Pegawai tidak ditemukan' }}</dd>

                        <dt class="col-sm-3">Batas Waktu</dt>
                        {{-- Format tanggalnya biar bagus, jangan mentahan dari database --}}
                        <dd class="col-sm-9">{{ \Carbon\Carbon::parse($task->tanggal_selesai)->format('d F Y, H:i') }}</dd>

                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">
                            {{-- Pakai badge biar statusnya keren --}}
                            @if ($task->status == 'done')
                                <span class="badge bg-success">Done</span>
                            @elseif ($task->status == 'on progress')
                                <span class="badge bg-primary">On Progress</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </dd>

                        <dt class="col-sm-3">Deskripsi</dt>
                        <dd class="col-sm-9">
                            {{-- nl2br untuk menjaga format baris baru dari textarea --}}
                            {!! nl2br(e($task->description)) !!}
                        </dd>
                    </dl>

                    <hr>

                    {{-- Tombol aksi yang lebih masuk akal untuk halaman detail --}}
                    <div class="mt-3">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i> Edit Tugas
                        </a>
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Tugas
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
