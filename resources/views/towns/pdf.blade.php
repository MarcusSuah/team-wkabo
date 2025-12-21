<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
        .container { padding: 40px; }
        .header { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 30px; border-radius: 8px; margin-bottom: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .header p { margin: 10px 0 0; font-size: 13px; opacity: 0.9; }
        .date { text-align: right; color: #666; margin-bottom: 20px; font-size: 11px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        thead { background: #f0f0f0; }
        th { padding: 12px; text-align: left; font-weight: bold; border-bottom: 2px solid #ddd; font-size: 12px; }
        td { padding: 10px 12px; border-bottom: 1px solid #eee; font-size: 11px; }
        .footer { text-align: center; color: #999; font-size: 10px; border-top: 1px solid #ddd; padding-top: 20px; margin-top: 20px; }
        tr:nth-child(even) { background: #f9f9f9; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Towns Report</h1>
            <p>Project 29 - Recruitment Management System</p>
        </div>

        <div class="date">Generated: {{ now()->format('F j, Y \a\t g:i A') }}</div>

        <table>
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
                @forelse($towns as $town)
                    <tr>
                        <td><strong>{{ $town->name }}</strong></td>
                        <td>{{ $town->clan->name }}</td>
                        <td>{{ $town->district->name }}</td>
                        <td>{{ $town->members->count() }}</td>
                        <td>{{ $town->members->where('status', 'approved')->count() }}</td>
                        <td>{{ $town->members->where('status', 'pending')->count() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #999;">No towns found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="footer">
            <p>Total Towns: <strong>{{ $towns->count() }}</strong></p>
            <p style="margin-top: 10px;">Project 29 © 2024</p>
        </div>
    </div>
</body>
</html>
