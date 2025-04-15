@extends('auth::layouts.master')

@section('content')
    <div>
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    </div>

<section class="bg-light">
    <div class="container">
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#new-betting-pool">Criar bolao</button>
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#join-by-code">Participar com codigo</button>
    </div>
</section>

    <div class="modal fade" id="new-betting-pool" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Novo bolao</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="modal-name-input" class="form-label">Nome:</label>
                    <input type="text" id="modal-name-input" class="form-control">
                    <label for="modal-type-input" class="form-label">Campeonato:</label>
                    <select class="form-select" id="modal-type-input">
                        <option selected>Selecione um campeonato</option>
                        <option value="1">Brasileirao</option>
                        <option value="2">Copa do brasil</option>
                        <option value="3">Libertadores</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="btn-new-betting-pool">Criar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="join-by-code" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Participar por codigo </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="modal-code-input" class="form-label">Codigo:</label>
                    <input type="text" id="modal-code-input" class="form-control">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="btn-join-betting-pool">Acessar</button>
                </div>
            </div>
        </div>
    </div>
    <div>
        @foreach($bettingPoolList as $bettingPool)
            <span>Nome: {{$bettingPool['name']}}</span>
            <span>Posiçao: {{$bettingPool['position']}}</span>
            <span>Pontuaçao: {{$bettingPool['score']}}</span>
        @endforeach
    </div>

@endsection
@section('scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('Modules/Dashboard/resources/assets/js/create-betting-pool-modal.js')
    @vite('Modules/Dashboard/resources/assets/js/join-betting-pool-modal.js')
@endsection
