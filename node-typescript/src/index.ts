import express, { Request, Response, NextFunction } from 'express';
import cors from 'cors';
import { PrismaClient } from '@prisma/client';
import dotenv from 'dotenv';
import { Movie } from './interfaces/movie';

// Interface padrão para erro de API
interface APIError {
  error: string;
}

// 1. Carregar variáveis de ambiente (.env)
dotenv.config();
const API_PORT: number = process.env.API_PORT ? Number(process.env.API_PORT) : 712;

// 2. Inicialização do framework (express) e ORM (prisma)
const app = express();
const prisma = new PrismaClient();

// 3. Middlewares
app.use(cors());
app.use(express.json());

// 4. Definição das rotas da API

// 4.1 Rota GET /movies - Listar todos os filmes
app.get('/movies', async (req: Request, res: Response<Movie[] | APIError>) => {
  try {
    const movies = await prisma.movie.findMany();
    res.json(movies);
  } catch (error) {
    res.status(500).json({ error: 'Erro ao buscar filmes' });
  }
});

// 4.2 Rota GET /movies/:id - Obter um filme por ID
app.get('/movies/:id', async (req: Request, res: Response<Movie | APIError>) => {
  try {
    const movie = await prisma.movie.findUnique({
      where: { id: Number(req.params.id) }
    });
    movie ? res.json(movie) : res.status(404).json({ error: 'Filme não encontrado' });
  } catch (error) {
    res.status(500).json({ error: 'Erro ao buscar filme' });
  }
});

// 4.3 Rota POST /movies - Criar novo filme
app.post('/movies', async (req: Request<{}, {}, Movie>, res: Response<Movie | APIError>) => {
  try {
    const { name, overview, posterurl, genres } = req.body;
    const newMovie = await prisma.movie.create({
      data: { name, overview, posterurl, genres }
    });
    res.status(201).json(newMovie);
  } catch (error) {
    res.status(400).json({ error: 'Dados inválidos' });
  }
});

// 4.4 Rota PUT /movies/:id - Atualizar um filme
app.put('/movies/:id', async (req: Request<{ id: string }, {}, Movie>, res: Response<Movie | APIError>) => {
  try {
    const updatedMovie = await prisma.movie.update({
      where: { id: Number(req.params.id) },
      data: req.body
    });
    res.json(updatedMovie);
  } catch (error) {
    res.status(404).json({ error: 'Filme não encontrado' });
  }
});

// 4.5 Rota DELETE /movies/:id - Deletar filme
app.delete('/movies/:id', async (req: Request<{ id: string }>, res: Response<APIError>) => {
  try {
    await prisma.movie.delete({
      where: { id: Number(req.params.id) }
    });
    res.status(204).send();
  } catch (error) {
    res.status(404).json({ error: 'Filme não encontrado' });
  }
});

// 5. Inicialização do servidor na porta definida (API_PORT)
app.listen(API_PORT, () => console.log(`API Node.js + TypeScript rodando na porta ${API_PORT}`));
