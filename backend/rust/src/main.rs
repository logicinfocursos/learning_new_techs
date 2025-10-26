mod database;
mod models;
mod schema;
use crate::schema::movies::dsl::*;

use actix_web::{web, App, HttpServer, HttpResponse, Responder};
use actix_cors::Cors;
use diesel::prelude::*;
use database::get_pool;
use models::movie::Movie;
use dotenvy::dotenv;
use std::env;

// 5. Definição das rotas da API
async fn get_movies(pool: web::Data<database::DbPool>) -> impl Responder {
    use crate::schema::movies::dsl::*;
    let conn = pool.get().expect("couldn't get db connection from pool");
    let result = movies.load::<Movie>(&conn);
    match result {
        Ok(items) => HttpResponse::Ok().json(items),
        Err(_) => HttpResponse::InternalServerError().body("Erro ao buscar filmes"),
    }
}

// 6. Inicialização do servidor na porta definida (API_PORT)
#[actix_web::main]
async fn main() -> std::io::Result<()> {
    dotenv().ok();
    let api_port = env::var("API_PORT").unwrap_or_else(|_| "7117".to_string());
    let pool = get_pool();

    HttpServer::new(move || {
        App::new()
            .wrap(Cors::permissive())
            .app_data(web::Data::new(pool.clone()))
            .route("/movies", web::get().to(get_movies))
            // Outras rotas: get por id, post, put, delete podem ser adicionadas aqui
    })
    .bind(format!("0.0.0.0:{}", api_port))?
    .run()
    .await
}
