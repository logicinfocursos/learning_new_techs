import json
import os
from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker
from app import Movie, Base
from dotenv import load_dotenv

# Carregar variáveis de ambiente do .env
load_dotenv()
DATABASE_URL = os.getenv("DATABASE_URL")
if not DATABASE_URL:
    raise RuntimeError("DATABASE_URL não definida no arquivo .env")
if DATABASE_URL.startswith("mysql://"):
    DATABASE_URL = DATABASE_URL.replace("mysql://", "mysql+mysqlconnector://", 1)

engine = create_engine(DATABASE_URL)
SessionLocal = sessionmaker(bind=engine)

# Ler dados do movies.json
with open("movies.json", "r", encoding="utf-8") as f:
    movies_data = json.load(f)

# Inserir dados na tabela movies
session = SessionLocal()
try:
    for movie in movies_data:
        # Ajuste os campos conforme o formato do JSON
        new_movie = Movie(
            name=movie.get("name", ""),
            overview=movie.get("overview", ""),
            posterurl=movie.get("posterurl", ""),
            genres=movie.get("genres", ""),
        )
        session.add(new_movie)
    session.commit()
    print(f"{len(movies_data)} filmes inseridos com sucesso!")
finally:
    session.close()
