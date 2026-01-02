@php
    use Carbon\Carbon;

    // Logo Base64 encoding
    $logoPath = public_path('img/project29.jpeg');
    if (file_exists($logoPath)) {
        $logoType = pathinfo($logoPath, PATHINFO_EXTENSION);
        $logoData = file_get_contents($logoPath);
        $logoBase64 = 'data:image/' . $logoType . ';base64,' . base64_encode($logoData);
    } else {
        $logoBase64 = '';
    }

    function ageHistogram($members) {
        $ranges = [
            '0-17' => 0,
            '18-25' => 0,
            '26-35' => 0,
            '36-45' => 0,
            '46-60' => 0,
            '60+' => 0,
        ];
        foreach ($members as $m) {
            $age = $m->current_age;
            if ($age <= 17) $ranges['0-17']++;
            elseif ($age <= 25) $ranges['18-25']++;
            elseif ($age <= 35) $ranges['26-35']++;
            elseif ($age <= 45) $ranges['36-45']++;
            elseif ($age <= 60) $ranges['46-60']++;
            else $ranges['60+']++;
        }
        return $ranges;
    }
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Members Report</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
    .header { text-align: center; margin-bottom: 20px; }
    .header img { height: 60px; width: 60px; border-radius: 8px; margin-bottom: 10px; }
    .header h1 { font-size: 20px; color: #001F3F; margin-bottom: 0; }
    .header p { font-size: 11px; color: #555; margin-top: 3px; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    thead { background-color: #001F3F; color: #fff; }
    th, td { padding: 6px 8px; border: 1px solid #ddd; font-size: 11px; }
    tbody tr:nth-child(odd) { background-color: #f9f9f9; }
    tbody tr:hover { background-color: #f0f0f0; }
    .summary { margin-bottom: 15px; font-size: 11px; }
    .bar-container { display: flex; height: 16px; width: 100%; background: #e0e0e0; margin: 2px 0; border-radius: 3px; overflow: hidden; position: relative; }
    .bar { height: 100%; text-align: right; color: #fff; font-size: 10px; line-height: 16px; padding-right: 4px; box-sizing: border-box; }
    .bar-male { background-color: #007bff; }
    .bar-female { background-color: #dc3545; }
    .bar-other { background-color: #ffc107; color: #333; }
    .bar-age { background-color: #28a745; margin-bottom: 2px; text-align: right; color: #fff; padding-right: 4px; }
    .page-break { page-break-after: always; }
</style>
</head>
<body>
<div class="container my-3">

<div class="header">
    @if ($logoBase64)
        <img src="{{ $logoBase64 }}" alt="logo">
    @endif
    <h1><i>NOT TOO YOUNG TO LEAD - Project 29</i></h1>
    <p>Member Report - Generated on {{ now()->format('F j, Y H:i') }}</p>
</div>

<hr>
<p><strong>Total Members:</strong> <b>{{ $total }}</b></p>

@foreach ($grouped as $district => $townGroups)
    <h4 style="margin-top:20px;">
        District: {{ $district }} ({{ $townGroups->flatten()->count() }})
    </h4>

    @foreach ($townGroups as $town => $members)
        <h5 style="margin-top:10px;">Town: {{ $town }} ({{ $members->count() }})</h5>

        @php
            $maleCount = $members->where('gender','male')->count();
            $femaleCount = $members->where('gender','female')->count();
            $otherCount = $members->where('gender','other')->count();
            $ageHist = ageHistogram($members);
            $totalMembers = $members->count() ?: 1;

            $firstTimeVoters = $members->filter(function($m) {
                $dob = Carbon::parse($m->date_of_birth);
                $ageOct2023 = $dob->diffInYears(Carbon::create(2023, 10, 1));
                $ageOct2029 = $dob->diffInYears(Carbon::create(2029, 10, 1));

                return $ageOct2023 < 18 && $ageOct2029 >= 18 && $ageOct2029 < 23;
            })->count();
        @endphp

        <div class="summary">
            <strong>Gender Breakdown:</strong> Male: {{ $maleCount }}, Female: {{ $femaleCount }}, Other: {{ $otherCount }}<br>
            <div class="bar-container">
                <div class="bar bar-male" style="width: {{ ($maleCount/$totalMembers)*100 }}%">
                    {{ $maleCount }}
                </div>
                <div class="bar bar-female" style="width: {{ ($femaleCount/$totalMembers)*100 }}%">
                    {{ $femaleCount }}
                </div>
                <div class="bar bar-other" style="width: {{ ($otherCount/$totalMembers)*100 }}%">
                    {{ $otherCount }}
                </div>
            </div>

            <strong>Age Histogram:</strong><br>
            @foreach($ageHist as $range => $count)
                {{ $range }}: {{ $count }}
                <div class="bar-container">
                    <div class="bar bar-age" style="width: {{ ($count/$totalMembers)*100 }}%">
                        {{ $count }}
                    </div>
                </div>
            @endforeach

            <strong>First-time Voters (2029):</strong> {{ $firstTimeVoters }}
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th><th>Name</th><th>Phone</th><th>Gender</th><th>Age</th>
                        <th>Age 2029</th><th>District</th><th>Clan</th><th>Town</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>MEM - {{ $member->id }}</td>
                            <td>{{ $member->full_name }}</td>
                            <td>{{ $member->phone_primary }}</td>
                            <td>{{ ucfirst($member->gender) }}</td>
                            <td>{{ $member->current_age }}</td>
                            <td>{{ $member->age_2029 }}</td>
                            <td>{{ $member->district->name ?? 'N/A' }}</td>
                            <td>{{ $member->clan->name ?? 'N/A' }}</td>
                            <td>{{ $member->town->name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Page break after each town -->
        <div class="page-break"></div>
    @endforeach
@endforeach

</div>
</body>
</html>
