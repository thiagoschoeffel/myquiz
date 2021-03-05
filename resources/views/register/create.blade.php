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

                <p class="mb-3 text-center text-muted">Para crirar uma nova conta de usuário, basta preencher os dados abaixo e começar a criar seus questionários.</p>

                <hr class="my-4">

                @include('components.message')

                <form action="{{ route('register-store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label small text-muted">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label small text-muted">E-Mail</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label small text-muted">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" min="1" required>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check2"></i>
                            Registrar
                        </button>

                        <a href="{{ route('login') }}" class="text-primary text-decoration-none">
                            <i class="bi bi-arrow-left"></i>
                            Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
