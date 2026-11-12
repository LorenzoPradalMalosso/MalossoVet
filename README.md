# Resolução do Desafio SAEP: Sistema de Gestão para Clínica Veterinária

**Avaliação Prática de Desempenho dos Estudantes - SAEP**

**Tecnologias**: PHP 8.5, PostgreSQL, PDO (Prepared Statements)

**Arquitetura**: MVC Artesanal, Autoload PSR-4 via Composer

---

## Apresentação do Projeto e Visão Geral

Este documento apresenta a resolução integral para o **Sistema de Gestão de Clí­nica Veterinária** - SGCV

- Segurança LGPD
- Sessão com Tempo de Expiração
- Código Limpo e Princí­pio SOLID
- Uso de Credenciais
- Prevenção de Vulnerabilidade (XSS, SQL Injection, CSRF)

## Entregas

### Identificação do Projeto
- **Nome do Sistema**: MalossoVet - Sistema de Gestão de Clí­nica Veterinária
- **Público-Alvo**: Veterinários, Recepcionista e Gestores da Clí­nica
- **Problema**: Eliminação dos controles manuais, duplicidade de registro, perda de agendamentos e risco de vazamento de dados (LGPD)

### Requisitos Funcionais (RF)

- **RF-01**: Autenticação e Sessão de Expiração -> Autenticação dos usuários com e-mail e senha (hash para criptografia) e expirar sessão após tempo de limite de inatividade no site (10 minutos). Exibir alerta em casos de erros.
- **RF-02**: Logout -> Encerrar sessão e destruir dados do usuário (cookies).
- **RF-03**: Cadastro de Tutores (LGPD) -> O CPF dos tutuores deve ser armazenado de forma criptograda no banco de dados.
- **RF-04**: Tela Principal (dashboard) -> Deve exibir o nome do usuário logado e uma forma de acessar demais recursos do software e maneira de sair (encerrar sessão).
- **RF-05**: Busca e Listagem de Tutores -> Mecanismo de busca por termos e listagem dos resultados.
- **RF-06**: Edição de Tutores -> O sistema deve permitir a alteração de dados dos tutores e fazer a atualização no banco de dados.
- **RF-07**: Criação de Agendamento -> O sistema deve permitir a criação de agendamentos.
- **RF-08**: Listagem de Agendamentos -> A listagem deve ser feita por dia de agendamento, exibindo todos os dados do tutor e do pet.
- **RF-09**: Edição de Agendamentos -> O sisteva deve permitir a alteração da data de um agendamento já cadastrado, salvando a alteração no banco de dados.
- **RF-10**: Cadastro de Pets -> O sistema deve permitir o cadastro de um novos pets, sempre vinculados a um tutor.
- **RF-11**: Listagem de Pets -> Listar todos os pets cadastrados.

### Requisitos Não Funcionais (RNF)

- **RNF-01**: Arquitetura MVC
- **RNF-02**: Mapeamento via PSR-04
- **RNF-03**: Proteção e Criptografia
- **RNF-04**: Armazenamento em Banco de Dados Relacional

### Diagrama de Entidades Relacionais (DER)

```mermaid

erDiagram
    title "DER - Sistema de Gestão de Clí­nica Veterinária"

    usuarios {
        int id PK
        varchar nome
        varchar email UNIQUE
        varchar senha_hash
        varchar perfil
        timestamp criado_em
    }

    tutores {
        int id PK
        varchar nome
        varchar cpf_ciptografado
        varchar email
        timestamp criado_em
    }

    pets {
        int id PK
        int tutor_id FK
        varchar nome
        varchar especie
        varchar raca
        date data_nascimento
        timestamp cadastrado_em
    }

    agendamentos {
        int id PK
        int tutor_id FK
        int pet_id FK
        int usuario_id FK
        date data_agendamento
        time hora_agendamento
        varchar servico
        varchar status
        text observacao
        time
    }

    usuarios ||--o{ agendamentos : "agenda/gerencia"
    tutores ||--o{ pets : "possui (1:N)"
    tutores ||--o{ agendamentos : "responsavel (1:N)"
    pets ||--o{ agendamentos : "paciente (1:N)"
```

## Banco de Dados - Script de Criação e População

Criação do arquivo saep_db.sql

## Construção da Aplicação (`sistema/`)

### Composer.json

Configurações do AutoLoad - PSR4

## Como executar

1. Instale PHP 8.2+ com as extensões `pdo_pgsql` e `openssl`, Composer e PostgreSQL.
2. Execute `composer install` dentro da pasta `sistema/` para gerar o autoload.
3. Crie o banco e as tabelas uma única vez, na raiz do projeto: `createdb -U postgres saep_db` e depois `psql -U postgres -d saep_db -f saep_db.sql`.
4. Confira host, porta, banco, usuário e senha em `sistema/config/database.ini`.
5. Na raiz do projeto, inicie o servidor:

   ```sh
   php -S 127.0.0.1:8080 -t sistema/public sistema/public/router.php
   ```

6. Acesse `http://127.0.0.1:8080/login` e entre com `malosso.vet@digitalvet.com` e senha `123456`.