@extends('layouts.dashboard')

@section('title', 'Users')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-person-badge"></i> Users Management</h2>
        <div>
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="bi bi-person-plus"></i> Add User
            </a>
            <div class="btn-group ms-2">
                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-download"></i> Export
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('users.index', ['export' => 'pdf']) }}">
                        <i class="bi bi-file-pdf"></i> PDF
                    </a></li>
                    <li><a class="dropdown-item" href="{{ route('users.index', ['export' => 'csv']) }}">
                        <i class="bi bi-file-csv"></i> CSV
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Roles</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            {{-- Avatar --}}
                            <td>
                                @if($user->avatar)
                                    <img src="{{ asset($user->avatar) }}"
                                         class="rounded-circle" width="40" height="40">
                                @else
                                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center"
                                         style="width:40px;height:40px;">
                                        <i class="bi bi-person text-white"></i>
                                    </div>
                                @endif
                            </td>

                            {{-- Full Name --}}
                            <td>
                                {{ $user->fname }}
                                {{ $user->mid_name }}
                                {{ $user->lname }}
                            </td>

                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? '-' }}</td>

                            {{-- Roles --}}
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge bg-primary">
                                        {{ ucfirst($role->name) }}
                                    </span>
                                @endforeach
                            </td>

                            {{-- Status --}}
                            <td>
                                <span class="badge bg-{{ $user->status === 'active' ? 'success' : 'danger' }}">
                                    {{ ucfirst($user->status) }}
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">

                                    <a href="{{ route('users.show', $user) }}"
                                       class="btn btn-outline-secondary">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('users.edit', $user) }}"
                                       class="btn btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    @if(auth()->id() !== $user->id)
                                        <button class="btn btn-outline-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteUserModal{{ $user->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        {{-- Delete Modal --}}
                        <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger">
                                            <i class="bi bi-exclamation-triangle"></i> Delete User
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <p class="mb-0">
                                            Are you sure you want to delete
                                            <strong>{{ $user->fname }} {{ $user->lname }}</strong>?
                                        </p>
                                        <small class="text-muted">
                                            This action cannot be undone.
                                        </small>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">
                                            Cancel
                                        </button>

                                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">
                                                Yes, Delete
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                No users found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $users->links() }}
        </div>
    </div>
</div>

</div>
@endsection
