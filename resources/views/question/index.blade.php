@extends('layout')

@section('content')
<div class="row mb-5">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body p-5">
                <div class="row mb-5">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <a href="{{ route('quiz') }}" class="text-primary text-decoration-none">
                            <i class="bi bi-arrow-left"></i>
                            Voltar
                        </a>

                        <h3 class="m-0 mt-3 fw-bold">Gerenciar Perguntas Questionário</h3>
                        <p clas="mb-0 small">&raquo; {{ $quiz->title }}</p>
                    </div>

                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-md-end">
                        <a href="{{ route('question-create', ['quiz_id' => $quiz->id]) }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i>
                            Nova Pergunta
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        @include('components.message')

                        <ul class="list-group">
                            <?php
                            $sequence = 1;
                            ?>
                            @foreach($questions as $question)
                            <li class="list-group-item">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-10">
                                        <h5 clas="mb-0">{{ $sequence }}. {{ $question->description }}</h5>
                                        <p class="mb-0 small text-muted">Cadastrada em {{ date('d/m/Y H:i:s', strtotime($question->created_at)) }}</p>
                                    </div>

                                    <div class="col-2 d-flex justify-content-end">
                                        <form action="{{ route('question-destroy', ['quiz_id' => $quiz->id, 'question_id' => $question->id]) }}" method="post" onsubmit="return confirm('Tem certeza que deseja deletar esta pergunta?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-close"></button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <?php
                            $sequence += 1;
                            ?>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
