# REPOSAF: Repositório de Infoprodutos

## Visão Geral do Projeto

Este repositório contém o código-fonte da aplicação web "Reposaf", desenvolvida em PHP utilizando o framework Laravel. O principal objetivo do Reposaf é funcionar como uma plataforma abrangente para a gestão de infoprodutos, permitindo que autores cadastrem, publiquem e disponibilizem seus produtos digitais para download, além de facilitar o acesso dos usuários a esses conteúdos.

## Funcionalidades Principais

A aplicação "Reposaf" oferece as seguintes funcionalidades essenciais:

*   **Cadastro de Autores:** Permite que criadores de conteúdo se registrem na plataforma, estabelecendo sua identidade como autores de infoprodutos.
*   **Registro de Infoprodutos:** Autores podem registrar seus infoprodutos, fornecendo detalhes como título, descrição, categoria e arquivos associados.
*   **Publicação de Infoprodutos:** Após o registro, os infoprodutos podem ser publicados, tornando-os visíveis e acessíveis para a comunidade de usuários.
*   **Download de Infoprodutos:** Usuários autorizados podem realizar o download dos infoprodutos disponíveis na plataforma.

## Tecnologias Utilizadas

O projeto "Reposaf" é construído com as seguintes tecnologias:

*   **Backend:**
    *   PHP (versão 8.2.12 ou superior)
    *   Laravel Framework (versão 11.x ou superior)
    *   MySQL Client Database (para gerenciamento do banco de dados `reposafbd`)
*   **Frontend:**
    *   HTML
    *   CSS
    *   JavaScript
    *   Bootstrap (para design responsivo e componentes de UI)
    *   Blade (motor de template do Laravel)
*   **Gerenciamento de Dependências:**
    *   Composer (para dependências PHP)
    *   npm/Yarn (para dependências JavaScript/CSS)

## Estrutura do Projeto

A estrutura do projeto segue as convenções do Laravel, com diretórios bem definidos para cada componente da aplicação:

```
Reposaf/
├── app/                    # Contém o código-fonte principal da aplicação (modelos, controladores, etc.)
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   ├── Models/
│   ├── Providers/
│   └── View/
├── bootstrap/              # Arquivos de inicialização do framework
├── config/                 # Arquivos de configuração da aplicação
├── database/               # Migrações, seeders e factories do banco de dados
├── public/                 # Ponto de entrada da aplicação (arquivos públicos como CSS, JS, imagens)
├── resources/              # Views (templates Blade), assets (SCSS, JS) e arquivos de linguagem
├── routes/                 # Definições de rotas da aplicação (web, api, console, channels)
│   ├── api.php
│   ├── auth.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── storage/                # Arquivos gerados pelo framework (logs, cache, uploads)
├── tests/                  # Testes automatizados da aplicação
├── .editorconfig           # Configurações do editor de código
├── .env.example            # Exemplo de arquivo de variáveis de ambiente
├── .gitattributes          # Atributos Git
├── .gitignore              # Arquivos e diretórios a serem ignorados pelo Git
├── README.md               # Este arquivo README
├── artisan                 # Script de linha de comando do Laravel
├── composer.json           # Dependências do Composer
├── composer.lock           # Lock file do Composer
├── package.json            # Dependências do Node.js (npm/Yarn)
├── package-lock.json       # Lock file do Node.js
├── phpunit.xml             # Configurações do PHPUnit
├── postcss.config.js       # Configurações do PostCSS
├── tailwind.config.js      # Configurações do Tailwind CSS
└── vite.config.js          # Configurações do Vite
```

## Instalação e Execução

Para configurar e executar o projeto localmente, siga os passos abaixo:

### Pré-requisitos

Certifique-se de ter o PHP (versão 8.2.12 ou superior), Composer e um servidor MySQL (ou compatível) instalados em sua máquina.

### Passos de Instalação

1.  **Clone o Repositório:**

    ```bash
    git clone https://github.com/bartumu/Reposaf.git
    cd Reposaf
    ```

2.  **Instale as Dependências PHP:**

    ```bash
    composer install
    ```

3.  **Crie o Banco de Dados:**

    Execute seu servidor MySQL e crie um novo esquema (banco de dados) com o nome `reposafbd`.

4.  **Configuração do Ambiente:**

    Copie o arquivo de exemplo de variáveis de ambiente e configure-o:

    ```bash
    cp .env.example .env
    ```

    Abra o arquivo `.env` e defina as informações do seu servidor de banco de dados. Certifique-se de que a linha `DB_DATABASE` esteja configurada para `reposafbd`.

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=reposafbd
    DB_USERNAME=your_mysql_user
    DB_PASSWORD=your_mysql_password
    ```

    Gere a chave da aplicação:

    ```bash
    php artisan key:generate
    ```

5.  **Carregue o Banco de Dados:**

    Execute as migrações e os seeders para popular o banco de dados:

    ```bash
    php artisan migrate --seed
    ```

### Execução do Servidor

Após a instalação, execute o servidor de desenvolvimento do Laravel:

```bash
php artisan serve
```

O servidor estará acessível em `http://127.0.0.1:8000/`.

## Acessando a Aplicação

*   **Dashboard de Autores:**
    Após executar o projeto, crie seu usuário para acessar o Dashboard de autores e adicionar obras. As rotas de autenticação e registro são gerenciadas pelo Laravel.

## Contribuição

Contribuições são bem-vindas! Para contribuir com o projeto, por favor, siga os seguintes passos:

1.  Faça um fork do repositório.
2.  Crie uma nova branch para sua feature (`git checkout -b feature/sua-feature`).
3.  Faça suas alterações e commit-as (`git commit -am 'Adiciona nova feature'`).
4.  Envie para a branch (`git push origin feature/sua-feature`).
5.  Abra um Pull Request.

## Licença

Este projeto está licenciado sob a [Licença MIT](https://opensource.org/licenses/MIT) - veja o arquivo `LICENSE` para detalhes.

## Autores

*   **bartumu** - *Desenvolvedor Principal* - [Perfil GitHub](https://github.com/bartumu)
