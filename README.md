# Blog MVP

Este projeto é um MVP (Produto Mínimo Viável) de um blog, desenvolvido para um processo seletivo. O objetivo é permitir a criação e visualização de posts, com diferentes funcionalidades para usuários logados e deslogados.

## Tecnologias Utilizadas

- **Backend**: PHP Laravel e Slim Framework
- **Frontend**: Bootstrap, JavaScript, CSS
- **Banco de Dados**: MySQL (phpMyAdmin)

## Funcionalidades

- **Usuários Logados**:
  - Criar e visualizar posts.
  - Visualizar posts criados por outros usuários.
  
- **Usuários Deslogados**:
  - Visualizar posts em tempo real.
  - Cadastrar-se e Logar-se na plataforma.

## Estrutura do Projeto

- **database/**: Contém o arquivo SQL de dump do banco de dados e o print das tabelas.
- **api_blog/**: Diretórios e funcionalidades do Slim Framework para a construção da API.
- **blog/**: Diretórios e funcionalidades do Laravel para o desenvolvimento do site.
- **readme.md e Relatório Técnico**: Descrição do projeto.
- **Exercício Samplemed**: Descrição da atividade solicitada no processo seletivo.

## Instalação

1. Clone o repositório.
2. Configure o ambiente seguindo as instruções nos diretórios `api_blog` e `blog`.
3. Importe o banco de dados a partir do arquivo em `database/`.

## Uso

1. **Inicie o servidor** para o backend e frontend. (php artisan serve)
2. **Acesse** o site para criar e visualizar posts. (localhost:8000)


