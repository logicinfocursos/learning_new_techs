import express from 'express';
import axios from 'axios';
import path from 'path';
import { fileURLToPath } from 'url';
import dotenv from 'dotenv';

dotenv.config();

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express();
const APP_PORT = process.env.APP_PORT || 4000;
const API_URL = process.env.API_URL || 'http://localhost:7111';

app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));
app.use(express.static(path.join(__dirname, 'public')));

app.get('/', async (req, res) => {
    try {
        const response = await axios.get(`${API_URL}/movies`);
        const movies = response.data;
        res.render('index', { movies });
    } catch (error) {
        res.status(500).send('Erro ao buscar filmes.');
    }
});

app.listen(APP_PORT, () => {
    console.log(`Servidor rodando em http://localhost:${APP_PORT}`);
});
