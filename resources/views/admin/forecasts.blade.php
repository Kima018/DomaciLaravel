@php use App\Models\DomaciCities;use App\Models\DomaciForecasts; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
</head>
<body>
<section class="mx-3 my-5">
    @if($errors->any())
        <div class="alert alert-danger">
            <p><strong>Opps Something went wrong</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="flex gap-2" method="POST" action="{{route('forecast.add')}}">
        @csrf
        <select class="border" name="citi_id">
            @foreach(DomaciCities::all() as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select>
        <input type="number" class="border" name="temperature" placeholder="Enter temperature">
        <select class="border" name="weather_type">
            @foreach(DomaciForecasts::WEATHERS as $type)
                <option value="{{$type}}">{{$type}}</option>
            @endforeach
        </select>
        <input type="number" class="border" name="probability" placeholder="Enter probability">
        <input type="date" name="date" class="border">
        <button type="submit">Save</button>
    </form>

    @foreach(DomaciCities::all() as $city)
        <div class="mb-5">
            <h3>{{$city->name}}</h3>
            <ul class="pl-10 list-disc">
                @foreach($city->forecasts as $forecast)
                    <li>{{$forecast->date}} - {{$forecast->temperature}}°C</li>
                @endforeach
            </ul>

        </div>
    @endforeach

</section>
</body>
</html>
