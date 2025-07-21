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
                    <h3>Employess</h3>
                    <p class="text-subtitle text-muted">
                        pengelolaan tugas pegawai
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Employess
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Index
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center">Task Employess Manage✨</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <a class="btn btn-primary mb-3 ms-auto" href="">New Employes</a>
                    </div>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Hire Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $pgw)
                                <tr>
                                    <td>{{ $pgw->nama_lengkap }}</td>
                                    <td>
                                        {{ $pgw->email }}
                                    </td>
                                    <td>{{ $pgw->nohp }}</td>
                                    <td>{{ $pgw->alamat }}</td>
                                    <td>{{ $pgw->hire_date }}</td>
                                    <td>
                                        @if ($pgw->status == 'active')
                                            <span class="text-danger">InActive</span>
                                        @elseif ($pgw->status == 'inactive')
                                            <span class="text-success">Aactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm">View</a>
                                        @if ($pgw->status == 'active')
                                            <a href="" class="btn btn-success btn-sm">Mark as Active</a>
                                        @elseif ($pgw->status == 'inactive')
                                            <a href="" class="btn btn-warning btn-sm">Mark as Inactive</a>
                                        @endif
                                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
