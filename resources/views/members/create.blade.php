@extends('layouts.dashboard')

@section('title', 'Register Member')

@section('content')
    <div class="container-fluid">
        <div class="mb-4">
            <h2><i class="bi bi-person-plus"></i> Member Registration</h2>
            <p class="text-muted">Complete all required fields to register a new member</p>
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

        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data" id="memberForm">
            @csrf

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
                                value="{{ old('first_name') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Middle Name</label>
                            <input type="text" name="mid_name" class="form-control" value="{{ old('mid_name') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control" required
                                value="{{ old('last_name') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" name="date_of_birth" id="dob" class="form-control" required
                                value="{{ old('date_of_birth') }}" max="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Current Age</label>
                            <input type="text" id="currentAge" class="form-control" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Age in 2029</label>
                            <input type="text" id="age2029" class="form-control" readonly>
                            <small id="firstTimeVoter" class="text-info"></small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                            <select name="gender" class="form-select" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Occupation</label>
                            <input type="text" name="occupation" class="form-control" value="{{ old('occupation') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Passport Photo</label>
                            <input type="file" name="photo" id="photoInput" class="form-control" accept="image/*">
                            <div id="photoPreview" class="mt-2"></div>
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
                                class="form-control @error('phone_primary') is-invalid @enderror" 
                                value="{{ old('phone_primary') }}" required>
                            <div class="form-check mt-2">
                                <input type="checkbox" name="whatsapp_primary" id="whatsapp_primary"
                                    class="form-check-input" value="1"
                                    {{ old('whatsapp_primary') ? 'checked' : '' }}>
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
                                value="{{ old('phone_secondary') }}">
                            <div class="form-check mt-2">
                                <input type="checkbox" name="whatsapp_secondary" id="whatsapp_secondary"
                                    class="form-check-input" value="1"
                                    {{ old('whatsapp_secondary') ? 'checked' : '' }}>
                                <label class="form-check-label" for="whatsapp_secondary">WhatsApp available</label>
                            </div>
                            @error('phone_secondary')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" 
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Current Residence <span class="text-danger">*</span></label>
                            <input type="text" name="current_residence"
                                class="form-control @error('current_residence') is-invalid @enderror" required
                                value="{{ old('current_residence') }}">
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
                                        {{ old('district_id') == $district->id ? 'selected' : '' }}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Clan <span class="text-danger">*</span></label>
                            <select name="clan_id" id="clan" class="form-select" required disabled>
                                <option value="">Select District First</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Town <span class="text-danger">*</span></label>
                            <select name="town_id" id="town" class="form-select" required disabled>
                                <option value="">Select Clan First</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Voting Precinct 2029</label>
                            <input type="text" name="voting_precinct_2029" class="form-control"
                                value="{{ old('voting_precinct_2029') }}">
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
                            <textarea name="prior_political_involvement" class="form-control" rows="3">{{ old('prior_political_involvement') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Reasons for Joining</label>
                            <textarea name="reasons_for_joining" class="form-control" rows="3">{{ old('reasons_for_joining') }}</textarea>
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
                                                    {{ old('willing_to_volunteer') === 'Yes' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="volunteer_yes">Yes</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="willing_to_volunteer" id="volunteer_no" value="No"
                                                    {{ old('willing_to_volunteer') === 'No' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="volunteer_no">No</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="willing_to_volunteer" id="volunteer_maybe" value="Maybe"
                                                    {{ old('willing_to_volunteer') === 'Maybe' ? 'checked' : '' }}>
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
                                                    {{ old('willing_to_lead') === 'Yes' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="lead_yes">Yes</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="willing_to_lead"
                                                    id="lead_no" value="No"
                                                    {{ old('willing_to_lead') === 'No' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="lead_no">No</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="willing_to_lead"
                                                    id="lead_maybe" value="Maybe"
                                                    {{ old('willing_to_lead') === 'Maybe' ? 'checked' : '' }}>
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
                                type="checkbox" name="declaration_accepted" id="declaration" value="1" required>
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
                    <i class="bi bi-check-circle"></i> Register Member
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

                // Calculate current age
                let currentAge = today.getFullYear() - dob.getFullYear();
                const monthDiff = today.getMonth() - dob.getMonth();
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                    currentAge--;
                }

                // Calculate age in October 2023
                const oct2023 = new Date(2023, 9, 1); // October 1, 2023
                let age2023 = 2023 - dob.getFullYear();
                const monthDiff2023 = 9 - dob.getMonth(); // October is month 9
                if (monthDiff2023 < 0 || (monthDiff2023 === 0 && 1 < dob.getDate())) {
                    age2023--;
                }

                // Calculate age in October 2029
                const oct2029 = new Date(2029, 9, 1); // October 1, 2029
                let age2029 = 2029 - dob.getFullYear();
                const monthDiff2029 = 9 - dob.getMonth();
                if (monthDiff2029 < 0 || (monthDiff2029 === 0 && 1 < dob.getDate())) {
                    age2029--;
                }

                document.getElementById('currentAge').value = currentAge;
                document.getElementById('age2029').value = age2029;

                // Check if first-time voter
                // Rule: Age in Oct 2023 < 18 AND Age in Oct 2029 >= 18 AND Age in Oct 2029 < 23
                if (age2023 < 18 && age2029 >= 18 && age2029 < 23) {
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

            // Duplicate check
            let checkTimeout;
            document.getElementById('email').addEventListener('input', function() {
                clearTimeout(checkTimeout);
                checkTimeout = setTimeout(() => checkDuplicate(), 500);
            });

            document.getElementById('phone_primary').addEventListener('input', function() {
                clearTimeout(checkTimeout);
                checkTimeout = setTimeout(() => checkDuplicate(), 500);
            });

            function checkDuplicate() {
                const email = document.getElementById('email').value;
                const phone = document.getElementById('phone_primary').value;

                if (email || phone) {
                    fetch('/ajax/members/check-duplicate', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                email,
                                phone
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.exists) {
                                if (!document.getElementById('duplicateError')) {
                                    const errorEl = document.createElement('div');
                                    errorEl.id = 'duplicateError';
                                    errorEl.className = 'alert alert-warning mt-2';
                                    errorEl.innerHTML = '<i class="bi bi-exclamation-triangle"></i> This email or phone is already registered';
                                    document.getElementById('phone_primary').parentElement.insertAdjacentElement('afterend', errorEl);
                                }
                                document.getElementById('submitBtn').disabled = true;
                            } else {
                                const errorEl = document.getElementById('duplicateError');
                                if (errorEl) errorEl.remove();
                                document.getElementById('submitBtn').disabled = false;
                            }
                        })
                        .catch(error => {
                            console.error('Error checking duplicate:', error);
                        });
                }
            }
        </script>
    @endpush
@endsection