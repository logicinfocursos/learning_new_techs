// package.json: adicione type: "module"
import express from 'express';
import cors from 'cors';
import { PrismaClient } from '@prisma/client';
import dotenv from 'dotenv'

const app = express();
const prisma = new PrismaClient();

dotenv.config()
const port = process.env.API_PORT || 7111

// Middlewares
app.use(cors()); // Libera acesso de qualquer origem
app.use(express.json()); // Permite parsing de JSON

// Rota GET /movies - Listar todos os filmes
app.get('/movies', async (req, res) => {
  try {
    const movies = await prisma.movie.findMany();
    res.json(movies);
  } catch (error) {
    res.status(500).json({ error: 'Erro ao buscar filmes' });
  }
});

// Rota GET /movies/:id - Obter um filme por ID
app.get('/movies/:id', async (req, res) => {
  try {
    const movie = await prisma.movie.findUnique({
      where: { id: parseInt(req.params.id) }
    });
    movie ? res.json(movie) : res.status(404).json({ error: 'Filme não encontrado' });
  } catch (error) {
    res.status(500).json({ error: 'Erro ao buscar filme' });
  }
});

// Rota POST /movies - Criar novo filme
app.post('/movies', async (req, res) => {
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

// Rota PUT /movies/:id - Atualizar filme
app.put('/movies/:id', async (req, res) => {
  try {
    const updatedMovie = await prisma.movie.update({
      where: { id: parseInt(req.params.id) },
      data: req.body
    });
    res.json(updatedMovie);
  } catch (error) {
    res.status(404).json({ error: 'Filme não encontrado' });
  }
});

// Rota DELETE /movies/:id - Deletar filme
app.delete('/movies/:id', async (req, res) => {
  try {
    await prisma.movie.delete({
      where: { id: parseInt(req.params.id) }
    });
    res.status(204).send();
  } catch (error) {
    res.status(404).json({ error: 'Filme não encontrado' });
  }
});

// Inicia servidor
app.listen(port, () => console.log(`Api node js rodando na porta ${port}`));