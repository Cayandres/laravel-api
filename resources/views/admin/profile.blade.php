@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="card" style="width: 20rem;">
      <div class="card-body">
        <h5 class="card-title">Profilo Utente</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">nome: {{ Auth::user()->name }}</h6>
        <p class="card-text">email :{{ Auth::user()->email }}</p>
      </div>
    </div>

</div>

@endsection
