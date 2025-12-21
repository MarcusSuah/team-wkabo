@extends('layouts.dashboard')

@section('title', 'CLans')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="bi bi-people"></i> CLans</h2>
            <div>
                {{-- @can('manage-clans') --}}
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createClanModal">
                    <i class="fas fa-plus-circle"></i> Add Clan
                </button>
                {{-- @endcan --}}
                <div class="btn-group ms-2">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-download"></i> Export
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('clans.index', ['export' => 'pdf']) }}">
                                <i class="bi bi-file-pdf"></i> PDF
                            </a></li>
                        <li><a class="dropdown-item" href="{{ route('clans.index', ['export' => 'csv']) }}">
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
                                <th style="width: 35%;">Clan Name</th>
                                <th style="width: 30%;">District</th>
                                <th style="width: 15%;">Towns</th>
                                <th style="width: 15%;">Members</th>
                                <th style="width: 5%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clans as $clan)
                                <tr>
                                    <td>
                                        <strong>{{ $clan->name }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">{{ $clan->district->name }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $clan->towns->count() }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $clan->members->count() }}</span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#showClanModal"
                                                onclick="showClan({{ $clan->id }}, '{{ addslashes($clan->name) }}', '{{ addslashes($clan->district->name) }}', {{ $clan->towns->count() }}, {{ $clan->members->count() }})"
                                                title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            {{-- @can('manage-clans') --}}
                                                <button class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editClanModal"
                                                    onclick="editClan({{ $clan->id }}, '{{ addslashes($clan->name) }}', {{ $clan->district_id }})">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteClanModal"
                                                    onclick="setDeleteId({{ $clan->id }}, '{{ addslashes($clan->name) }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            {{-- @endcan --}}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5">
                                        <i class="fas fa-inbox" style="font-size: 2.5rem; margin-bottom: 10px;"></i>
                                        <p>No clans found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-light">
                    <small class="text-muted">Total: {{ $clans->total() }} clans</small>
                </div>
                <div class="mt-3">
                    {{ $clans->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Create Clan Modal -->
<div class="modal fade" id="createClanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header bg-light border-bottom">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle"></i> Add New Clan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('clans.store') }}" id="createClanForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Select District *</label>
                        <select name="district_id" class="form-select @error('district_id') is-invalid @enderror" required id="createDistrictSelect">
                            <option value="">-- Choose a District --</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('district_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Clan Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" placeholder="e.g., Abagogwe, Abarundi, Abahamburira" required id="createClanName">
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Enter the name of the clan</small>
                    </div>

                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info-circle"></i>
                        <strong>Note:</strong> Clans are organized under districts. Make sure to select the correct district first.
                    </div>
                </div>
                <div class="modal-footer bg-light border-top">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Create Clan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Clan Modal -->
<div class="modal fade" id="editClanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header bg-light border-bottom">
                <h5 class="modal-title">
                    <i class="fas fa-edit"></i> Edit Clan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editClanForm">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Select District *</label>
                        <select name="district_id" class="form-select @error('district_id') is-invalid @enderror" required id="editDistrictSelect">
                            <option value="">-- Choose a District --</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                        @error('district_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Clan Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               id="editClanName" placeholder="Enter clan name" required>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer bg-light border-top">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Clan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Show Clan Modal -->
<div class="modal fade" id="showClanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header bg-light border-bottom">
                <h5 class="modal-title">
                    <i class="fas fa-info-circle"></i> Clan Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 text-center mb-3">
                        <div style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; margin: 0 auto;">
                            <i class="fas fa-people-group"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h5 id="showClanName" class="mb-3"></h5>
                        <div class="mb-2">
                            <span class="text-muted">District:</span>
                            <strong id="showClanDistrict"></strong>
                        </div>
                        <div class="mb-2">
                            <span class="text-muted">Total Towns:</span>
                            <strong id="showClanTowns" class="text-info"></strong>
                        </div>
                        <div>
                            <span class="text-muted">Total Members:</span>
                            <strong id="showClanMembers" class="text-primary"></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-top">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Clan Modal -->
<div class="modal fade" id="deleteClanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header bg-danger bg-opacity-10 border-bottom">
                <h5 class="modal-title text-danger">
                    <i class="fas fa-exclamation-triangle"></i> Delete Clan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3">Are you sure you want to delete this clan?</p>
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-info-circle"></i>
                    <strong>Clan:</strong> <span id="deleteClanName"></span><br>
                    <small>This action cannot be undone. All associated towns and members will be affected.</small>
                </div>
            </div>
            <form method="POST" id="deleteClanForm">
                @csrf
                @method('DELETE')
                <div class="modal-footer bg-light border-top">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Delete Clan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function editClan(id, name, districtId) {
        document.getElementById('editClanForm').action = `/clans/${id}`;
        document.getElementById('editClanName').value = name;
        document.getElementById('editDistrictSelect').value = districtId;
    }

    function showClan(id, name, district, towns, members) {
        document.getElementById('showClanName').textContent = name;
        document.getElementById('showClanDistrict').textContent = district;
        document.getElementById('showClanTowns').textContent = towns;
        document.getElementById('showClanMembers').textContent = members;
    }

    function setDeleteId(id, name) {
        document.getElementById('deleteClanForm').action = `/clans/${id}`;
        document.getElementById('deleteClanName').textContent = name;
    }

    // Clear form when modal is hidden
    document.getElementById('createClanModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('createClanForm').reset();
    });

    document.getElementById('editClanModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('editClanForm').reset();
    });
</script>
