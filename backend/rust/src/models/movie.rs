use serde::{Serialize, Deserialize};
use diesel::prelude::*;

#[derive(Queryable, Serialize, Deserialize)]
pub struct Movie {
    pub id: i32,
    pub name: Option<String>,
    pub overview: Option<String>,
    pub posterurl: Option<String>,
    pub genres: Option<String>,
}
