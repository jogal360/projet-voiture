<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <style>
        h2{
            color: pink;
        }
    </style>
</head>
<body>
<h2>Verify Your Email Address</h2>

<div>
    Thanks for creating an account Crazy Car.
    Please follow the link below to verify your email address
    <a href="{{ URL::to('register/verify/'. $confirmation_code) }}">{{ URL::to('register/verify/' . $confirmation_code) }} </a>


</div>

</body>
</html>