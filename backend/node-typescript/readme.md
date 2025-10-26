# API Node.js + TypeScript + Prisma

## Passo a passo para rodar o projeto

### 1. Instalar Node.js
Baixe e instale o Node.js em https://nodejs.org/

### 2. Instalar dependências do projeto
```bash
npm install
```
Ou, se preferir usar yarn:
```bash
yarn install
```

### 3. Instalar TypeScript globalmente (opcional)
```bash
npm install -g typescript
```

### 4. Instalar Prisma CLI globalmente (opcional)
```bash
npm install -g prisma
```

### 5. Configurar o banco de dados MySQL
Certifique-se que o MySQL está rodando em:
- Host: 127.0.0.1
- Porta: 3309
- Usuário: root
- Senha: rootpassword
- Banco: medias

### 6. Executar as migrações do Prisma
```bash
npx prisma migrate dev --name init
```

### 7. Gerar o cliente Prisma
```bash
npx prisma generate
```

### 8. Popular o banco com os dados de filmes (seed)
```bash
npm run seed
```
Ou, se estiver usando yarn:
```bash
yarn seed
```

### 9. Executar o projeto em modo desenvolvimento
```bash
npm run dev
```
Ou, se estiver usando yarn:
```bash
yarn dev
```

### 10. Acessar a API
Acesse: http://localhost:7111/movies

---

## Estrutura do projeto
- TypeScript
- Express
- Prisma ORM
- MySQL
- Rotas REST para filmes
