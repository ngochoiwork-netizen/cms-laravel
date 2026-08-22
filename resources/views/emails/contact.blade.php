<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>
        New Contact Request
    </title>
</head>

<body>

    <h2>
        New Contact Request
    </h2>

    <p>
        <strong>Name:</strong>
        {{ $data['first_name'] }}
        {{ $data['last_name'] ?? '' }}
    </p>

    <p>
        <strong>Email:</strong>
        {{ $data['email'] }}
    </p>

    <p>
        <strong>Phone:</strong>
        {{ $data['phone'] ?? 'N/A' }}
    </p>

    <p>
        <strong>Message:</strong>
    </p>

    <p>
        {!! nl2br(e($data['message'])) !!}
    </p>

    <hr>

    <p>
        <strong>SMS Consent:</strong>
        {{ !empty($data['sms_consent']) ? 'Yes' : 'No' }}
    </p>

    <p>
        <strong>Marketing SMS Consent:</strong>
        {{ !empty($data['marketing_sms_consent']) ? 'Yes' : 'No' }}
    </p>

</body>

</html>