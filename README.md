
# Medi@Tek Chapelle-Curreaux

## Run Locally

Clone the project

```bash
  git clone https://link-to-project
```

Go to the project directory

```bash
  cd my-project
```

Modify the .env and replace the line below with your access to the database

DATABASE_URL="mysql://root:@127.0.0.1:3306/mediatheque2"

Install composer :To install the different packages necessary for the functioning of the application

```bash
  composer install
```

Start the server

```bash
  symfony serve
```

  
## Deployment heroku

To deploy this project run

Connexion to Heroku

```bash
  heroku login
```

Création de l'application heroku

```bash
  heroku create nameProjet
```

Procfile create

```php
    web: heroku-php-apache2 public/
```

Add .htaccess

```bash
  composer require apache-pack
```

Configuring Symfony to run in the pros environment

```bash
 heroku config:set APP_ENV=prod
```

Push Github

```bash
 git add .
```
```bash
 git commit -m'text'
```
```bash
 git push origin main
```

Link with Database Heroku 

    Add : add-on JAWS

    Configuring environment variable in Setting Heroku

    DATABA_URL = copy value to JAWS Database

Create sql file

```bash
mysqldump -u root -p mediathequechapellecurreaux > bdd.sql
```

Push sql file sur JAWS

```bash
mysql -h NEWHOST -u NEWUSER -p NEWPASS NEWDATABAS < backup.sql
```

Migrations

```bash
heroku run php bin/console doctrine:migrations:migrate
```

Deployed Heroku

```bash
heroku run bash
```







  