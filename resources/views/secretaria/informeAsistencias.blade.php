@extends('secretaria.template.main')

@section('content')
<div class="container">
    <h1>Página de informes de asistencia de colegios</h1>

<<<<<<< HEAD
    <select name="select">
                    <option disabled selected>Selecciona</option>
                    @foreach($insts as $inst)
                    <option value="{{$inst->nombre}}">{{$inst->nombre}}</option>
                    @endforeach
                </select>
=======
        <select name="select">
            <option disabled selected>Seleccione institución</option>
            @foreach($listaInstitucion as $institucion)
            <option value="{{$institucion->nombre}}">{{$institucion->nombre}}</option>
            @endforeach
        </select>
>>>>>>> master

    <?php echo Form::select('Sede') ?>

</div>


@endsection
