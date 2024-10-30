@extends('layouts.app')

@section('title', 'actividades_Modelo')

@section('content')
<h1>Actividades Modelo</h1>
@include('layouts.calendario.calendar', ['section' => 'actividades_modelo'])
@endsection
