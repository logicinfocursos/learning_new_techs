# Acelere o seu aprendizado de novas tecnologias 
[código fonte](https://github.com/logicinfocursos/learning_new_techs.git)
Como seria aprender de uma só vez 2, 3, 10 novas linhagues de programação?
## Aprenda novas tecnologias usando o conhecimento que você já tem
O meu objetivo é criar um conjunto de exemplos para ajudar você a aprender novas <strong>tecnologias</strong> usando a <strong>tecnologia</strong> que você já conhece. <strong>Aprendizado por analogia. </strong>

Dessa forma irei presumir que você já conhece o básico da programação e ao menos uma das tecnologias abordadas neste projeto.

Por exemplo, se você já conhece Node JS, vai ficar fácil aprender python replicando o mesmo projeto usando, na medida do possível, a mesma estrutura em ambas tecnologias. 

Iremos construir as api's (backend) para acesso ao banco de dados e os app (frontend) para consultar os resultados.

É imporante que cada tecnologia tem caracteríscitas que muitas vezes não são encontradas em outras. Por exemplo Go e Rust, não implementam o conceito de O.O. (objeto-orientado) e C# e Java não tem o conceito de métodos estáticos.

Em alguns casos, o frontend será web (a nossa prioridade), mas em algumas situações apps desktop ou mobile sejam as melhores opções (por exemplo: Flutter e Dart, electron e node.js).

Talvez quando você encontrar esse material eu ainda esteja gerando dos conteúdos, peço a sua paciência, pois a jornada necessária para criar esse volume de conteúdo é muito grande. Irei iniciar pelo backend...

### Como "rodar" os projetos
Em cada pasta referente ao projeto/tecnologia, você irá encontrar um arquivo readme.md com instruções de como instalar as dependências e executar o projeto.

### API's (backend) 
Para o módulo de apis, cada etapa está númerada e em todos os projetos, mantendo a mesma ordem de execução:
0. Importar as dependências
1. Carregar as variáveis do .env
2. Definir a porta da API
3. Inicializar o framework e ORM (conexão com o banco de dados + estrutura de dados)
4. Configurar os Middlewares (CORS, etc)
5. Definir as rotas da API para a realização do CRUD (create, read, update e delete - métodos http POST, GET, PUT e DELETE)
6. Inicializar o servidor na porta definida (API_PORT)


Independente da tecnologia escolhida, o código irá seguir essa ordem de execução das etapas.

#### Tecnologias backend
- Node.js com javascript (Framework: Express e ORM: Prisma)
- Node.js com typescript (Framework: Express e ORM: Prisma)
- Python (Framework: FastAPI e ORM: SQLAlchemy) 
- Go (Framework: Gin e ORM: GORM)
- PHP (Framework: Slim e ORM: Doctrine) 


### APP's (frontend)

Para simplificar todos os apps de frontend terão a mesma funcionalidade básica, listar os registros obtidos através dos retornos das requisições http recebidos através da api. Existem várias possibilidades para realizar a exibição dos registros, dependendo do dispositivo e métodos de exibição: Para acesso via computadores poderemos ter apps web, desktop e console (terminal) e para celulares poderemos visualizar por apps mobile ou através de navagadores web.

Para os apps web, independente da tecnologia utilizada (node com javascript, go, python ou php) para garantir resultados virtualmente iguais (mesmo layout de apresentação), todos os apps irão usar o mesmo arquivo css e a mesma estrutura para compor o arquivo html.

Na medida do possível iremos acrescentando novas tecnologias e formas de apresentação.


#### WEB
- node js com javascript, express e ejs
- Python & flask
- Go  - web 
- PHP  - web 

abaixo uma imagem para ilustrar a aparência a ser obtida em todos os apps:
<img src="https://personalizetudo.com.br/assets/images/frontend.png" alt="drawing" width="600"/>

# Comparação Rápida: JavaScript, TypeScript, Go, Python e PHP

> Tabela prática para devs que já conhecem pelo menos uma linguagem (especialmente JavaScript). Foco em conceitos do dia a dia.

| Categoria | JavaScript (Node.js) | TypeScript (Node.js) | Go | Python | PHP |
|---------|------------------------|------------------------|----|--------|-----|
| **Orientação a Objetos** | `class`, `new`, `this`. Herança com `extends`. | Mesmo que JS + tipos (`private`, `public`, etc.). | Não tem OOP clássica. Usa `struct` + métodos com *receiver*. Sem herança. | Tudo é objeto. `class`, `__init__`, herança múltipla. | `class`, `extends`, `public/private/protected`, traits. |
| **Construtor** | `constructor() { }` | `constructor() { }` | Não há. Inicializa via função ou literal. | `def __init__(self, ...):` | `public function __construct() { }` |
| **Funções** | `function f() { }` ou `const f = () => {}` | Mesmo que JS + tipos: `function f(): void {}` | `func f() { }` | `def f():` | `function f() { }` |
| **Blocos** | `{ }` | `{ }` | `{ }` | `:` + indentação | `{ }` |
| **Comentários** | `//` ou `/* */` | `//` ou `/* */` | `//` ou `/* */` | `#` ou `"""` | `//`, `#` ou `/* */` |
| **Variáveis** | `let x = 1`, `const y = 2` | `let x: number = 1` | `x := 1` ou `var x = 1` | `x = 1` | `$x = 1;` |
| **Constantes** | `const PI = 3.14` | `const PI = 3.14` | `const PI = 3.14` | Convenção: `PI = 3.14` | `const PI = 3.14;` ou `define('PI', 3.14)` |
| **Listas / Arrays** | `[1, 2, 3]` | `number[] = [1, 2, 3]` | `[]int{1, 2, 3}` | `[1, 2, 3]` | `[1, 2, 3]` |
| **Dicionários / Objetos** | `{ a: 1 }` | `{ a: number }` | `map[string]int{"a": 1}` | `{"a": 1}` | `["a" => 1]` |
| **`if`** | `if (cond) { }` | `if (cond) { }` | `if cond { }` | `if cond:` | `if ($cond) { }` |
| **Loops** | `for`, `for...of`, `while` | Mesmo que JS | `for i := 0; i < n; i++` ou `for k, v := range m` | `for item in list:`, `while` | `for`, `foreach`, `while` |
| **Tratamento de erros** | `try { } catch (e) { }` | Mesmo que JS | Retorna `(valor, error)` | `try: ... except:` | `try { } catch (Exception $e) { }` |
| **Ponteiro (`*`)** | Não usa | Não usa | Sim: `*T`, `&var` | Não usa | Não usa |
| **Visibilidade** | Tudo público | `private`, `protected`, `public` | Maiúscula = exportado (`Func`) | `_` ou `__` = "privado" | `public`, `private`, `protected` |
| **Frameworks (Backend)** | Express, Fastify, NestJS | Express, NestJS, Fastify | Gin, Echo, Fiber | FastAPI, Flask, Django | Slim, Laravel, Symfony |
| **ORMs** | Prisma, TypeORM, Sequelize | Prisma, TypeORM, Sequelize | GORM, Ent | SQLAlchemy, Django ORM | Doctrine, Eloquent |
| **Gerenciador de pacotes** | `npm` / `yarn` | `npm` / `yarn` | `go mod` | `pip` | `composer` |
| **Arquivo de dependências** | `package.json` | `package.json` | `go.mod` | `requirements.txt` | `composer.json` |
| **Ambiente virtual** | `nvm` (opcional) | `nvm` | Não usa | `venv`, `poetry` | Não obrigatório |

> 💡 **Dica**: Este projeto segue a mesma estrutura lógica em todos os backends (7 etapas padronizadas) para facilitar o aprendizado por analogia. Veja mais em: [github.com/logicinfocursos/learning_new_techs](https://github.com/logicinfocursos/learning_new_techs.git)