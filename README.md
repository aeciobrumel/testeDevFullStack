# 🚀 Projeto FullStack Laravel + React + SQLite com Docker

Este é um projeto FullStack que combina **Laravel 12**, **React com Vite**, **SQLite** e **Docker** para facilitar o desenvolvimento e a implantação. Ideal para estudos, testes ou como ponto de partida para algo maior.

---

## 🐳 Rodando com Docker

### 📦 Requisitos

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

### ▶️ Instruções

Clone o repositório:

```bash
git clone https://github.com/aeciobrumel/testeDevFullStack
cd testeDevFullStack/app
```

Suba os containers:

```bash
docker compose up --build
```

> ✅ O script `entrypoint.sh` já está com permissão de execução versionada no Git, então você não precisa rodar `chmod`.

Acesse a aplicação:

- Backend (Laravel): [http://localhost:8000](http://localhost:8000)
- Frontend (Vite/React): [http://localhost:5173](http://localhost:5173)

---

## 💾 Banco de Dados SQLite

O banco é criado automaticamente como `database/database.sqlite`.

Na primeira execução, o sistema roda:

- `composer install`
- `php artisan migrate:fresh --seed`

---

## 👤 Usuários de teste

| Nome         | Email                 | Senha     | Permissão |
| ------------ | --------------------- | --------- | --------- |
| admin        | admin@senacrs.com     | admin     | admin     |
| moderador    | moderador@senacrs.com | moderador | moderador |
| leitor       | leitor@senacrs.com    | leitor    | leitor    |
| Aécio Brumel | aecio@senacrs.com     | 1234      | admin     |

---

## 🗂️ Estrutura

- `app/`: Código Laravel
- `resources/js/`: Código React
- `docker-compose.yml`: Orquestra os containers
- `entrypoint.sh`: Script de inicialização automática

---

## 🤝 Contribuindo

Contribuições são bem-vindas! Sinta-se à vontade para abrir PRs ou issues com melhorias ou correções.

---

## 📄 Licença

Este projeto é open-source e licenciado sob a [MIT License](LICENSE).
