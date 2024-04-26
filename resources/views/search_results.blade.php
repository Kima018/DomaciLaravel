@php use App\Http\ForecastHelper;use Illuminate\Support\Facades\Session; @endphp
@extends('layout')
@section('search-result')

    <section>

        @if(Session::has('error'))
            <div>
                <p class="text-red-700">{{Session::get('error')}}</p>
            </div>
        @endif

        @foreach($cities as $city)

            <div>
                @if(in_array($city->id,$userFavourites))
                    <a href="{{route('city.unfavorite',['city'=>$city->id])}}">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                @else
                    <a href="{{route('city.favourite',['city'=>$city->id])}}">
                        <i class="fa-regular fa-heart"></i>
                    </a>
                @endif

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
