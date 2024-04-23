@foreach($prognoze as $prognoza)
    <p>Datum: {{$prognoza->date}}, Temperatura: {{$prognoza->temperature}}</p>
@endforeach
