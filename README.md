## Sobre o MyQuiz

Este pequeno sistema web foi desenvolvido para gerenciar questionários. Com ele é possível:

- Cadastrar novos questionários;
- Cadastrar e deletar perguntas de um questionário;
- Responder perguntas de um questionário;
- Visualizar as respostas de um questionário.

Ele foi criado com **Laravel 8**, a versão mais atual
do framework PHP, um dos mais utilizados no mundo, uma ferramenta
ótima para desenvolver rapidamente qualquer sistema.

Para desenvolvimento das views, foi utilizado o template engine
**Blade** que já vem integrado por padrão ao framework
e para dar mais estilo a aplicação usamos o **Bootstrap 5**.

Para rodar o sistema é muito simples, basta utilizar o gerenciador de
containers **Docker** e o seu orquestrador o **Docker Compose**. Acesse a
pasta da aplicação no terminal e rode o comando abaixo:

```
docker-compose up
```

Após esse comando toda a infra-estrutura será construída e quando estiver no ar basta
acessar a pasta da aplicação no terminal e digitar o seguite comando:

```
docker-compose exec app composer install
```

e

```
docker-compose exec app php artisan migrate
```

Estes dois últimos comandos farão a instalação de todas as dependências do projeto e também a
criação de todas as tabelas do banco de dados. Se tudo ocorreu bem, a aplicação
estará rodando, bastando acessar o endereço:

[http://localhost:8000](http://localhost:8000)

Com o **Docker** e **Docker Compose** conseguimos garantir
que a aplicação vai rodar sem nenhum problema, pois o ambiente é
previamente configurado, tendo em vista todas os requisitos necessários.
