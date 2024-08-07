## LiberFly test

# Instalação
Clone o repositório localmente e utilize o comando abaixo para instalar as dependencias:
```
composer update
```

# Configuração do banco

Altere o arquivo .env (copie o .env.example como template) para configurar o banco de dados:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=teste-liberfly
DB_USERNAME=root
DB_PASSWORD=
```

Crie um banco local com o nome **teste-liberfly**, preferencialmente usando o charset "utf8mb4" e collate "utf8mb4_unicode_ci" (em minha maquina Windows 11, utilizei o programa XAMPP para hospedar o banco), segue o comando para criação do banco:
```
CREATE SCHEMA `teste-liberfly` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
```

# Configuração dos plugins

Após configurar o banco, utilize os comandos abaixo para configurar o plugin JWT:
```
php artisan vendor:publish --provider="PHPOpenSourceSaver\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
php artisan l5-swagger:generate
```

O primeiro comando irá criar o arquivo de configuração JWT em /config/jwt.php, o segundo irá definir um novo secret para ser usado no projeto e o terceiro irá re-criar o swagger da documentação.

# Populando o banco

Depois de configurar o banco, utilize o comando abaixo para gerar as tabelas no banco e criar alguns registros.
```
php artisan migrate --seed
```

# Iniciando um servidor local

Após ter configurado todo o projeto, você pode iniciar um servidor local para testes usando o comando abaixo
```
php artisan serve
```

# Swagger
Para uma documentação completa dos endpoints, consulte o Swagger do projeto acessando via navegador a pagina http://localhost:8000/api/documentation

## Resumo dos endpoints

Quando o servidor local estiver aberto, as requisições podem ser feitas nos endpoints abaixo:

### Endpoints de autenticação
POST /api/login -- Faz o login na aplicação e retorna o token a ser usado

POST /api/logout -- Faz logout e quebra o token antigo

POST /api/refresh -- Atualiza o token atual

### Endpoints de dados
GET /dummies -- Retorna todos os registros da tabela

GET /dummies/{id} -- Retorna o registro da tabela com o ID informado

# Testes

Para garantir que o projeto esta corretamente configurado, utilize o comando abaixo:
```
php artisan test
```
