@extends('layouts.dashboard')

@section('title', 'Members')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="bi bi-people"></i> Members Management</h2>
            <div>
                <a href="{{ route('members.create') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus"></i> Add Member
                </a>
                @role('admin')
                <div class="btn-group ms-2">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-download"></i> Export
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('members.index', ['export' => 'pdf']) }}">
                                <i class="bi bi-file-pdf"></i> PDF
                            </a></li>
                        <li><a class="dropdown-item" href="{{ route('members.index', ['export' => 'csv']) }}">
                                <i class="bi bi-file-csv"></i> CSV
                            </a></li>
                    </ul>
                </div>
                <button onclick="window.print()" class="btn btn-outline-secondary ms-2">
                    <i class="bi bi-printer"></i> Print
                </button>
                @endrole
            </div>
        </div>

        {{-- Filters --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('members.index') }}" class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved
                            </option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">District</label>
                        <select name="district_id" class="form-select">
                            <option value="">All Districts</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}"
                                    {{ request('district_id') == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                     <div class="col-md-3">
                        <label class="form-label">Town</label>
                        <select name="town_id" class="form-select">
                            <option value="">All Towns</option>
                            @foreach ($towns as $town)
                                <option value="{{ $town->id }}"
                                    {{ request('town_id') == $town->id ? 'selected' : '' }}>
                                    {{ $town->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="">All</option>
                            <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ request('gender') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">First-Time Voters</label>
                        <select name="first_time_voter" class="form-select">
                            <option value="">All</option>
                            <option value="1" {{ request('first_time_voter') == '1' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-filter"></i> Filter
                        </button>
                    </div>
                     <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <a href="{{route('members.index')}}" class="btn btn-success w-100">
                            <i class="bi bi-filter"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Members Table --}}
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th>Age 2023</th>
                                <th>Age 2029</th>
                                <th>Gender</th>
                                <th>District</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($members as $member)
                                <tr>
                                   <td>
    {{ ($members->currentPage() - 1) * $members->perPage() + $loop->iteration }}
</td>
                                    <td>
                                        @if ($member->photo)
                                            <img src="{{ asset($member->photo) }}" alt="Photo"
                                                class="rounded-circle" width="40" height="40">
                                        @else
                                            <div class="rounded-circle bg-secondary d-inline-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px;">
                                                <i class="bi bi-person text-white"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $member->full_name }}
                                        @if ($member->age_2023 < 18 && $member->age_2029 >= 18 && $member->age_2029 <= 23)
                                            <span class="badge bg-info">First-Time Voter</span>
                                        @endif
                                    </td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->phone_primary }}</td>
                                    <td>{{ $member->current_age }}</td>
                                    <td>{{ $member->age_2023 }}</td>
                                    <td>{{ $member->age_2029 }}</td>
                                    <td>{{ ucfirst($member->gender) }}</td>
                                    <td>{{ $member->district->name }}</td>
                                    <td>
                                        @switch($member->status)
                                            @case('approved')
                                                <span class="badge bg-success">Active</span>
                                            @break

                                            @case('pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @break

                                            @case('rejected')
                                                <span class="badge bg-danger">Rejected</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('members.show', $member) }}" class="btn btn-outline-info" title="show member">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('members.edit', $member) }}" class="btn btn-outline-primary" title="edit member">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            @role('admin')
                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                                    data-bs-target="#statusModal{{ $member->id }}">
                                                    <i class="bi bi-envelope" title="approve member"></i>
                                                </button>
                                                <form action="{{ route('members.destroy', $member) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure?')" title="delete member">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            @endrole
                                        </div>

                                        {{-- Status Modal --}}
                                        @role('admin')
                                            <div class="modal fade" id="statusModal{{ $member->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('members.status', $member) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Update Status & Send Email</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Status</label>
                                                                    <select name="status" class="form-select" required>
                                                                        <option value="pending"
                                                                            {{ $member->status == 'pending' ? 'selected' : '' }}>
                                                                            Pending
                                                                        </option>
                                                                        <option value="approved"
                                                                            {{ $member->status == 'approved' ? 'selected' : '' }}>
                                                                            Approved
                                                                        </option>
                                                                        <option value="rejected"
                                                                            {{ $member->status == 'rejected' ? 'selected' : '' }}>
                                                                            Rejected
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <p class="text-muted">
                                                                    <i class="bi bi-info-circle"></i>
                                                                    An email will be sent to {{ $member->email }}
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    Cancel
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    Update & Send Email
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endrole
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center text-muted py-4">
                                            <i class="bi bi-inbox fs-1"></i>
                                            <p class="mt-2">No members found</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $members->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection