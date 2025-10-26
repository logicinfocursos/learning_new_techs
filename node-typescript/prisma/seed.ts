import { PrismaClient } from '@prisma/client';
import fs from 'fs';
import path from 'path';

const prisma = new PrismaClient();

async function main() {
  const filePath = path.join(__dirname, '../database/movies.json');
  const data = fs.readFileSync(filePath, 'utf-8');
  const movies = JSON.parse(data);

  for (const movie of movies) {
    await prisma.movie.upsert({
      where: { id: movie.id },
      update: {},
      create: {
        name: movie.name,
        overview: movie.overview,
        posterurl: movie.posterurl,
        genres: movie.genres,
      },
    });
  }
}

main()
  .catch(e => {
    console.error(e);
    process.exit(1);
  })
  .finally(async () => {
    await prisma.$disconnect();
  });
