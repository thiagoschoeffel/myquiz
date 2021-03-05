@extends('layout')

@section('content')
<div class="row mb-5 justify-content-center">
    <div class="col col-md-8 col-lg-5">
        <div class="card shadow-sm">
            <div class="card-body p-5">
                <h1 class="mb-3 text-center fw-bold">
                    <i class="bi bi-filter-right"></i>
                    MyQuiz
                </h1>

                <p class="mb-3 text-center text-muted">Esta é uma área restrita, por favor faça seu login ou cadastre-se.</p>

                <hr class="my-4">

                @include('components.message')

                <form action="{{ route('login-process') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label small text-muted">E-Mail</label>
                        <input type="email" name="email" id="email" class="form-control" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label small text-muted">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" min="1" required>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Entrar
                        </button>

                        <a href="{{ route('register-create') }}" class="text-primary text-decoration-none">
                            <i class="bi bi-person-plus"></i>
                            Cadastro
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
