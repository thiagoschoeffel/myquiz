@extends('layout')

@section('content')
<div class="row mb-5">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body p-5">
                <div class="row mb-5">
                    <div class="col-12 col-md-8 mb-3 mb-md-0">
                        <h3 class="m-0 fw-bold">Cadastrar Questionário</h3>
                    </div>

                    <div class="col-12 col-md-4 d-flex align-items-center justify-content-md-end">
                        <a href="{{ route('quiz') }}" class="text-primary text-decoration-none">
                            <i class="bi bi-arrow-left"></i>
                            Voltar
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        @include('components.message')

                        <form action="{{ route('quiz-store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label small text-muted">Título</label>
                                <input type="text" name="title" id="title" class="form-control" autofocus>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check2"></i>
                                Cadastrar
                            </button>
                        </form>
                        @endsection
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
