<h1>{{$warningType}} DANGER</h1>
@if ($type == 'temperature')
<h1>{{$data->name}} is at {{$data->latestTemperature->temperature}} degrees celcius</h1>
@elseif ($type == 'oxygen')
<h1>{{$data->name}} is at {{$data->latestOxygenLevel->oxygen_level}} mg/L</h1>
@elseif ($type == 'turbidity')
<h1>{{$data->name}} is at {{$data->latestTurbidityLevel->ntu}} NTU</h1>
@elseif ($type == 'level')
<h1>{{$data->name}} is at {{$data->latestWaterLevel->cm}} cm</h1>
@endif