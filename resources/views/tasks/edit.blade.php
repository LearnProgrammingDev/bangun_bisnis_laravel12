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
                    <h3>Tasks</h3>
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
                                Task
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Update
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center">Update Task to Employess✨</h5>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Task Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title', $task->title) }}" required>
                            @error('title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="assigned_to" class="form-label">Assign To</label>
                            <select class="form-select" id="assigned_to" name="assigned_to" required>
                                <option value="">Select Employee</option>
                                @foreach ($pegawai as $pgw)
                                    <option value="{{ $pgw->id }}" @if (old('assigned_to', $task->assigned_to) == $pgw->id) selected @endif>
                                        {{ $pgw->nama_lengkap }}</option>
                                @endforeach
                            </select>
                            @error('assigned_to')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="datetime-local" class="form-control" id="due_date" name="tanggal_selesai"
                                value="{{ old('tanggal_selesai', $task->tanggal_selesai) }}" required>
                            @error('tanggal_selesai')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="pending" @if (old('status', $task->status) == 'pending') selected @endif>Pending</option>
                                <option value="on progress" @if (old('status', $task->status) == 'on progress') selected @endif>On Progress
                                </option>
                                <option value="done" @if (old('status', $task->status) == 'done') selected @endif>Done</option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $task->description) }}</textarea>
                            @error('description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary mt-3">Update Task</button>
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Back to Task List</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
