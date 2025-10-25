from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy import Column, Integer, String

Base = declarative_base()


class Movie(Base):
    __tablename__ = "movies"
    id = Column(Integer, primary_key=True, index=True, autoincrement=True)
    name = Column(String(255))
    overview = Column(String(255))
    posterurl = Column(String(255))
    genres = Column(String(255))
