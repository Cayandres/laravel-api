@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Dashboard dei progetti di {{ Auth::user()->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>Numero di progetti: {{ $number_projects }}</p>

                        <p>Numero di progetti eliminati: {{ $number_projects_deleted }}</p>

                        <p>Numero di progetti totali: {{ $number_projects_deleted +  $number_projects }}</p>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
