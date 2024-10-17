@extends('layouts.app')


@section('title', 'campos_Modelo')

@section('content')
<h1>campos</h1>
@include('layouts.calendario.calendar', ['section' => 'campos_modelo'])
@endsection