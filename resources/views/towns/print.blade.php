<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Towns Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }
        .header { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 40px 0; text-align: center; margin-bottom: 40px; }
        .header h1 { margin: 0; font-size: 2.5rem; }
        .header p { margin: 10px 0 0; font-size: 1.1rem; opacity: 0.9; }
        .print-date { text-align: right; color: #666; margin-bottom: 30px; font-size: 0.9rem; }
        table { margin-bottom: 40px; }
        thead { background: #f0f0f0; }
        .stats-row { font-weight: bold; }
        @media print {
            body { margin: 0; padding: 0; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-building"></i> Towns Report</h1>
            <p>Project 29 - Recruitment Management System</p>
        </div>

        <div class="print-date">
            <p>Generated on: {{ now()->format('F j, Y \a\t g:i A') }}</p>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 20%;">Town Name</th>
                    <th style="width: 20%;">Clan</th>
                    <th style="width: 20%;">District</th>
                    <th style="width: 15%;">Members</th>
                    <th style="width: 10%;">Approved</th>
                    <th style="width: 15%;">Pending</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalMembers = 0;
                    $totalApproved = 0;
                    $totalPending = 0;
                @endphp
                @forelse($towns as $town)
                    @php
                        $approved = $town->members->where('status', 'approved')->count();
                        $pending = $town->members->where('status', 'pending')->count();
                        $total = $town->members->count();
                        $totalMembers += $total;
                        $totalApproved += $approved;
                        $totalPending += $pending;
                    @endphp
                    <tr>
                        <td><strong>{{ $town->name }}</strong></td>
                        <td>{{ $town->clan->name }}</td>
                        <td>{{ $town->district->name }}</td>
                        <td class="text-center">{{ $total }}</td>
                        <td class="text-center">
                            <span class="badge bg-success">{{ $approved }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-warning">{{ $pending }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No towns found</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr class="stats-row">
                    <td colspan="3" class="text-end">TOTAL:</td>
                    <td class="text-center">{{ $totalMembers }}</td>
                    <td class="text-center">
                        <span class="badge bg-success">{{ $totalApproved }}</span>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-warning">{{ $totalPending }}</span>
                    </td>
                </tr>
            </tfoot>
        </table>

        <hr>
        <div class="text-center text-muted" style="font-size: 0.9rem;">
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Total Towns:</strong> {{ $towns->count() }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Total Members:</strong> {{ $totalMembers }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Approval Rate:</strong>
                        @if($totalMembers > 0)
                            {{ round(($totalApproved / $totalMembers) * 100, 1) }}%
                        @else
                            0%
                        @endif
                    </p>
                </div>
            </div>
            <p style="margin-bottom: 0; margin-top: 20px;">Project 29 © 2024</p>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            window.print();
        });
    </script>
</body>
</html>
