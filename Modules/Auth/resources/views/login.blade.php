@extends('auth::layouts.master')

@section('title', 'Login')
@section('page_title', 'Entrar no sistema')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6 col-lg-4">
    <div class="card shadow">
      <div class="card-body">
        <h4 class="card-title mb-4 text-center">Acesse sua conta</h4>

        <!-- Exibe mensagens de erro, se houver -->
        @if(session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
        @elseif(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Formulário de login -->
        <form method="POST" action="{{ route('auth.login.post') }}">
          @csrf

          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" required autofocus>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" name="password" id="password" required>
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-success">Entrar</button>
            <button type="button" class="btn btn-primary mt-3" onclick="window.location.href='{{ route('auth.register.form') }}'">Registrar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
