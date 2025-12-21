<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Districts Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }
        .header { background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%); color: white; padding: 40px 0; text-align: center; margin-bottom: 40px; }
        .header h1 { margin: 0; font-size: 2.5rem; }
        .header p { margin: 10px 0 0; font-size: 1.1rem; opacity: 0.9; }
        .print-date { text-align: right; color: #666; margin-bottom: 30px; font-size: 0.9rem; }
        table { margin-bottom: 40px; }
        thead { background: #f0f0f0; }
        .code-badge { background: #e3f2fd; color: #1976d2; padding: 4px 8px; border-radius: 4px; font-family: monospace; }
        @media print {
            body { margin: 0; padding: 0; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-map-location-dot"></i> Districts Report</h1>
            <p>Project 29 - Recruitment Management System</p>
        </div>

        <div class="print-date">
            <p>Generated on: {{ now()->format('F j, Y \a\t g:i A') }}</p>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 15%;">Code</th>
                    <th style="width: 25%;">Name</th>
                    <th style="width: 40%;">Description</th>
                    <th style="width: 10%;">Clans</th>
                    <th style="width: 10%;">Members</th>
                </tr>
            </thead>
            <tbody>
                @forelse($districts as $district)
                    <tr>
                        <td><span class="code-badge">{{ $district->code }}</span></td>
                        <td><strong>{{ $district->name }}</strong></td>
                        <td>{{ Str::limit($district->description, 60) ?? '—' }}</td>
                        <td class="text-center">{{ $district->clans->count() }}</td>
                        <td class="text-center">{{ $district->members->count() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No districts found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <hr>
        <div class="text-center text-muted" style="font-size: 0.9rem;">
            <p>Total Districts: <strong>{{ $districts->count() }}</strong></p>
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
