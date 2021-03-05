@extends('layout')

@section('content')
<div class="row mb-5">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body p-5">
                @include('components.message')

                <h1 class="mb-3">
                    <span class="d-block h6 mb-0">Este é o</span>
                    <span class="d-block h2 mb-0 fw-bold"><i class="bi bi-filter-right"></i> MyQuiz</span>
                </h1>

                <p>Este pequeno sistema web foi desenvolvido para gerenciar questionários. Com ele é possível:</p>

                <ul>
                    <li>Cadastrar novos questionários;</li>
                    <li>Cadastrar e deletar perguntas de um questionário;</li>
                    <li>Responder perguntas de um questionário;</li>
                    <li>Visualizar as respostas de um questionário.</li>
                </ul>

                <p>Ele foi criado com <strong>Laravel 8</strong>, a versão mais atual
                    do framework PHP, um dos mais utilizados no mundo, uma ferramenta
                    ótima para desenvolver rapidamente qualquer sistema.</p>

                <p>Para desenvolvimento das views, foi utilizado o template engine
                    <strong>Blade</strong> que já vem integrado por padrão ao framework
                    e para dar mais estilo a aplicação usamos o <strong>Bootstrap 5</strong>.</p>

                <p>Para rodar o sistema é muito simples, basta utilizar o gerenciador de
                    containers <strong>Docker</strong> e o seu orquestrador o <strong>Docker Compose</strong>. Acesse a
                    pasta da aplicação no terminal e rode o comando abaixo:</p>

                <p></p><code>docker-compose up</code></p>

                <p>Após esse comando toda a infra-estrutura será construída e quando estiver no ar basta
                    acessar a pasta da aplicação no terminal e digitar o seguite comando:</p>

                <p></p><code>docker-compose exec app composer install</code> e <code>docker-compose exec app php artisan migrate</code></p>

                <p>Estes dois últimos comandos farão a instalação de todas as dependências do projeto e também a
                    criação de todas as tabelas do banco de dados. Se tudo ocorreu bem, a aplicação
                    estará rodando, bastando acessar o endereço:</p>

                <p><a href="http://localhost:8000" class="text-primary text-decoration-none">http://localhost:8000</a></p>

                <p>Com o <strong>Docker</strong> e <strong>Docker Compose</strong> conseguimos garantir
                    que a aplicação vai rodar sem nenhum problema, pois o ambiente é
                    previamente configurado, tendo em vista todas os requisitos necessários.</p>

                <p>A aplicação está disponível no <strong>GitHub</strong>, basta clonar o repositório e usar.</p>

                <p><a href="https://github.com/thiagoschoeffel/desafio-questionarios" target="_blank" class="text-primary text-decoration-none"><i class="bi bi-github"></i> Repositório GitHub</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
