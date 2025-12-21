@extends('layouts.dashboard')

@section('title', 'Create District')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h2><i class="bi bi-geo-alt"></i> Create District</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('districts.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Code <span class="text-danger">*</span></label>
                        <input type="text" name="code" class="form-control" required value="{{ old('code') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('districts.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create District</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
