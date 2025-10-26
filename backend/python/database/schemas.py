from pydantic import BaseModel


class MovieSchema(BaseModel):
    name: str
    overview: str
    posterurl: str
    genres: str
