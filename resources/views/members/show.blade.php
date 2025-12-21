{{-- resources/views/members/show.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Member Details')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2><i class="bi bi-person-vcard"></i> Member Details</h2>
                <p class="text-muted">View and manage member information</p>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            {{-- Member Card with Photo --}}
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        @if ($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" class="rounded-circle mb-3"
                                style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #007bff;">
                        @else
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3"
                                style="width: 150px; height: 150px; border: 3px solid #007bff;">
                                <i class="bi bi-person" style="font-size: 3rem; color: #ccc;"></i>
                            </div>
                        @endif

                        <h4 class="mb-1">{{ $member->full_name }}</h4>
                        <p class="text-muted">{{ $member->occupation ?? 'No occupation listed' }}</p>

                        {{-- Status Badge --}}
                        <div class="mb-3">
                            @if ($member->status == 'approved')
                                <span class="badge bg-success" style="font-size: 0.95rem; padding: 0.5rem 1rem;">
                                    <i class="bi bi-check-circle"></i> Active
                                </span>
                            @elseif ($member->status == 'pending')
                                <span class="badge bg-warning" style="font-size: 0.95rem; padding: 0.5rem 1rem;">
                                    <i class="bi bi-clock"></i> Pending
                                </span>
                            @elseif ($member->status == 'rejected')
                                <span class="badge bg-danger" style="font-size: 0.95rem; padding: 0.5rem 1rem;">
                                    <i class="bi bi-x-circle"></i> Rejected
                                </span>
                            @endif
                        </div>

                        {{-- Quick Actions --}}
                        @if ($member->status == 'pending')
                            <div class="d-grid gap-2">
                                <form action="{{ route('members.approve', $member->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm w-100">
                                        <i class="bi bi-check-circle"></i> Approve
                                    </button>
                                </form>
                                <form action="{{ route('members.reject', $member->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger btn-sm w-100">
                                        <i class="bi bi-x-circle"></i> Reject
                                    </button>
                                </form>
                            </div>
                        @endif

                        <hr>

                        {{-- Quick Stats --}}
                        <div class="row text-center g-3">
                            <div class="col-6">
                                <div>
                                    <span class="h4">{{ $member->current_age }}</span>
                                    <p class="text-muted small mb-0">Current Age</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <span class="h4">{{ $member->age_2029 }}</span>
                                    <p class="text-muted small mb-0">Age in 2029</p>
                                </div>
                            </div>
                        </div>

                        @if ($member->current_age < 18 && $member->age_2029 >= 18)
                            <div class="alert alert-info small mt-3 mb-0">
                                <i class="bi bi-info-circle"></i> First-Time Voter in 2029
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Member Timeline --}}
                <div class="card mt-4">
                    <div class="card-header bg-white">
                        <h6 class="mb-0"><i class="bi bi-clock-history"></i> Member Timeline</h6>
                    </div>
                    <div class="card-body">
                        <small class="text-muted">
                            <i class="bi bi-calendar"></i> <strong>Registered:</strong><br>
                            {{ $member->created_at->format('F j, Y') }} at
                            {{ $member->created_at->format('H:i') }}<br><br>

                            <i class="bi bi-pencil"></i> <strong>Last Updated:</strong><br>
                            {{ $member->updated_at->format('F j, Y') }} at {{ $member->updated_at->format('H:i') }}
                        </small>
                    </div>
                </div>
            </div>

            {{-- Main Content --}}
            <div class="col-md-8">
                {{-- Personal Information --}}
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-person"></i> Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">First Name</label>
                                <p class="h6">{{ $member->first_name }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Middle Name</label>
                                <p class="h6">{{ $member->mid_name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Last Name</label>
                                <p class="h6">{{ $member->last_name }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Gender</label>
                                <p class="h6">{{ ucfirst($member->gender) }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Date of Birth</label>
                                <p class="h6">{{ $member->date_of_birth->format('F j, Y') }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Occupation</label>
                                <p class="h6">{{ $member->occupation ?? 'N/A' }}</p>
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
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Primary Phone</label>
                                <p class="h6">
                                    <a href="tel:{{ $member->phone_primary }}">{{ $member->phone_primary }}</a>
                                    @if ($member->whatsapp_primary)
                                        <span class="badge bg-success"><i class="bi bi-whatsapp"></i></span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Secondary Phone</label>
                                <p class="h6">
                                    @if ($member->phone_secondary)
                                        <a href="tel:{{ $member->phone_secondary }}">{{ $member->phone_secondary }}</a>
                                        @if ($member->whatsapp_secondary)
                                            <span class="badge bg-success"><i class="bi bi-whatsapp"></i></span>
                                        @endif
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Email Address</label>
                                <p class="h6">
                                    @if ($member->email)
                                        <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Current Residence</label>
                                <p class="h6">{{ $member->current_residence }}</p>
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
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">District</label>
                                <p class="h6">{{ $member->district->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Clan</label>
                                <p class="h6">{{ $member->clan->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Town</label>
                                <p class="h6">{{ $member->town->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Voting Precinct 2029</label>
                                <p class="h6">{{ $member->voting_precinct_2029 ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Political Background --}}
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-info-circle"></i> Political Background</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label text-muted">Prior Political Involvement</label>
                            <p>{{ $member->prior_political_involvement ?? 'No prior experience listed' }}</p>
                        </div>
                        <div class="mb-0">
                            <label class="form-label text-muted">Reasons for Joining</label>
                            <p>{{ $member->reasons_for_joining ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Contributions & Willingness --}}
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-hand-thumbs-up"></i> Contributions & Willingness</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Willing to Volunteer</label>
                                <p class="h6">
                                    @if ($member->willing_to_volunteer)
                                        <span class="badge bg-success"><i class="bi bi-check-circle"></i> Yes</span>
                                    @else
                                        <span class="badge bg-danger"><i class="bi bi-x-circle"></i> No</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Willing to Lead</label>
                                <p class="h6">
                                    @if ($member->willing_to_lead)
                                        <span class="badge bg-success"><i class="bi bi-check-circle"></i> Yes</span>
                                    @else
                                        <span class="badge bg-danger"><i class="bi bi-x-circle"></i> No</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        @if ($member->preferred_contributions)
                            <div class="mt-3">
                                <label class="form-label text-muted">Preferred Contribution Areas</label>
                                <div>
                                    @php
                                        $contributions = is_string($member->preferred_contributions)
                                            ? json_decode($member->preferred_contributions, true) ?? []
                                            : $member->preferred_contributions ?? [];
                                    @endphp

                                    @forelse ($contributions as $contribution)
                                        <span class="badge bg-primary me-2 mb-2">{{ $contribution }}</span>
                                    @empty
                                        <p class="text-muted">No contributions listed</p>
                                    @endforelse
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Declaration --}}
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-file-check"></i> Declaration</h5>
                    </div>
                    <div class="card-body">
                        @can('delete-members')
                            <div class="alert alert-success mb-0">
                                @if ($member->declaration_accepted)
                                    <i class="bi bi-check-circle"></i>
                                    <strong>Declaration Accepted:</strong> This member has accepted all terms and conditions.
                                @else
                                    <i class="bi bi-exclamation-circle"></i>
                                    <strong>Declaration Not Accepted</strong>
                                @endif
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="row mt-4">
            <div class="col-12">
                <div class="d-block d-sm-flex justify-content-between gap-2">
                    <a href="{{ route('members.index') }}" class="btn btn-secondary mb-2 mb-sm-0">
                        <i class="bi bi-arrow-left"></i> Back To List
                    </a>
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary">
                            <i class="bi bi-pencil"></i> Edit Member
                        </a>
                        <button type="button" class="btn btn-danger" onclick="deleteMember({{ $member->id }})">
                            <i class="bi bi-trash"></i> Delete Member
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title"><i class="bi bi-exclamation-circle"></i> Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Are you sure you want to delete this member?</strong></p>
                    <p class="mb-0">{{ $member->full_name }} will be permanently removed from the system. This action
                        cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function deleteMember(memberId) {
                const deleteForm = document.getElementById('deleteForm');
                deleteForm.action = `/members/${memberId}`;
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            }
        </script>
    @endpush
@endsection
