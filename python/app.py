from fastapi import FastAPI, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from models.movie import Movie
from database.schemas import MovieSchema
from database.db import SessionLocal
from dotenv import load_dotenv
from fastapi import Depends
import os


# 1. Carregar variáveis de ambiente (.env)
# Equivalente ao dotenv.config() no Node.js
load_dotenv()
API_PORT = int(os.getenv("API_PORT", 8000))


# 2. Inicialização do framework (FastAPI) e ORM (SQLAlchemy)
# Equivalente a const app = express() e const prisma = new PrismaClient() no Node.js
app = FastAPI()

# Dependency do FastAPI para criar/fechar sessão do banco em cada requisição
# Equivalente ao uso do prisma em cada rota do Express
def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()


# 3. Middlewares
# Equivalente a app.use(cors()) e app.use(express.json()) no Node.js
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# 4. Definição das rotas da API
# Equivalente às rotas do Express (app.get, app.post, etc.)

# 4.1 Rota GET /movies - Listar todos os filmes
@app.get("/movies")
def get_movies(db=Depends(get_db)):
    # Equivalente a prisma.movie.findMany() no Node.js
    movies = db.query(Movie).all()
    return movies

# 4.2 Rota GET /movies/{movie_id} - Obter um filme por ID
@app.get("/movies/{movie_id}")
def get_movie(movie_id: int, db=Depends(get_db)):
    # Equivalente a prisma.movie.findUnique({ where: { id } })
    movie = db.query(Movie).filter(Movie.id == movie_id).first()
    if not movie:
        raise HTTPException(status_code=404, detail="Filme não encontrado")
    return movie

# 4.3 Rota POST /movies - Criar um novo filme
@app.post("/movies")
def create_movie(movie: MovieSchema, db=Depends(get_db)):
    # Equivalente a prisma.movie.create({ data })
    new_movie = Movie(**movie.dict())
    db.add(new_movie)
    db.commit()
    db.refresh(new_movie)
    return new_movie

# 4.4 Rota PUT /movies/{movie_id} - Atualizar um filme
@app.put("/movies/{movie_id}")
def update_movie(movie_id: int, movie: MovieSchema, db=Depends(get_db)):
    # Equivalente a prisma.movie.update({ where: { id }, data })
    db_movie = db.query(Movie).filter(Movie.id == movie_id).first()
    if not db_movie:
        raise HTTPException(status_code=404, detail="Filme não encontrado")
    for key, value in movie.dict().items():
        setattr(db_movie, key, value)
    db.commit()
    db.refresh(db_movie)
    return db_movie

# 4.5 Rota DELETE /movies/{movie_id} - Deletar um filme
@app.delete("/movies/{movie_id}")
def delete_movie(movie_id: int, db=Depends(get_db)):
    # Equivalente a prisma.movie.delete({ where: { id } })
    db_movie = db.query(Movie).filter(Movie.id == movie_id).first()
    if not db_movie:
        raise HTTPException(status_code=404, detail="Filme não encontrado")
    db.delete(db_movie)
    db.commit()
    return {"detail": "Filme deletado"}

# 5. Inicialização do servidor
# Equivalente a app.listen(API_PORT, ...) no Node.js
if __name__ == "__main__":
    import uvicorn
    print(f"API Python rodando na porta {API_PORT}")
    uvicorn.run("app:app", host="0.0.0.0", port=API_PORT, reload=True)
