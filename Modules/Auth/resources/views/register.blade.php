@extends('auth::layouts.master')

@section('title', 'Register')

@section('content')
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="card shadow">
          <div class="card-body">
              <form method="POST" action="{{ route('auth.register.post') }}">
                  @csrf

                  <div class="mb-3">
                      <label for="first_name" class="form-label">Primeiro nome</label>
                      <input type="text" class="form-control" name="first_name" id="first_name" required autofocus>
                  </div>
                  <div class="mb-3">
                      <label for="last_name" class="form-label">Ultimo nome</label>
                      <input type="text" class="form-control" name="last_name" id="last_name" required autofocus>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" required autofocus>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                  </div>
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>
@endsection
