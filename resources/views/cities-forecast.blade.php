@extends('layout')
@section('city-forecast')

    <section>
        <h2>{{$city->name}}</h2>

        @foreach($city->forecasts as $forecast)
            <div>
                <p>Datum: {{$forecast->date}}, Temperatura: {{$forecast->temperature}}</p>
            </div>
        @endforeach

    </section>

@endsection
