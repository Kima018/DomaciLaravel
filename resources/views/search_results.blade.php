@php use App\Http\ForecastHelper; @endphp
@extends('layout')
@section('search-result')

    <section>
        @foreach($cities as $city)

            <div>
                <a href="{{route('forecast.cities',['city'=>$city->name])}}">
                    <span>
                        {{$city->name}}
                    </span>
                </a>
                <i class="{{ForecastHelper::getIconByWeatherType($city->todaysForecast->weather_type)}}"></i>
            </div>
        @endforeach
    </section>

@endsection
