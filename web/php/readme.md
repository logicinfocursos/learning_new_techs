# Projeto Filmes Web em PHP

Este projeto exibe os filmes da API `localhost:7111/movies` com visual moderno.

## Passo a passo

### 1. Instalar o PHP
- Baixe e instale em https://windows.php.net/download/
- Adicione o PHP ao PATH se necessário.
- Verifique com:
  ```
  php --version
  ```

### 2. Instalar dependências
No terminal, na pasta do projeto:
```
composer require vlucas/phpdotenv
```

### 3. Configurar variáveis de ambiente
Edite o arquivo `.env` conforme exemplo:
```
API_URL=http://localhost:7111
APP_PORT=8114
```

### 4. Executar o projeto
No terminal:
```
php -S localhost:8114
```
Acesse: http://localhost:8114

---

## Estrutura
- `index.php`: Código principal
- `templates/`: HTML
- `static/`: CSS
- `.env`: Variáveis de ambiente
- `.gitignore`: Arquivos ignorados

---

## Dicas
- Para instalar novos pacotes: `composer require <pacote>`
