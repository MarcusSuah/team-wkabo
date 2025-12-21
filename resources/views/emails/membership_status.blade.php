<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #FFB300, #FFA000);
            color: #001F3F;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .status-badge {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            margin: 20px 0;
        }
        .approved {
            background: #28a745;
            color: white;
        }
        .pending {
            background: #ffc107;
            color: #001F3F;
        }
        .rejected {
            background: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏛️ PROJECT 29</h1>
            <p>Membership Application Update</p>
        </div>
        <div class="content">
            <h2>Dear {{ $member->full_name }},</h2>

            @if($member->status === 'approved')
                <p>Congratulations! We are pleased to inform you that your membership application has been <strong>approved</strong>.</p>
                <div class="status-badge approved">✓ APPROVED</div>
                <p>You are now an active member of Project 29. Welcome to our movement!</p>
                <p>Your membership details:</p>
                <ul>
                    <li><strong>Member ID:</strong> #{{ str_pad($member->id, 6, '0', STR_PAD_LEFT) }}</li>
                    <li><strong>District:</strong> {{ $member->district->name }}</li>
                    <li><strong>Clan:</strong> {{ $member->clan->name }}</li>
                    <li><strong>Town:</strong> {{ $member->town->name }}</li>
                </ul>
            @elseif($member->status === 'pending')
                <p>Your membership application is currently <strong>under review</strong>.</p>
                <div class="status-badge pending">⏳ PENDING</div>
                <p>Our team is reviewing your application and will notify you of the decision soon.</p>
            @else
                <p>We regret to inform you that your membership application has been <strong>not approved</strong> at this time.</p>
                <div class="status-badge rejected">✗ NOT APPROVED</div>
                <p>If you believe this decision was made in error, please contact us for more information.</p>
            @endif

            <p>If you have any questions, please don't hesitate to contact us.</p>

            <p>Best regards,<br>
            <strong>Project 29 Team</strong></p>
        </div>
    </div>
</body>
</html>
