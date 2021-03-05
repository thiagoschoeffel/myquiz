@extends('layout')

@section('content')
<div class="row mb-5">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body p-5">
                <div class="row mb-5">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <h3 class="m-0 mt-3 fw-bold">Respostas Questionário</h3>
                        <p clas="mb-0 small">&raquo; {{ $quiz->title }}</p>
                    </div>

                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-md-end">
                        <a href="{{ route('quiz') }}" class="text-primary text-decoration-none">
                            <i class="bi bi-arrow-left"></i>
                            Voltar
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
                                <h5 clas="mb-0">{{ $sequence }}. {{ $question->description }}</h5>

                                @foreach($question->answers as $answer)
                                <div class="p-3 border-start border-3 border-primary {{ ($question->answers->last()) ? 'mb-0' : 'mb-3' }}">
                                    <p class="mb-0 small text-muted">Por {{ $answer->user->name }} em {{ date('d/m/Y H:i:s', strtotime($answer->created_at)) }}</p>

                                    <p class="mb-2 fst-italic">{{ $answer->description }}</p>

                                    <p class="mb-0 small text-muted">
                                        <span class="d-flex align-items-center">
                                            <a href="https://www.google.com.br/maps/@<?= $answer->latitude ?>,<?= $answer->longitude ?>z" target="_blank" class="text-primary text-decoration-none me-3">
                                                <i class="bi bi-globe"></i>
                                                Local
                                            </a>
                                            <span>
                                                Latitude: {{ $answer->latitude }} <br>
                                                Longitude: {{ $answer->longitude }}
                                            </span>
                                        </span>
                                    </p>
                                </div>
                                @endforeach
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
    @endsection
