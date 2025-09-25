<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body>
    <h2>New Contact Form Submission</h2>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    @if($data['phone'])
        <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    @endif
    <p><strong>Message:</strong></p>
    <p>{{ $data['message'] }}</p>
    
    <p>This message was sent from the contact form on Mobhea Adventures website.</p>
</body>
</html>