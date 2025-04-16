@extends('auth::layouts.master')

@section('content')
    <section class="container">
        <div class="row">
            <h2 class="col-10 text-primary text-center my-4 fw-bold border-bottom pb-2">{{$name}}</h2>
            <h5 class="col-2 text-end text-info my-4 fw-bold border-bottom pb-2">Codigo: {{$code}}</h5>
        </div>
        <div class="row">
            <div class="col-1">
                <span class="fw-bold">RANK</span>
            </div>
            <div class="col-8">
                <span class="fw-bold">BOLEIRO</span>
            </div>
            <div class="col-3">
                <span class="fw-bold">SCORE</span>
            </div>
        </div>
        @foreach($bettingPoolUsersList as $bettingPoolUser)
            <div class="row">
                <div class="col-1">
                    <span class="border rounded px-2 py-1 d-inline-block text-center fw-bold col-8 bg-light shadow my-1">
                        {{$bettingPoolUser['position']}}
                    </span>
                </div>
                <div class="col-8">
                    <span class="fw-bold border rounded px-2 py-1 d-inline-block col-12 bg-light shadow my-1">
                        {{$bettingPoolUser['user']}}
                    </span>
                </div>
                <div class="col-3">
                    <span class="border rounded px-2 py-1 d-inline-block fw-bold col-2 bg-light shadow my-1">
                        {{$bettingPoolUser['score']}}
                    </span>
                </div>
            </div>
        @endforeach
    </section>
@endsection
