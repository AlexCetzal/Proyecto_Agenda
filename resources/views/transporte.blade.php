@extends('layouts.app')

@section('title', 'tranporte')

@section('content')
<h1>transporte</h1>
@include('layouts.calendario.calendar', ['section' => 'transporte'])
@endsection