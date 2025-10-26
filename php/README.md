# Guia de Instalação e Execução de Projeto PHP no Windows 11

Este tutorial irá guiá-lo passo a passo para instalar tudo o que é necessário para rodar projetos PHP, incluindo plugins/extensões recomendadas e como executar o projeto.

## 1. Instalar o PHP

1. Acesse o site oficial: https://windows.php.net/download/
2. Baixe a versão mais recente do PHP para Windows (Thread Safe ZIP).
3. Extraia o arquivo ZIP em uma pasta, por exemplo: `C:\php`.
4. Adicione o caminho da pasta do PHP à variável de ambiente `PATH`:
   - Pesquise por "Variáveis de Ambiente" no Windows.
   - Edite a variável `Path` e adicione o caminho da pasta PHP.
5. Para testar, abra o terminal (cmd ou bash) e execute:
   ```bash
   php -v
   ```
   Deve aparecer a versão do PHP instalada.

## 2. Instalar Composer (Gerenciador de Dependências PHP)

1. Acesse: https://getcomposer.org/download/
2. Baixe e execute o instalador para Windows.
3. Após instalar, teste no terminal:
   ```bash
   composer -V
   ```

## 3. Instalar Extensões/Plugins no VS Code

Recomendações:
- **PHP Intelephense** (autocomplete, lint, etc)
- **PHP Debug** (debugger)
- **PHP DocBlocker** (documentação)

Para instalar:
1. Abra o VS Code.
2. Vá em "Extensões" (Ctrl+Shift+X).
3. Pesquise e instale os plugins acima.

## 4. Instalar Dependências do Projeto

No terminal, navegue até a pasta do projeto e execute:
```bash
composer install
```
Isso irá instalar todas as dependências listadas no `composer.json`.

## 5. Executar o Projeto PHP

### Usando o servidor embutido do PHP:
No terminal, execute:
```bash
php -S localhost:8000
```
O projeto estará disponível em http://localhost:8000

### Usando frameworks (exemplo Slim):
Se o projeto usa Slim ou outro framework, siga as instruções do próprio projeto (normalmente basta rodar o comando acima).

## 6. Dicas Adicionais
- Certifique-se de que o arquivo `php.ini` está configurado corretamente (habilite extensões necessárias, como pdo, mbstring, etc).
- Para projetos que usam banco de dados, instale o MySQL ou PostgreSQL conforme necessário.

---

Pronto! Agora você pode desenvolver e executar projetos PHP no Windows 11.
