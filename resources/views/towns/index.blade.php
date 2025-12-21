@extends('layouts.dashboard')

@section('title', 'Towns')

@section('content')
<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2><i class="fas fa-building"></i> Towns Management</h2>
        </div>
        <div class="col-md-4 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTownModal">
                <i class="fas fa-plus-circle"></i> Add Town
            </button>
        </div>
    </div>
{{-- 
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif --}}

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-light">
            <form method="GET" class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control"
                           placeholder="Search by town name..." value="{{ request('search') }}">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-outline-secondary w-100">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Town Name</th>
                        <th>Clan</th>
                        <th>District</th>
                        <th>Members</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($towns as $town)
                        <tr>
                            <td><strong>{{ $town->name }}</strong></td>
                            <td><span class="badge bg-success">{{ $town->clan->name ?? 'N/A' }}</span></td>
                            <td><span class="badge bg-info">{{ $town->district->name ?? 'N/A' }}</span></td>
                            <td><span class="badge bg-primary">{{ $town->members->count() }}</span></td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <!-- Show -->
                                    <button class="btn btn-info"
                                            data-bs-toggle="modal"
                                            data-bs-target="#showTownModal"
                                            onclick="showTown('{{ $town->name }}', '{{ $town->clan->name ?? '' }}', '{{ $town->district->name ?? '' }}', {{ $town->members->count() }})"
                                            title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    {{-- @can('manage-towns') --}}
                                    <!-- Edit -->
                                    <button class="btn btn-warning"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editTownModal"
                                            onclick="editTown({{ $town->id }}, '{{ addslashes($town->name) }}', {{ $town->clan_id ?? 'null' }}, {{ $town->district_id ?? 'null' }})">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <!-- Delete -->
                                    <button class="btn btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteTownModal"
                                            onclick="setDeleteId({{ $town->id }}, '{{ addslashes($town->name) }}')">
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
                                <p>No towns found</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-light">
            <small class="text-muted">Total: {{ $towns->total() }} towns</small>
        </div>
    </div>

    <div class="mt-4">
        {{ $towns->links() }}
    </div>
</div>

{{-- ===================== Modals ===================== --}}

<div class="modal fade" id="createTownModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header bg-light border-bottom">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle"></i> Add New Town
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('towns.store') }}" id="createTownForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">District *</label>
                        <select name="district_id" id="createDistrictSelect" class="form-select" required onchange="updateClans('create')">
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
                        <label class="form-label fw-semibold">Clan *</label>
                        <select name="clan_id" id="createClanSelect" class="form-select" required>
                            <option value="">-- Choose a Clan --</option>
                            @foreach($clans as $clan)
                                <option value="{{ $clan->id }}" data-district="{{ $clan->district_id }}" {{ old('clan_id') == $clan->id ? 'selected' : '' }}>
                                    {{ $clan->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('clan_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Town Name *</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter town name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        Towns belong to clans and districts. Select district first, then the clan.
                    </div>
                </div>
                <div class="modal-footer bg-light border-top">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create Town</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Town Modal -->
<div class="modal fade" id="editTownModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header bg-light border-bottom">
                <h5 class="modal-title">
                    <i class="fas fa-edit"></i> Edit Town
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editTownForm">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">District *</label>
                        <select name="district_id" id="editDistrictSelect" class="form-select" required onchange="updateClans('edit')">
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
                        <label class="form-label fw-semibold">Clan *</label>
                        <select name="clan_id" id="editClanSelect" class="form-select" required>
                            <option value="">-- Choose a Clan --</option>
                            @foreach($clans as $clan)
                                <option value="{{ $clan->id }}" data-district="{{ $clan->district_id }}">
                                    {{ $clan->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('clan_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Town Name *</label>
                        <input type="text" name="name" id="editTownName" class="form-control" placeholder="Enter town name" required>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer bg-light border-top">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Town</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Show Town Modal -->
<div class="modal fade" id="showTownModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header bg-light border-bottom">
                <h5 class="modal-title"><i class="fas fa-info-circle"></i> Town Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 text-center mb-3">
                        <div style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#f093fb,#f5576c);display:flex;align-items:center;justify-content:center;color:white;font-size:2rem;margin:0 auto;">
                            <i class="fas fa-building"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h5 id="showTownName" class="mb-3"></h5>
                        <div class="mb-2"><span class="text-muted">Clan:</span> <strong id="showTownClan" class="badge bg-secondary"></strong></div>
                        <div class="mb-2"><span class="text-muted">District:</span> <strong id="showTownDistrict" class="badge bg-info"></strong></div>
                        <div><span class="text-muted">Total Members:</span> <strong id="showTownMembers" class="text-primary"></strong></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-top">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete Town Modal -->
<div class="modal fade" id="deleteTownModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header bg-danger bg-opacity-10 border-bottom">
                <h5 class="modal-title text-danger"><i class="fas fa-exclamation-triangle"></i> Delete Town</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this town?</p>
                <div class="alert alert-warning" role="alert">
                    <strong>Town:</strong> <span id="deleteTownName"></span><br>
                    <small>This action cannot be undone. All associated members will be affected.</small>
                </div>
            </div>
            <form method="POST" id="deleteTownForm">
                @csrf
                @method('DELETE')
                <div class="modal-footer bg-light border-top">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete Town</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ===================== JS ===================== --}}
<script>
    const clansData = @json($clansData);

    function updateClans(formType) {
        const prefix = formType === 'create' ? 'create' : 'edit';
        const districtSelect = document.getElementById(`${prefix}DistrictSelect`);
        const clanSelect = document.getElementById(`${prefix}ClanSelect`);
        const selectedDistrictId = parseInt(districtSelect.value);

        clanSelect.innerHTML = '<option value="">-- Choose a Clan --</option>';

        if (selectedDistrictId && clansData[selectedDistrictId]) {
            clansData[selectedDistrictId].forEach(clan => {
                const option = document.createElement('option');
                option.value = clan.id;
                option.textContent = clan.name;
                option.setAttribute('data-district', selectedDistrictId);
                clanSelect.appendChild(option);
            });
        }
    }

    function editTown(id, name, clanId, districtId) {
        document.getElementById('editTownForm').action = `/towns/${id}`;
        document.getElementById('editTownName').value = name;
        document.getElementById('editDistrictSelect').value = districtId;
        updateClans('edit');
        setTimeout(() => {
            document.getElementById('editClanSelect').value = clanId;
        }, 50);
    }

    function showTown(name, clan, district, members) {
        document.getElementById('showTownName').textContent = name;
        document.getElementById('showTownClan').textContent = clan;
        document.getElementById('showTownDistrict').textContent = district;
        document.getElementById('showTownMembers').textContent = members;
    }

    function setDeleteId(id, name) {
        document.getElementById('deleteTownForm').action = `/towns/${id}`;
        document.getElementById('deleteTownName').textContent = name;
    }

    document.getElementById('createTownModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('createTownForm').reset();
    });

    document.getElementById('editTownModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('editTownForm').reset();
    });
</script>
@endsection
