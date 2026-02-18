@extends('layouts.frontend')

@section('page_title', 'Metronic Components')

@section('breadcrumbs')
    <x-metronic.base.breadcrumb :items="[
        ['label' => 'Home', 'url' => '#', 'active' => false],
        ['label' => 'Library', 'url' => '#', 'active' => false],
        ['label' => 'Data', 'active' => true]
    ]" separator="bullet" />
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection