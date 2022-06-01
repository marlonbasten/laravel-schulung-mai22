@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @livewire('counter')

                        {{ trans_choice('default.hello_world', 2, ['name' => 'test']) }}
                        {{ __('Hello World!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
