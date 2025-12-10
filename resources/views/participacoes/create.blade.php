@extends('layouts.app')

@section('content')
  
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('eventos.show', $evento->slug) }}">{{ $evento->titulo }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Confirmar Participação</li>
    </ol>
</nav>

<h3># {{ $evento->titulo }}</h3>
<p>{{ $evento->descricao }}</p>

<h4>Início</h4>
<p>{{ $evento->inicio }}</p>

<form action="{{ route('participacoes.store') }}" method="POST">
    @csrf

    @include('participacoes._form', [
        'evento' => $evento,
        'participacao' => null,
        'bancas' => $bancas
    ])

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">
            Confirmar Participação
        </button>
    </div>
</form>

@endsection