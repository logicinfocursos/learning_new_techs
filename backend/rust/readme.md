# API Rust + Actix Web + Diesel

## Passo a passo para rodar o projeto

### 1. Instalar Rust
Baixe e instale o Rust em https://rustup.rs/

Para checar a versão do Rust instalada, execute no terminal:
```
rustc --version
cargo --version
```

### 2. Instalar Diesel CLI
Diesel é o ORM utilizado. Instale o CLI com suporte a MySQL:
```bash
cargo install diesel_cli --no-default-features --features mysql
```

### 3. Instalar MySQL
Certifique-se que o MySQL está rodando em:
- Host: 127.0.0.1
- Porta: 3306
- Usuário: root
- Senha: root
- Banco: medias

### 4. Configurar variáveis de ambiente
Edite o arquivo `.env` na pasta `rust`:
```
API_PORT=7117
DATABASE_URL=mysql://root:root@127.0.0.1:3306/medias
```

### 5. Instalar dependências do projeto
Na pasta `rust`, execute:
```bash
cargo build
```

### 6. Gerar arquivos de migração do Diesel
Na pasta `rust`, execute:
```bash
diesel setup
```
Se necessário, crie a tabela `movies` manualmente no MySQL:
```sql
CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    overview TEXT,
    posterurl VARCHAR(255),
    genres VARCHAR(255)
);
```

### 7. Rodar o projeto
Na pasta `rust`, execute:
```bash
cargo run
```
A API estará disponível em: http://localhost:7117/movies

### 8. Plugins recomendados para VS Code
- rust-analyzer (autocompletar, navegação, lint)
- crates (gerenciador de dependências)
- Better TOML (suporte ao Cargo.toml)
- Error Lens (realce de erros)

---

## Estrutura do projeto
- Actix Web (framework HTTP)
- Diesel ORM (acesso ao MySQL)
- Rotas REST para filmes
- Organização em modules: database, models, schema
- Configuração via .env

---

## Observações
- Para adicionar novas rotas, edite o arquivo `src/main.rs`.
- Para modificar a estrutura dos dados, edite `src/models/movie.rs` e `src/schema.rs`.
- Para rodar testes, utilize `cargo test`.


Localize o diretório de instalação do Rust:

Normalmente é C:\Users\<seu-usuario>\.cargo\bin.
Copie o caminho completo desse diretório.

Abra o menu Iniciar e pesquise por “Variáveis de ambiente” e selecione “Editar variáveis de ambiente do sistema”.

Na janela que abrir, clique em “Variáveis de Ambiente”.

Na seção “Variáveis de usuário”, localize a variável chamada Path e clique em “Editar”.

Clique em “Novo” e cole o caminho copiado (C:\Users\<seu-usuario>\.cargo\bin).

Clique em “OK” para fechar todas as janelas.

Feche e reabra o terminal (bash ou cmd).

Teste novamente com:

Se aparecer a versão do Rust, está tudo certo! Se precisar de ajuda para encontrar o caminho correto ou tiver algum erro, me avise.

rustc --version