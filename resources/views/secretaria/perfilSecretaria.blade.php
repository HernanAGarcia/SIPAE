@extends('secretaria.template.main')

@section('content')
<div class="container">
    <h1>Pagina de Inicio de Secretaria</h1>
    <font style="vertical-align: inherit;">{{Auth::user()}}</font>
</div>

@endsection
