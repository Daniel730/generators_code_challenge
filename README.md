## The task

Pretende-se que seja implementada uma aplicação web, minimalista, para gestão de
geradores elétricos a gasóleo. A aplicação não precisa:
• de autenticação
• de validação de todos os campos requeridos, exceto os definidos nos próximos
pontos
• ter uma apresentação espetacular, mas deverá ser minimamente bem formatada
Os geradores elétricos são identificados unicamente por um código interno com a
seguinte nomenclatura:
• RYYYYMMNNNN
Em que YYYY é o ano de entrada no parque, MM o mês de entrada no parque, e NNN um
número sequencial.
Outros dados obrigatórios dos geradores, que são inseridos manualmente pelo utilizador,
são:
• Marca
• Modelo
Podem existir outros campos não obrigatórios, mas que são opcionais para esta primeira
versão da aplicação, e são opcionais para o desafio, podendo o desafiado optar por
adicionar mais campos. O desafiado, pode criar os campos que considere necessários para
implementar as funcionalidades pretendidas.
Um gerador elétrico também tem de estar num dos estados, apresentados de seguida:
• Novo; Em Stock; Avariado; Alugado; Abatido.

## Setting Everything Up

-   If you haven't already, you will need to install [Docker Desktop](https://www.docker.com/products/docker-desktop).
-   Once that is installed your next step is to install this projects composer dependencies (including Sail).
    -   This will require either PHP 8 installed on your local machine or the use of [a small docker container](https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects) that runs PHP 8 that can install the dependencies for us.
-   If you haven't done so already copy the `.env.example` file to `.env`
    -   If you are running a local development environment you may need to change some default ports in the `.env` file
-   It should now be time to [start Sail](https://laravel.com/docs/8.x/sail#starting-and-stopping-sail) and the task

### Installing Composer Dependencies

https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects

```bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```

After that, you're all set up to start sail

```bash
./vendor/bin/sail up -d
```

### Seeding and migrating

```bash
docker-compose exec php bash
```

Before seeding and migrating the database, the project needs an APP KEY for laravel to run.
To generate that, inside the php container bash (Command above) do the following.

```bash
php artisan key:generate
```

After that, you can migrate and seed the database.

```bash
php artisan migrate
```

```bash
php artisan db:seed --class=StateTableSeeder
```
