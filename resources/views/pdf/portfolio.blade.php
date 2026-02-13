<!DOCTYPE html>
<html>
<head>
    <title>ATS Portfolio - {{ $user->name }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px; }
        .section { margin-bottom: 20px; }
        .section-title { font-weight: bold; font-size: 1.2em; text-transform: uppercase; border-bottom: 1px solid #ccc; margin-bottom: 10px; }
        .item { margin-bottom: 15px; }
        .item-title { font-weight: bold; }
        .item-meta { font-style: italic; color: #555; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $user->name }}</h1>
        <p>{{ $user->email }} | {{ $user->username }}</p>
    </div>

    <div class="section">
        <div class="section-title">Experience</div>
        @foreach($user->experiences as $exp)
            <div class="item">
                <div class="item-title">{{ $exp->position }} @ {{ $exp->company }}</div>
                <div class="item-meta">{{ $exp->start_date->format('M Y') }} - {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}</div>
                <div>{{ $exp->description }}</div>
            </div>
        @endforeach
    </div>

    <div class="section">
        <div class="section-title">Certifications</div>
        @foreach($user->certifications as $cert)
            <div class="item">
                <div class="item-title">{{ $cert->name }}</div>
                <div class="item-meta">{{ $cert->issuing_organization }} | Issued {{ $cert->issue_date->format('M Y') }}</div>
            </div>
        @endforeach
    </div>
</body>
</html>
