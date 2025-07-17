@extends('layouts.dashboard');
@section('content')
    <div class="page-heading">
        <h3>Tasks Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>📌 Tasks Today</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="task1">
                                    <label class="form-check-label" for="task1">
                                        Selesaikan desain dashboard
                                    </label>
                                </div>
                                <span class="badge bg-primary">12 Jul</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="task2"
                                        checked>
                                    <label class="form-check-label text-decoration-line-through text-muted" for="task2">
                                        Meeting tim proyek pukul 09.00
                                    </label>
                                </div>
                                <span class="badge bg-success">Done</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="task3">
                                    <label class="form-check-label" for="task3">
                                        Push ke GitHub & deploy ke staging
                                    </label>
                                </div>
                                <span class="badge bg-warning text-dark">Today</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="task4">
                                    <label class="form-check-label" for="task4">
                                        Revisi bug dari QA
                                    </label>
                                </div>
                                <span class="badge bg-danger">Due Soon</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection;
