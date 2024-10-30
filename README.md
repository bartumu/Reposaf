# REPOSAF

Aplicação Web "Resposaf" usando PHP "Laravel Framework"
## Sobre a aplicação web:

Aplicação Web "Reposaf" que permite:

- Cadastro de Autores
- Registro de Infoprodutos
- Publicação de Infoprodutos
- Download de Infoprodutos


## Construído com:

- [PHP](Version 8.2.12)
- [Laravel Framwork](https://laravel.com/docs/11.x)
- [MySqlClient Database](https://pypi.org/project/mysqlclient/)
- [HTML, CSS, JS, Bootstrap....](https://www.w3.org/)

## Instalação e execução do projecto:

1- Baixe ou clone o projecto


2- Instale as Dependencias

  ```bash
  composer install
  ```

3- Execute o seu servidor mysql e crie um novo esquema em seu SGBD com o nome "reposafbd"

4- Abra o projecto no VS Code

5- Abre o Arquivo .env e defina as informações do seu servidor de base de dados [nome do host e senha]
DB_DATABASE="reposafbd"

6- Em uma janela do Terminal execute o seguinte >>

- [Execute o seguinte para carregar o banco de Dados]

```bash
  php artisan migrate --seed
```

- [Executar o projecto]

```bash
  php artisan serve
```
\*\* pegue o link (http://127.0.0.1:8000/) e coloque no seu navegador

7- Crie o seu usuário para acessar o [A Dashboard] dos autores e adicionar obras

