@extends('layouts.app')


@section('title', 'centro_cultural')

@section('content')
<h1>cultural</h1>
@include('layouts.calendario.calendar', ['section' => 'centro_cultural'])
@endsection