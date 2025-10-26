# Passo a passo para executar o projeto FastAPI (Python)

## 1. Instalar o Python
- Baixe o instalador do Python em https://www.python.org/downloads/windows/
- Recomenda-se instalar a versão 3.10 ou superior.
- Marque a opção "Add Python to PATH" durante a instalação.

## 2. Criar ambiente virtual (Windows 11)
Abra o terminal (cmd, PowerShell ou Bash) na pasta do projeto e execute:

```
python -m venv venv
```

Ative o ambiente virtual:
- No CMD:
  ```
  venv\Scripts\activate
  ```
- No PowerShell:
  ```
  .\venv\Scripts\Activate.ps1
  ```
- No Bash:
  ```
  source venv/Scripts/activate
  ```

## 3. Instalar dependências

```
pip install -r requirements.txt
```

## 4. Configurar variáveis de ambiente
Crie um arquivo `.env` na raiz do projeto com o seguinte conteúdo (ajuste conforme necessário):

```
DATABASE_URL="mysql://root:root@127.0.0.1:3306/medias"
API_PORT=7112
```

## 5. Executar o projeto

```
uvicorn app:app --reload --port 7112
```
Ou simplesmente:
```
python app.py
```

## 6. Migrar/criar tabelas no banco de dados
A tabela será criada automaticamente ao rodar o projeto, não é necessário executar um comando de migrate manualmente.

## Observações
- Certifique-se que o MySQL está rodando e acessível.
- O projeto utiliza SQLAlchemy para criar as tabelas automaticamente.
- As variáveis de ambiente são lidas do arquivo `.env` usando a biblioteca `python-dotenv`.

## Seed Table
O SQLAlchemy não possui um comando "seed" nativo como frameworks de Node.js, mas é comum criar um script Python para ler dados (por exemplo, de um arquivo JSON) e inserir registros nas tabelas. Dessa forma, o arquivo seed.py vai usar o conteúdo de movies.json para inserir registros na tabela movies. para executar:
```
python seed.py
```