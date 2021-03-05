@extends('layout')

@section('content')
<div class="row mb-5">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body p-5">
                <div class="row mb-5">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <h3 class="m-0 mt-3 fw-bold">Cadastrar Pergunta Questionário</h3>
                        <p clas="mb-0 small">&raquo; {{ $quiz->title }}</p>
                    </div>

                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-md-end">
                        <a href="{{ route('question', ['quiz_id' => $quiz->id]) }}" class="text-primary text-decoration-none">
                            <i class="bi bi-arrow-left"></i>
                            Voltar
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        @include('components.message')

                        <form action="{{ route('question-store', ['quiz_id' => $quiz->id]) }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <input type="text" name="description" id="description" class="form-control" autofocus>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check2"></i>
                                Cadastrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
