@extends('layouts.dashboard')

@section('title', 'Manager Dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-speedometer2"></i> Manager Dashboard</h2>
        <div class="text-muted">{{ now()->format('l, F j, Y') }}</div>
    </div>

    {{-- Statistics Cards --}}
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Members</h6>
                            <h3 class="mb-0">{{ number_format($stats['total_members'] ?? 0 ) }}</h3>
                        </div>
                        <div class="fs-1 text-primary">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Approved</h6>
                            <h3 class="mb-0">{{ number_format($stats['approved_members'] ?? 0 ) }}</h3>
                        </div>
                        <div class="fs-1 text-success">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Districts</h6>
                            <h3 class="mb-0">{{ number_format($stats['total_districts'] ?? 0 ) }}</h3>
                        </div>
                        <div class="fs-1 text-info">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Towns</h6>
                            <h3 class="mb-0">{{ number_format($stats['total_towns'] ?? 0 ) }}</h3>
                        </div>
                        <div class="fs-1 text-warning">
                            <i class="bi bi-building"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Members --}}
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="mb-0"><i class="bi bi-clock-history"></i> Recent Members</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>District</th>
                            <th>Town</th>
                            <th>Status</th>
                            <th>Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentMembers as $member)
                            <tr>
                                <td>{{ $member->full_name }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->district->name }}</td>
                                <td>{{ $member->town->name }}</td>
                                <td>
                                    <span class="badge bg-{{ $member->status == 'approved' ? 'success' : ($member->status == 'pending' ? 'warning' : 'danger') }}">
                                        {{ ucfirst($member->status) }}
                                    </span>
                                </td>
                                <td>{{ $member->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
