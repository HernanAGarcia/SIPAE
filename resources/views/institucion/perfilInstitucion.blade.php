@extends('institucion.template.mainInst')

@section('content')
<div class="container">
    <h1>Bienvenido Institucion {{Auth::user()->nombre_Usuario}}</h1>

</div>

@endsection
