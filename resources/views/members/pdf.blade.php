@php
    // Logo Base64 encoding
    $logoPath = public_path('img/project29.jpeg');
    if (file_exists($logoPath)) {
        $logoType = pathinfo($logoPath, PATHINFO_EXTENSION);
        $logoData = file_get_contents($logoPath);
        $logoBase64 = 'data:image/' . $logoType . ';base64,' . base64_encode($logoData);
    } else {
        $logoBase64 = '';
    }
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Members Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --saffron-yellow: #FFB300;
            --navy-blue: #001F3F;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            height: 60px;
            width: 60px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 20px;
            color: var(--navy-blue);
            margin-bottom: 0;
        }

        .header p {
            font-size: 11px;
            color: #555;
            margin-top: 3px;
        }

        .summary-card {
            margin-bottom: 20px;
        }

        .summary-card .card {
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .summary-card .card .bi {
            font-size: 1.8rem;
        }

        .summary-card h6 {
            margin: 0;
        }

        .summary-card p {
            margin: 0;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: var(--navy-blue);
            color: #fff;
        }

        th,
        td {
            padding: 6px 8px;
            border: 1px solid #ddd;
            font-size: 11px;
        }

        tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f0f0f0;
        }

        .status-badge {
            display: inline-block;
            padding: 3px 7px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 11px;
            text-align: center;
            min-width: 65px;
            color: #fff;
        }

        .status-approved {
            background-color: #28a745;
        }

        .status-pending {
            background-color: var(--saffron-yellow);
            color: #333;
        }

        .status-rejected {
            background-color: #dc3545;
        }

        .page-break {
            page-break-after: always;
        }

        @media print {
            .summary-card .bi {
                font-size: 1.4rem !important;
            }

            table th,
            table td {
                font-size: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container my-3">
        <!-- Header -->
        <div class="header">
            @if($logoBase64)
                <img src="{{ $logoBase64 }}" alt="logo">
            @else
                <p>Logo not found</p>
            @endif
            <h1><i>NOT TOO YOUNG TO LEAD - Project 29</i></h1>
            <p>Member Report - Generated on {{ now()->format('F j, Y H:i') }}</p>
        </div>

        <!-- Summary Cards -->
        {{-- <div class="summary-card">
            <div class="row g-3 text-center text-sm-start">
                <div class="col-6 col-sm-3">
                    <div class="card p-3 d-flex align-items-center justify-content-center flex-sm-row gap-2">
                        <i class="bi bi-people-fill text-primary"></i>
                        <div>
                            <h6 class="text-primary">Total Members</h6>
                            <p>{{ count($members) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="card p-3 d-flex align-items-center justify-content-center flex-sm-row gap-2">
                        <i class="bi bi-check-circle-fill text-success"></i>
                        <div>
                            <h6 class="text-success">Approved</h6>
                            <p>{{ $members->where('status', 'approved')->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="card p-3 d-flex align-items-center justify-content-center flex-sm-row gap-2">
                        <i class="bi bi-clock-fill text-warning"></i>
                        <div>
                            <h6 class="text-warning">Pending</h6>
                            <p>{{ $members->where('status', 'pending')->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="card p-3 d-flex align-items-center justify-content-center flex-sm-row gap-2">
                        <i class="bi bi-x-circle-fill text-danger"></i>
                        <div>
                            <h6 class="text-danger">Rejected</h6>
                            <p>{{ $members->where('status', 'rejected')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Members Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Age 2029</th>
                        <th>District</th>
                        <th>Clan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->full_name }}</td>
                            <td>{{ $member->phone_primary }}</td>
                            <td>{{ $member->email ?? 'N/A' }}</td>
                            <td>{{ ucfirst($member->gender) }}</td>
                            <td>{{ $member->current_age }}</td>
                            <td>{{ $member->age_2029 }}</td>
                            <td>{{ $member->district->name ?? 'N/A' }}</td>
                            <td>{{ $member->clan->name ?? 'N/A' }}</td>
                            <td>
                                @if ($member->status == 'approved')
                                    <span class="status-badge status-approved">Active</span>
                                @elseif ($member->status == 'pending')
                                    <span class="status-badge status-pending">Pending</span>
                                @elseif ($member->status == 'rejected')
                                    <span class="status-badge status-rejected">Rejected</span>
                                @else
                                    <span class="status-badge bg-secondary">Unknown</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="text-end text-muted mt-3" style="font-size:10px;">
            <p>This is an official TEAM KWABO - Project 29 member report. Generated: {{ now()->format('Y-m-d H:i:s') }}</p>
            <p>For inquiries, contact TEAM KWABO administration.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
