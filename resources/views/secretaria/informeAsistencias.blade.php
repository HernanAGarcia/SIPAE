@extends('secretaria.template.main')

@section('content')
<div class="container">
    <h1>Pagina de informes de asistencia de colegios</h1>

    {!! Form::select('Institucion',$listaInstitucion) !!}

    {!! Form::select('Sede') !!}

    {{ Form::select('number', [1, 2, 3], null, ['class' => 'field']) }}
</div>


@endsection
