@extends('layout')

@section('content')
<div class="row mb-5">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body p-5">
                <div class="row mb-5">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <h3 class="m-0 mt-3 fw-bold">Responder Questionário</h3>
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

                        <form action="{{ route('answer-store', ['quiz_id' => $quiz->id]) }}" method="post">
                            @csrf
                            <ul class="list-group mb-3">
                                <?php
                                $sequence = 1;
                                ?>
                                @foreach($questions as $question)
                                <li class="list-group-item">
                                    <h5 clas="mb-0">{{ $sequence }}. {{ $question->description }}</h5>

                                    @if($question->answers->count() > 0)
                                    <div class="p-3 border-start border-3 border-primary">
                                        <p class="mb-0 small text-muted">Por {{ $question->answers[0]->user->name }} em {{ date('d/m/Y H:i:s', strtotime($question->answers[0]->created_at)) }}</p>

                                        <p class="mb-2 fst-italic">{{ $question->answers[0]->description }}</p>

                                        <p class="mb-0 small text-muted">
                                            <span class="d-flex align-items-center">
                                                <a href="https://www.google.com.br/maps/@<?= $question->answers[0]->latitude ?>,<?= $question->answers[0]->longitude ?>z" target="_blank" class="text-primary text-decoration-none me-3">
                                                    <i class="bi bi-globe"></i>
                                                    Local
                                                </a>
                                                <span>
                                                    Latitude: {{ $question->answers[0]->latitude }} <br>
                                                    Longitude: {{ $question->answers[0]->longitude }}
                                                </span>
                                            </span>
                                        </p>
                                    </div>
                                    @else
                                    <label for="answer-{{ $question->id }}" class="form-label small text-muted">Reposta</label>
                                    <input type="text" name="answer[{{ $question->id }}]" id="answer-{{ $question->id }}" class="form-control">
                                    @endif

                                </li>
                                <?php
                                $sequence += 1;
                                ?>
                                @endforeach
                            </ul>

                            <div class="mb-3">
                                <label for="latitude" class="form-label small text-muted">Latitude</label>
                                <input type="text" name="latitude" id="latitude" readonly class="form-control-plaintext">
                            </div>

                            <div class="mb-3">
                                <label for="longitude" class="form-label small text-muted">Longitude</label>
                                <input type="text" name="longitude" id="longitude" readonly class="form-control-plaintext">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check2"></i>
                                Salvar Respostas
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            let latitude = document.getElementById('latitude');
            let longitude = document.getElementById('longitude');

            latitude.value = position.coords.latitude;
            longitude.value = position.coords.longitude;
        });
    }

</script>

@endsection
