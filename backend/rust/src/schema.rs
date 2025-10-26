// Este arquivo é gerado pelo comando diesel_cli: diesel setup && diesel migration generate
// Exemplo para tabela movies

table! {
    movies (id) {
        id -> Integer,
        name -> Nullable<Varchar>,
        overview -> Nullable<Varchar>,
        posterurl -> Nullable<Varchar>,
        genres -> Nullable<Varchar>,
    }
}
