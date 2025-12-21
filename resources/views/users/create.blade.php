@extends('layouts.dashboard')

@section('title', 'Create Users')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="mb-4"><i class="fas fa-user-plus"></i> Create New User</h2>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">First Name *</label>
                                    <input type="text" name="fname"
                                        class="form-control @error('fname') is-invalid @enderror"
                                        value="{{ old('fname') }}" required placeholder="Enter first name">
                                    @error('fname')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Middle Name *</label>
                                    <input type="text" name="mid_name"
                                        class="form-control @error('mid_name') is-invalid @enderror"
                                        value="{{ old('mid_name') }}" required placeholder="Enter middle name">
                                    @error('mid_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Last Name *</label>
                                    <input type="text" name="lname"
                                        class="form-control @error('lname') is-invalid @enderror"
                                        value="{{ old('lname') }}" required placeholder="Enter last name">
                                    @error('lname')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Username</label>
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username') }}" placeholder="Optional username">
                                    @error('username')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Email *</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required placeholder="user@example.com">
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Phone</label>
                                    <input type="tel" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}" placeholder="+250 (0) 123 456 789">
                                    @error('phone')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Password *</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" required
                                        placeholder="Minimum 8 characters">
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Confirm Password *</label>
                                    <input type="password" name="password_confirmation" class="form-control" required
                                        placeholder="Confirm password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Status *</label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror"
                                        required>
                                        <option value="">Select Status</option>
                                        <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Photo *</label>
                                    <input type="file" name="avatar" id="avatar">
                                    @error('avatar')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold d-block mb-3">Assign Roles *</label>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        @forelse(\Spatie\Permission\Models\Role::all() as $role)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                                    class="form-check-input @error('roles') is-invalid @enderror"
                                                    id="role_{{ $role->id }}"
                                                    {{ in_array($role->name, old('roles', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="role_{{ $role->id }}">
                                                    <strong>{{ ucfirst($role->name) }}</strong>
                                                    <small class="text-muted d-block">
                                                        @switch($role->name)
                                                            @case('admin')
                                                                Full system access and administration
                                                            @break

                                                            @case('manager')
                                                                Can manage members and approve requests
                                                            @break

                                                            @case('user')
                                                                Limited access, view-only member data
                                                            @break

                                                            @default
                                                                Standard user role
                                                        @endswitch
                                                    </small>

                                                </label>
                                            </div>
                                            @empty
                                                <p class="text-muted">No roles available. Please run the seeder.</p>
                                            @endforelse
                                            @error('roles')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Create User
                                    </button>
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
