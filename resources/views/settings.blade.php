@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Einstellungen') }}</div>

                    <div class="card-body">

                        <p>
                            {{ auth()->user()->name }}
                        </p>

                        <a href="{{ route('deleteAccount') }}" onclick="return confirm('Account wirklich löschen?');"><button class="btn btn-danger">Account löschen</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
