@extends('secretaria.template.main')

@section('content')
<div class="container">
    <h1>Bienvenida {{Auth::user()->nombre_Usuario}}</h1>
    
</div>

@endsection
