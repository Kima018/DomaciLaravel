@php use App\Http\ForecastHelper;use App\Models\DomaciCities;use App\Models\DomaciForecasts; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>


</head>
<body>
<section class="mx-3 my-5 font-semibold">

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
<div class="grid grid-cols-6">
    @foreach(DomaciCities::all() as $city)
        <div class="mb-5">
            <h3 class="text-xl">{{$city->name}}</h3>
            <ul class="pl-5 list-disc">
                @foreach($city->forecasts as $forecast)
                    <li>{{$forecast->date}} -
                        <i class="{{ForecastHelper::getIconByWeatherType($forecast->weather_type)}}"></i>
                        <span
                            class="{{ForecastHelper::getColorByTemperature($forecast->temperature)}}">{{$forecast->temperature}}°C
                        </span></li>
                @endforeach
            </ul>

        </div>
    @endforeach



</div>

</section>
</body>
</html>
