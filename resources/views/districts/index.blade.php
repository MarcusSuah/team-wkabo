@extends('layouts.dashboard')

@section('title', 'Districts')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="bi bi-geo-alt"></i> Districts</h2>
            <div>
                {{-- @can('manage-districts') --}}
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDistrictModal">
                    <i class="fas fa-plus-circle"></i> Add District
                </button>
                {{-- @endcan --}}
                <div class="btn-group ms-2">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-download"></i> Export
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('districts.index', ['export' => 'pdf']) }}">
                                <i class="bi bi-file-pdf"></i> PDF
                            </a></li>
                        <li><a class="dropdown-item" href="{{ route('districts.index', ['export' => 'csv']) }}">
                                <i class="bi bi-file-csv"></i> CSV
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Clans</th>
                                <th>Towns</th>
                                <th>Members</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($districts as $district)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="badge bg-primary">{{ $district->code }}</span></td>
                                    <td>{{ $district->name }}</td>
                                    <td>{{ Str::limit($district->description, 50) }}</td>
                                    <td><span class="badge bg-info">{{ $district->clans_count }}</span></td>
                                    <td><span class="badge bg-warning">{{ $district->towns_count }}</span></td>
                                    <td><span class="badge bg-success">{{ $district->members_count }}</span></td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-outline-primary me-2 rounded" data-bs-toggle="modal"
                                                data-bs-target="#editDistrictModal"
                                                onclick="editDistrict({{ $district->id }}, '{{ $district->code }}', `{{ addslashes($district->name) }}`, `{{ addslashes($district->description ?? '') }}`)">
                                                <i class="bi bi-pencil"></i>
                                            </button>

                                            <!-- Delete Button -->
                                            <form action="{{ route('districts.destroy', $district) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this district?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">No districts found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $districts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="createDistrictModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content border-0">
            <div class="modal-header bg-light border-bottom">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle"></i> Add New District
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('districts.store') }}" id="createDistrictForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">District Code <span
                                class="text-muted">(Auto-generated)</span></label>
                        <input type="text" class="form-control" id="createCode" readonly
                            placeholder="Will be auto-generated as DST-XXXX">
                        <small class="text-muted">The code will be automatically generated when you save</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">District Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="e.g., Kigali City" required>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4"
                            placeholder="Enter district description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer bg-light border-top">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Create District
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit District Modal -->
<div class="modal fade" id="editDistrictModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content border-0">
            <div class="modal-header bg-light border-bottom">
                <h5 class="modal-title">
                    <i class="fas fa-edit"></i> Edit District
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editDistrictForm">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">District Code <span class="text-muted">(Auto-generated,
                                Read-only)</span></label>
                        <input type="text" class="form-control" id="editCode" readonly
                            placeholder="Auto-generated code">
                        <small class="text-muted">This code was auto-generated and cannot be changed</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">District Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="editName" placeholder="Enter district name" required>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="editDescription"
                            rows="4" placeholder="Enter district description"></textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer bg-light border-top">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update District
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete District Modal -->
<div class="modal fade" id="deleteDistrictModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header bg-danger bg-opacity-10 border-bottom">
                <h5 class="modal-title text-danger">
                    <i class="fas fa-exclamation-triangle"></i> Delete District
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3">Are you sure you want to delete this district?</p>
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-info-circle"></i>
                    <strong>District:</strong> <span id="deleteDistrictName"></span><br>
                    <small>This action cannot be undone. All associated clans and members will be affected.</small>
                </div>
            </div>
            <form method="POST" id="deleteDistrictForm">
                @csrf
                @method('DELETE')
                <div class="modal-footer bg-light border-top">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Delete District
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function editDistrict(id, code, name, description) {
        document.getElementById('editDistrictForm').action = `/districts/${id}`;
        document.getElementById('editCode').value = code;
        document.getElementById('editName').value = name;
        document.getElementById('editDescription').value = description;
    }

    function setDeleteId(id, name) {
        document.getElementById('deleteDistrictForm').action = `/districts/${id}`;
        document.getElementById('deleteDistrictName').textContent = name;
    }

    // Clear form when modal is hidden
    document.getElementById('createDistrictModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('createDistrictForm').reset();
    });

    document.getElementById('editDistrictModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('editDistrictForm').reset();
    });
</script>
