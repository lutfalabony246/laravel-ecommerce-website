<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Hello Admin,</h2>
You received an email from : {{ $name }}
Here are the details:
<b>Name:</b> {{ $name }}
<b>Email:</b> {{ $email }}

<b>Subject:</b> {{ $subject }}
<b>Message:</b> {{ $user_message }}
Thank You
</body>
</html>