<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pozvánka</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        strong {
            font-weight: bold;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>{{ $guest->event->name }}</h1>

    <p>{{$guest->addressing}},</p>

    <p>{!! $guest->event->invitation_letter !!}</p>

    <div style="text-align: center">
        <p>Odpověď na pozvánku:</p>
        <a style="background-color: #7ed96f; color: #ffffff" href="{{ url('invite/' .  $guest->key . '/accept' ) }}">Potvrdit účast</a>
        <a style="background-color: #bb626e; color: #ffffff" href="{{ url('invite/' .  $guest->key . '/decline' ) }}">Nezúčastním se</a>
    </div>

</div>
</body>
</html>
