<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>Report</title>

  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  {{--
  <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}" /> --}}
  <style>
    .code{
        display: inline-block;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        margin: 10px;
        padding: 10px;
        padding-top: 30px;
        padding-bottom: 30px;
        border: 1px solid black;
        border-radius: 10px;
        width: 140px;
        position: relative;
    }

    .houser{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }

    .numbering{
        position: absolute;
        top: 3px;
        left: 3px;
        font-size: 10px;
        padding: 5px;
        border: 1px solid black;
        border-radius: 50%;
    }

  </style>
</head>

<body>
<div class="houser">
    @foreach ($voters as $voter)
    <div class="code">
        <div class="numbering">{{$loop->iteration}}</div>
        {{$voter->code}}
    </div>
    @endforeach
   
</div>

</body>

</html>
