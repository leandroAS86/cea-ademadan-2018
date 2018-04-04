@extends('layouts.master')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Painel de Usuário</div>

                <div class="card-body">
                    @include('layouts.error')

                    @include('layouts.alert')

                    Você esta logado!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
