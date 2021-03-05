@extends('layout')

@section('content')
<div class="row mb-5">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body p-5">
                <div class="row mb-5">
                    <div class="col-12 col-md-8 mb-3 mb-md-0">
                        <h3 class="m-0 fw-bold">Questionários Cadastrados</h3>
                    </div>

                    <div class="col-12 col-md-4 d-flex align-items-center justify-content-md-end">
                        <a href="{{ route('quiz-create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i>
                            Novo Questionário
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        @include('components.message')

                        <ul class="list-group">
                            @foreach($quizzes as $quiz)
                            <?php
                                $countAnswers = 0;

                                if($quiz->questions):
                                    foreach($quiz->questions as $question):
                                        if($question->answers->count() > 0) {
                                            $countAnswers++;
                                        }
                                    endforeach;
                                endif;
                            ?>
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-12 col-sm-4 col-md-3 col-lg-2 mb-3 mb-sm-0">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="bi bi-three-dots-vertical"></i>
                                                Opções
                                            </button>

                                            <ul class="dropdown-menu">
                                                @if($quiz->user->id === Auth::user()->id)
                                                <li>
                                                    <a href="{{ route('question', ['quiz_id' => $quiz->id]) }}" class="dropdown-item">
                                                        <i class="bi bi-question"></i>
                                                        Gerenciar Perguntas
                                                    </a>
                                                </li>
                                                @endif

                                                @if($quiz->questions->count() > 0 && $countAnswers > 0)
                                                <li>
                                                    <a href="{{ route('answer', ['quiz_id' => $quiz->id]) }}" class="dropdown-item">
                                                        <i class="bi bi-search"></i>
                                                        Visualizar Respostas
                                                    </a>
                                                </li>
                                                @endif

                                                @if($quiz->questions->count() > 0 && $countAnswers < $quiz->questions->count())
                                                    <li>
                                                        <a href="{{ route('answer-create', ['quiz_id' => $quiz->id]) }}" class="dropdown-item">
                                                            <i class="bi bi-check2-all"></i>
                                                            Responder
                                                        </a>
                                                    </li>
                                                    @endif

                                                    @if($quiz->user->id === Auth::user()->id)
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>

                                                    <li>
                                                        <form action="{{ route('quiz-destroy', ['quiz_id' => $quiz->id]) }}" method="post" onsubmit="return confirm('Tem certeza que deseja deletar este questionário?')">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="bi bi-trash"></i>
                                                                Deletar Questionário
                                                            </button>
                                                        </form>
                                                    </li>
                                                    @endif
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8 col-md-9 col-lg-10">
                                        <div class="row mb-3">
                                            <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                                                <p class="mb-0 small text-muted">Título</p>
                                                <p class="mb-0 ">{{ $quiz->title }}</p>
                                            </div>

                                            <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                                                <p class="mb-0 small text-muted">Usuário Criação</p>
                                                <p class="mb-0 ">{{ $quiz->user->name }}</p>
                                            </div>

                                            <div class="col-12 col-lg-4">
                                                <p class="mb-0 small text-muted">Data Criação</p>
                                                <p class="mb-0 ">{{ date('d/m/Y H:i:s', strtotime($quiz->created_at)) }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <p class="mb-0 small text-muted">Respondido?</p>
                                                <?php
                                                    $percent = ($countAnswers > 0 && $quiz->questions->count() > 0) ? round((100 * $countAnswers) / $quiz->questions->count()) : 0;
                                                ?>

                                                <div class="progress">
                                                    <?php
                                                    if($percent > 0 && $percent <=33) {
                                                        $percentColor = 'danger';
                                                    } else if($percent >= 34 && $percent <=67) {
                                                        $percentColor = 'warning';
                                                    } else {
                                                        $percentColor = 'success';
                                                    }
                                                    ?>

                                                    <div class="progress-bar bg-{{ $percentColor }}" style="width: {{ $percent }}%;">{{ $countAnswers }} / {{ $quiz->questions->count()}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
