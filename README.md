# SysBeer - Sistema de Gerenciamento de Cervejaria

SysBeer é um sistema de gerenciamento para uma cervejaria, desenvolvido como parte do projeto da disciplina de Arquitetura de Software. Ele utiliza o padrão MVC (Model-View-Controller) com Laravel no backend e Vue.js no frontend, com o Vite como bundler para o desenvolvimento.

## Tecnologias Utilizadas

- **Backend**: Laravel 11, PHP 8.3
- **Frontend**: Vue 3, Vite
- **Banco de Dados**: MySQL
- **Gerenciador de Dependências**: Composer 2.8.5
- **Node.js**: v21.7.3

## Pré-requisitos
- PHP 8.3 ou superior
- Composer 2.8.5 ou superior
- Node.js v21.7.3 ou superior
- MySQL

## Rodando o Projeto

### 1. Clone o Repositório

Primeiro, faça o clone do repositório para sua máquina local:

```bash
https://github.com/DaianePorcena/SYSBEER.git
cd sysbeer
```

### 2. Instalar Dependências

Instale as dependências do backend e frontend:

```bash
composer install
npm install
```
### 3. Configuração do Banco de Dados

- Crie um banco de dados MySQL chamado ```sysbeer```.
- Renomeie o arquivo .env.example para ```.env```:

```bash
cp .env.example .env
```
- Configure as variáveis de conexão do banco de dados no arquivo ```.env```:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Rodar Migrations

Execute as migrations para criar as tabelas do banco de dados:

```bash
php artisan migrate
```

### 5. Rodar Seeders

Rode os seeders para popular o banco com dados iniciais:

```bash
php artisan db:seed
```
### 6. Rodar o Servidor PHP

```bash
php artisan serve
```

### 7. Rodar o Frontend com Vite

```bash
npm run dev
```

Agora, o sistema estará rodando localmente. Acesse o sistema pelo navegador na URL http://127.0.0.1:8000 
