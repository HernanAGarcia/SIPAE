@extends('secretaria.template.main')

@section('content')
<div class="container">
    <h1>Pagina de informes de asistencia de colegios</h1>

    <select name="select">
                    <option disabled selected>Selecciona</option>
                    @foreach($insts as $inst)
                    <option value="{{$inst->nombre}}">{{$inst->nombre}}</option>
                    @endforeach
                </select>

    <?php echo Form::select('Sede') ?>

    <?php echo Form::select('number', [1, 2, 3], null, ['class' => 'field']) ?>

</div>




@endsection
