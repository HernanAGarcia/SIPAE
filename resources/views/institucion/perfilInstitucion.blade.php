@extends('institucion.template.mainInst')

@section('content')
<div class="container">
    <h1>Bienvenido {{Auth::user()->nombre_Usuario}}</h1>
    
</div>

@endsection
