# Projeto Laravel + React + SQLite com Docker

Este projeto combina Laravel 12, React (com Vite), banco de dados SQLite e Docker para facilitar a instalação e execução local. Após clonar o repositório, qualquer pessoa poderá rodar a aplicação com um simples `docker-compose up`.

## 🚀 Tecnologias

- Laravel 12
- React (via Vite)
- SQLite
- Docker e Docker Compose

## 🧱 Estrutura do Projeto

```
.
├── app/                 # Backend Laravel
├── resources/js/        # Frontend React
├── database/            # Migrations, seeders, SQLite
├── Dockerfile
├── docker-compose.yml
├── entrypoint.sh
├── package.json
├── vite.config.js
└── README.md
```

## 🐳 Como rodar com Docker

### Pré-requisitos

- Docker
- Docker Compose

### Passos

```bash
git clone https://github.com/aeciobrumel/testeDevFullStack
cd testeDevFullStack
cd app
docker-compose up --build
```

- A aplicação Laravel estará disponível em: http://localhost:8000
- O Vite (frontend React com hot reload) estará em: http://localhost:5173

⚠️ A primeira execução pode demorar um pouco, pois:

- Instala dependências PHP e Node
- Cria o banco `database/database.sqlite`
- Roda as migrations e popula dados com seeders

## 🧪 Dados de Teste

A seed cria usuários para login:

| Nome          | Email                 | Senha         | Tipo          |
| ------------- | --------------------- | ------------- | ------------- |
| Administrador | admin@senacrs.com     | administrador | Administrador |
| Moderador     | moderador@senacrs.com | moderador     | Moderador     |
| Leitor        | leitor@senacrs.com    | leitor        | Leitor        |
| Aécio Brumel  | aecio@senacrs.com     | 1234          | Administrador |

## 🔄 Comandos úteis

Dentro do container (`docker exec -it laravel_app bash`):

```bash
php artisan migrate:fresh --seed   # Reseta e repopula o banco
php artisan tinker                 # Teste de dados
```

## ✅ Funcionalidades

- Autenticação (login e logout)
- Listagem de usuários (blade e React)
- Edição e exclusão com base em permissões
- Componentes React reutilizáveis (formulários, botões, cartões)
- Hot Reload com Vite
- Banco persistente com SQLite

## 🛠️ Dicas para desenvolvimento

- Customize as seeds para seus próprios dados
- Use o React dentro das views Blade com facilidade

---

Feito com 💙 para facilitar o desenvolvimento fullstack com Laravel e React.
