# Sistema de Viagens em PHP framework Laravel

Este repositório contém a configuração do Docker de um projeto Laravel 11 utilizando PHP 8.3.
Repositorio original do setup-docker: 
https://github.com/especializati/setup-docker-laravel/tree/laravel-11-with-php-8.3

## Ambiente

Durante o desenvolvimento, foi utilizado o **WSL2** (Windows Subsystem for Linux 2) junto com o Docker Desktop no Windows para oferecer um ambiente mais próximo do Linux, melhorando a compatibilidade e a performance.

- **Docker**:
  - [Download do Docker](https://www.docker.com/products/docker-desktop)
- **Docker Compose**: Para orquestrar os containers.
- **Ubuntu 20.04+** com **WSL2** (para Windows):
  - [Instruções de instalação do WSL2 no Windows](https://docs.microsoft.com/pt-br/windows/wsl/install)

## Como Rodar o Projeto

No diretório do projeto, execute o comando abaixo para construir os containers do Docker:

```bash
docker-compose build
```

Após a construção dos containers, você pode iniciar o ambiente com o comando:

```bash
docker-compose up -d
```

Isso iniciará os containers em segundo plano.

Copie o arquivo `.env.example` para `.env` com o comando:

```bash
cp .env.example .env
```

Se precisar acessar o container da aplicação Laravel diretamente, execute:

```bash
docker-compose exec app bash
```

**Instalar o Composer no ambiente**:

  ```bash
  composer install
  ```

**Gerar a chave da aplicação**:

  ```bash
  php artisan key:generate
  ```

**Executar as migrações do banco de dados**:

  ```bash
  php artisan migrate
  ```

**Acesso à aplicação**: [http://localhost:8000/](http://localhost:8000/)

**Gerar Dados Aleatorios de Veiculos e Motoristas**

Dentro do docker-compose
 ```bash
  php artisan tinker
 ```

Depois so rodar os dois comandos abaixo separadamente
 ```bash
  App\Models\Motoristas::factory()->count(40)->create();
 ```
 
 ```bash
  App\Models\Veiculos::factory()->count(40)->create();
 ```
Apos isso os dados ja foram injetados nos sistemas
