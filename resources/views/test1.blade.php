@extends('layout/app')

@section('content')

<h1>Test1 Datei</h1>

<p>ID: {{$id}}</p>

{{-- Das ist ein Kommentar --}}

{{ $name }}
{!! $name !!}
{{ $age }}

@if ($age >= 18)
    <p>Du darfst Alkohol trinken, juhu?</p>
@elseif ($age >= 16)
    <p>Bier ist noch drin</p>
@else
    <p>Zugang verboten, Alter: {{ $age }}</p>
@endif

@include('people')

@endsection
