@extends('layouts.dashboard')

@section('title', 'View User')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">
                <i class="fas fa-user"></i> User Details
            </h2>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        @if($user->avatar)
                            <img src="{{ asset('storage/'.$user->avatar) }}" width="120" class="rounded-circle">
                        @else
                            <i class="fas fa-user-circle fa-6x text-muted"></i>
                        @endif
                    </div>

                    <table class="table table-borderless">
                        <tr><th>Full Name</th><td>{{ $user->fname }} {{ $user->mid_name }} {{ $user->lname }}</td></tr>
                        <tr><th>Username</th><td>{{ $user->username }}</td></tr>
                        <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                        <tr><th>Phone</th><td>{{ $user->phone ?? '-' }}</td></tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge bg-{{ $user->status === 'active' ? 'success' : 'danger' }}">
                                    {{ ucfirst($user->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Roles</th>
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge bg-primary">{{ ucfirst($role->name) }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr><th>Created</th><td>{{ $user->created_at->format('d M Y') }}</td></tr>
                    </table>

                    <div class="d-flex gap-2">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
