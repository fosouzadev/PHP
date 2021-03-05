@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
    @if (!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
    @endif

    <!-- <a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a> -->
    <a href="{{ route('get_criar_serie')  }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->id }} {{ $serie->nome }}

                <span class="d-flex">
                    <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mr-1">Editar</a>

                    <form method="post" action="/series/remover/{{ $serie->id }}"
                        onsubmit="return confirm('Tem certeza?')">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
@endsection
