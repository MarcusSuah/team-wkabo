@extends('layouts.dashboard')

@section('title', 'Edit Member')

@section('content')
    <div class="container-fluid">
        <div class="mb-4">
            <h2><i class="bi bi-pencil-square"></i> Edit Member</h2>
            <p class="text-muted">Update member information</p>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="bi bi-exclamation-circle"></i> Please correct the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data"
            id="memberForm">
            @csrf
            @method('PUT')

            {{-- Personal Information --}}
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-person"></i> Personal Information</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control" required
                                value="{{ old('first_name', $member->first_name) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Middle Name</label>
                            <input type="text" name="mid_name" class="form-control"
                                value="{{ old('mid_name', $member->mid_name) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control" required
                                value="{{ old('last_name', $member->last_name) }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" name="date_of_birth" id="dob" class="form-control" required
                                value="{{ old('date_of_birth') ?? ($member->date_of_birth ? $member->date_of_birth->format('Y-m-d') : '') }}"
                                max="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Current Age</label>
                            <input type="text" id="currentAge" class="form-control" readonly
                                value="{{ $member->current_age ?? '' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Age in 2029</label>
                            <input type="text" id="age2029" class="form-control" readonly
                                value="{{ $member->age_2029 ?? '' }}">
                            <small id="firstTimeVoter" class="text-info"></small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                            <select name="gender" class="form-select" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender', $member->gender) == 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female" {{ old('gender', $member->gender) == 'female' ? 'selected' : '' }}>
                                    Female</option>
                                <option value="other" {{ old('gender', $member->gender) == 'other' ? 'selected' : '' }}>
                                    Other</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Occupation</label>
                            <input type="text" name="occupation" class="form-control"
                                value="{{ old('occupation', $member->occupation) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Passport Photo</label>
                            <input type="file" name="photo" id="photoInput" class="form-control" accept="image/*">
                            <div id="photoPreview" class="mt-2">
                                @if ($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" class="img-thumbnail"
                                        style="max-width: 200px;">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Information --}}
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-telephone"></i> Contact Information</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Primary Phone <span class="text-danger">*</span></label>
                            <input type="tel" name="phone_primary" id="phone_primary"
                                class="form-control @error('phone_primary') is-invalid @enderror" required
                                value="{{ old('phone_primary', $member->phone_primary) }}">
                            <div class="form-check mt-2">
                                <input type="checkbox" name="whatsapp_primary" id="whatsapp_primary"
                                    class="form-check-input" value="1"
                                    {{ old('whatsapp_primary', $member->whatsapp_primary) ? 'checked' : '' }}>
                                <label class="form-check-label" for="whatsapp_primary">WhatsApp available</label>
                            </div>
                            @error('phone_primary')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Secondary Phone</label>
                            <input type="tel" name="phone_secondary" id="phone_secondary"
                                class="form-control @error('phone_secondary') is-invalid @enderror"
                                value="{{ old('phone_secondary', $member->phone_secondary) }}">
                            <div class="form-check mt-2">
                                <input type="checkbox" name="whatsapp_secondary" id="whatsapp_secondary"
                                    class="form-check-input" value="1"
                                    {{ old('whatsapp_secondary', $member->whatsapp_secondary) ? 'checked' : '' }}>
                                <label class="form-check-label" for="whatsapp_secondary">WhatsApp available</label>
                            </div>
                            @error('phone_secondary')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" required
                                value="{{ old('email', $member->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Current Residence <span class="text-danger">*</span></label>
                            <input type="text" name="current_residence"
                                class="form-control @error('current_residence') is-invalid @enderror" required
                                value="{{ old('current_residence', $member->current_residence) }}">
                            @error('current_residence')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Location Information --}}
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-geo-alt"></i> Location Information</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">District <span class="text-danger">*</span></label>
                            <select name="district_id" id="district" class="form-select" required>
                                <option value="">Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}"
                                        {{ old('district_id', $member->district_id) == $district->id ? 'selected' : '' }}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Clan <span class="text-danger">*</span></label>
                            <select name="clan_id" id="clan" class="form-select" required>
                                <option value="">Select District First</option>
                                @if ($member->district_id)
                                    @foreach ($clans as $clan)
                                        <option value="{{ $clan->id }}"
                                            {{ old('clan_id', $member->clan_id) == $clan->id ? 'selected' : '' }}>
                                            {{ $clan->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Town <span class="text-danger">*</span></label>
                            <select name="town_id" id="town" class="form-select" required>
                                <option value="">Select Clan First</option>
                                @if ($member->clan_id)
                                    @foreach ($towns as $town)
                                        <option value="{{ $town->id }}"
                                            {{ old('town_id', $member->town_id) == $town->id ? 'selected' : '' }}>
                                            {{ $town->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Voting Precinct 2029</label>
                            <input type="text" name="voting_precinct_2029" class="form-control"
                                value="{{ old('voting_precinct_2029', $member->voting_precinct_2029) }}">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Political Involvement --}}
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-info-circle"></i> Additional Information</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Prior Political Involvement</label>
                            <textarea name="prior_political_involvement" class="form-control" rows="3">{{ old('prior_political_involvement', $member->prior_political_involvement) }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Reasons for Joining</label>
                            <textarea name="reasons_for_joining" class="form-control" rows="3">{{ old('reasons_for_joining', $member->reasons_for_joining) }}</textarea>
                        </div>

                        {{-- Contributions & Willingness --}}
                        <div class="card mb-4">
                            <div class="card-header bg-white">
                                <h5 class="mb-0"><i class="bi bi-hand-thumbs-up"></i> Contributions & Willingness</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- Willingness -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="fw-bold d-block mb-2">
                                                Willing to Volunteer? <span class="text-danger">*</span>
                                            </label>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="willing_to_volunteer" id="volunteer_yes" value="Yes"
                                                    {{ old('willing_to_volunteer', $member->willing_to_volunteer) === 'Yes' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="volunteer_yes">Yes</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="willing_to_volunteer" id="volunteer_no" value="No"
                                                    {{ old('willing_to_volunteer', $member->willing_to_volunteer) === 'No' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="volunteer_no">No</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="willing_to_volunteer" id="volunteer_maybe" value="Maybe"
                                                    {{ old('willing_to_volunteer', $member->willing_to_volunteer) === 'Maybe' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="volunteer_maybe">Maybe</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold d-block mb-2">
                                                Willing to Lead? <span class="text-danger">*</span>
                                            </label>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="willing_to_lead"
                                                    id="lead_yes" value="Yes"
                                                    {{ old('willing_to_lead', $member->willing_to_lead) === 'Yes' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="lead_yes">Yes</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="willing_to_lead"
                                                    id="lead_no" value="No"
                                                    {{ old('willing_to_lead', $member->willing_to_lead) === 'No' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="lead_no">No</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="willing_to_lead"
                                                    id="lead_maybe" value="Maybe"
                                                    {{ old('willing_to_lead', $member->willing_to_lead) === 'Maybe' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="lead_maybe">Maybe</label>
                                            </div>
                                        </div>
                                    </div>

                                   {{-- Preferred Contribution Areas --}}
                                    <div class="col-md-12">
                                        <label class="form-label">Preferred Contribution Areas <span
                                                class="text-danger">*</span></label>
                                        <div class="row">
                                            @php
                                                $contributionAreas = [
                                                    'Fundraising',
                                                    'Community Outreach',
                                                    'Media & Communications',
                                                    'Event Organization',
                                                    'Voter Registration',
                                                    'Mentoring',
                                                    'Administrative Support',
                                                    'Other',
                                                ];
                                                $oldContributions = old('preferred_contributions', []);
                                                if (empty($oldContributions) && $member->preferred_contributions) {
                                                    $oldContributions = array_map('trim', explode(',', $member->preferred_contributions));
                                                }
                                            @endphp

                                            @foreach ($contributionAreas as $index => $area)
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="preferred_contributions[]" value="{{ $area }}"
                                                            id="contrib_{{ $loop->index }}"
                                                            {{ in_array($area, $oldContributions) ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="contrib_{{ $loop->index }}">
                                                            {{ $area }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('preferred_contributions')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Declaration --}}
            <div class="card mb-4">
                <div class="card-body">
                    <div class="alert alert-success mb-0">
                        <div class="form-check">
                            <input class="form-check-input @error('declaration_accepted') is-invalid @enderror"
                                type="checkbox" name="declaration_accepted" id="declaration" value="1"
                                {{ old('declaration_accepted', $member->declaration_accepted) ? 'checked' : '' }} required>
                            <label class="form-check-label" for="declaration">
                                <strong>I declare that all information provided is accurate and I join Project-29
                                    voluntarily</strong>
                                <p class="small mt-2 mb-0">I hereby declare that all information provided is accurate and
                                    true to the best of my knowledge. I voluntarily join Project-29 and the Not Too Young To
                                    Lead Movement to support democratic engagement and youth empowerment in Lofa County,
                                    Electoral District #5.</p>
                            </label>
                        </div>
                        @error('declaration_accepted')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('members.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                    <i class="bi bi-check-circle"></i> Update Member
                </button>
            </div>
        </form>
    </div>


    @push('scripts')
        <script>
            // Age calculation
            document.getElementById('dob').addEventListener('change', function() {
                const dob = new Date(this.value);
                const today = new Date();
                const target2029 = new Date(2029, 0, 1);

                let currentAge = today.getFullYear() - dob.getFullYear();
                const monthDiff = today.getMonth() - dob.getMonth();
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                    currentAge--;
                }

                let age2029 = 2029 - dob.getFullYear();

                document.getElementById('currentAge').value = currentAge;
                document.getElementById('age2029').value = age2029;

                // Check if first-time voter
                if (currentAge < 18 && age2029 >= 18) {
                    document.getElementById('firstTimeVoter').textContent = '✓ First-Time Voter in 2029';
                } else {
                    document.getElementById('firstTimeVoter').textContent = '';
                }
            });

            // Cascade dropdowns
            document.getElementById('district').addEventListener('change', function() {
                const districtId = this.value;
                const clanSelect = document.getElementById('clan');
                const townSelect = document.getElementById('town');

                clanSelect.disabled = true;
                townSelect.disabled = true;
                clanSelect.innerHTML = '<option value="">Loading...</option>';
                townSelect.innerHTML = '<option value="">Select Clan First</option>';

                if (districtId) {
                    fetch(`/ajax/clans/district/${districtId}`)
                        .then(res => res.json())
                        .then(data => {
                            clanSelect.innerHTML = '<option value="">Select Clan</option>';
                            data.forEach(clan => {
                                clanSelect.innerHTML += `<option value="${clan.id}">${clan.name}</option>`;
                            });
                            clanSelect.disabled = false;
                        })
                        .catch(error => {
                            console.error('Error loading clans:', error);
                            clanSelect.innerHTML = '<option value="">Error loading clans</option>';
                        });
                }
            });

            document.getElementById('clan').addEventListener('change', function() {
                const clanId = this.value;
                const townSelect = document.getElementById('town');

                townSelect.disabled = true;
                townSelect.innerHTML = '<option value="">Loading...</option>';

                if (clanId) {
                    fetch(`/ajax/towns/clan/${clanId}`)
                        .then(res => res.json())
                        .then(data => {
                            townSelect.innerHTML = '<option value="">Select Town</option>';
                            data.forEach(town => {
                                townSelect.innerHTML += `<option value="${town.id}">${town.name}</option>`;
                            });
                            townSelect.disabled = false;
                        })
                        .catch(error => {
                            console.error('Error loading towns:', error);
                            townSelect.innerHTML = '<option value="">Error loading towns</option>';
                        });
                }
            });

            // Photo preview
            document.getElementById('photoInput').addEventListener('change', function(e) {
                const preview = document.getElementById('photoPreview');
                const file = e.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.innerHTML =
                            `<img src="${e.target.result}" class="img-thumbnail" style="max-width: 200px;">`;
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Initialize age calculation on page load
            document.addEventListener('DOMContentLoaded', function() {
                const dob = document.getElementById('dob');
                if (dob.value) {
                    const event = new Event('change');
                    dob.dispatchEvent(event);
                }
            });
        </script>
    @endpush
@endsection
