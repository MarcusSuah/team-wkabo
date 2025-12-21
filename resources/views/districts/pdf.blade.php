
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
        .container { padding: 40px; }
        .header { background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%); color: white; padding: 30px; border-radius: 8px; margin-bottom: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .header p { margin: 10px 0 0; font-size: 13px; opacity: 0.9; }
        .date { text-align: right; color: #666; margin-bottom: 20px; font-size: 11px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        thead { background: #f0f0f0; }
        th { padding: 12px; text-align: left; font-weight: bold; border-bottom: 2px solid #ddd; font-size: 12px; }
        td { padding: 10px 12px; border-bottom: 1px solid #eee; font-size: 11px; }
        .code { background: #e3f2fd; padding: 4px 8px; border-radius: 3px; font-family: monospace; display: inline-block; }
        .footer { text-align: center; color: #999; font-size: 10px; border-top: 1px solid #ddd; padding-top: 20px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Districts Report</h1>
            <p>Project 29 - Recruitment Management System</p>
        </div>

        <div class="date">Generated: {{ now()->format('F j, Y \a\t g:i A') }}</div>

        <table>
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
                        <td><span class="code">{{ $district->code }}</span></td>
                        <td><strong>{{ $district->name }}</strong></td>
                        <td>{{ Str::limit($district->description, 60) ?? '—' }}</td>
                        <td>{{ $district->clans->count() }}</td>
                        <td>{{ $district->members->count() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #999;">No districts found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="footer">
            <p>Total Districts: <strong>{{ $districts->count() }}</strong></p>
            <p style="margin-top: 10px;">Project 29 © 2024</p>
        </div>
    </div>
</body>
</html>
