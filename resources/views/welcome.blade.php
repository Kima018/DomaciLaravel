@extends('layout')

@section('welcome')
    <form method="GET" action="{{route('forecast.search')}}">
        <div>
            <input type="text" name="city" placeholder="unesite ime grada" class="border">
        </div>
        <button type="submit">Pretrazi</button>
    </form>
@endsection
