# Shorter Laravel Application

This repository contains a Laravel application for shortening URLs.

## Getting Started

Follow these steps to set up and run the application on your local machine.

### Clone the Repository

Clone this Git repository to your desired directory:

```bash
git clone https://github.com/leksgit/shorter.git
```

Navigate to the project directory:

```bash
cd shorter
```

### Start Docker Container
Start the Docker containers defined in the docker-compose.yml file:

```bash
docker-compose up -d
```

### Connect to Console in Container
To connect to the console within the php-fpm container, use the following command:

```bash
docker-compose exec php-fpm bash
```

### Install Dependencies and Build Frontend
Inside the container's console, run the following commands to install the required dependencies and build the frontend assets:

```bash
composer install && npm install && npm run build
```

### Run Database Migrations
While still in the container's console, run the following command to apply the database migrations:

```bash
php artisan migrate
```

### Update Hosts File
Add the following line to your hosts file (/etc/hosts on Linux or C:\Windows\System32\drivers\etc\hosts on Windows) to map the hostname short.loc to your local machine:

```bash
127.0.0.1 short.loc
```

### Access the Application
Open your web browser and navigate to the following link to access the Shorter application:

http://short.loc/addShort