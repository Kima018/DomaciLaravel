@foreach($city->forecasts as $prognoza)
    <p>Datum: {{$prognoza->date}}, Temperatura: {{$prognoza->temperature}}</p>
@endforeach
