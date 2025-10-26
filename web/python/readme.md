# Projeto Filmes Python (Flask)

Este projeto exibe os registros da tabela `movies` consumindo a API em `localhost:7111/movies`.

## Requisitos
- Python 3.8 ou superior
- pip (gerenciador de pacotes Python)

## Passo a passo

### 1. Instalar o Python
- Baixe e instale o Python em https://www.python.org/downloads/
- Certifique-se de marcar a opção "Add Python to PATH" durante a instalação.
- Para verificar a instalação, execute no terminal:
  ```bash
  python --version
  ```

### 2. Criar ambiente virtual
No terminal, navegue até a pasta do projeto e execute:
```bash
python -m venv venv
```

Ative o ambiente virtual:
- **Windows:**
  ```bash
  venv\Scripts\activate
  ```
   No Bash:
  ```
  source venv/Scripts/activate
  ```
- **Linux/Mac:**
  ```bash
  source venv/bin/activate
  ```

### 3. Instalar dependências
Com o ambiente virtual ativado, execute:
```bash
pip install -r requirements.txt
```

### 4. Configurar variáveis de ambiente
Edite o arquivo `.env` conforme exemplo:
```
API_URL=http://localhost:7111
APP_PORT=8112
```

### 5. Executar o projeto
No terminal, execute:
```bash
python app.py
```
O app estará disponível em http://localhost:8112

---

## Estrutura do projeto
- `app.py`: Código principal do Flask
- `templates/`: HTML renderizado
- `static/`: Arquivos estáticos (CSS, imagens)
- `.env`: Variáveis de ambiente
- `requirements.txt`: Dependências
- `.gitignore`: Arquivos ignorados pelo Git

---

## Dicas
- Para sair do ambiente virtual, execute `deactivate`.
- Para instalar novas dependências, use `pip install nome_pacote` e depois `pip freeze > requirements.txt`.
