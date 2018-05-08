@extends('operador.template.mainOp')

@section('content')
<div class="container">
    <h1>Bienvenido Operador {{Auth::user()->nombre_Usuario}}</h1>
    
</div>

@endsection