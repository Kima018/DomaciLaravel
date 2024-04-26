@extends('layout')

@section('welcome')
    <section class="w-full flex flex-col justify-center items-center">
        <div class="p-4 bg-indigo-200 rounded">
            <form method="GET" action="{{route('forecast.search')}}">
                <div class="mb-2">
                    <input type="text" name="city" placeholder="unesite ime grada" class="border">
                </div>
                <button type="submit" class="px-1 py-2 bg-green-200 rounded">Pretrazi</button>
            </form>

        </div>
        @if(count($userFavourites) > 0)
            <div>
                @foreach($userFavourites as $userFavourite)
                    <p>{{$userFavourite->getCity->name}} -> {{$userFavourite->getCity->todaysForecast->temperature}}</p>
                @endforeach
            </div>
        @endif

    </section>

@endsection
