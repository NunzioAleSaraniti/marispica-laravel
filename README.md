# Marispica — Full-Stack Web Application

Web application sviluppata con **Laravel** come progetto universitario di Ingegneria Informatica.

Il progetto realizza una piattaforma web per la gestione e la fruizione dei servizi di un villaggio turistico, integrando **backend, frontend, database, autenticazione e API esterne**.

> University Project / Portfolio Project  
> Tutti i dati presenti nell'applicazione sono fittizi.

## Funzionalità

- 🔐 Registrazione, login, logout e gestione del profilo
- 🔑 Recupero e reset della password
- 👤 Gestione utenti e ruoli
- 📅 Gestione delle prenotazioni
- 🎫 Gestione degli eventi
- ❤️ Sistema di like
- 💬 Sistema di feedback
- 🖼️ Gestione delle immagini
- 🤖 Chatbot tramite OpenAI API
- 🌤️ Integrazione con Weatherstack API
- 🎟️ Integrazione con Ticketmaster API
- ⚡ Comunicazione asincrona tramite JavaScript Fetch API
- ✅ Validazione dei dati
- 🗄️ Gestione del database tramite Laravel Eloquent e migrations

## Tech Stack

### Backend

- PHP 8.2+
- Laravel 12
- Laravel UI
- Eloquent ORM
- Doctrine DBAL

### Frontend

- Blade
- JavaScript
- Fetch API
- Axios
- Bootstrap 5
- Tailwind CSS
- Sass / SCSS
- Vite

### Database & Tools

- MySQL
- Laravel Migrations
- Composer
- NPM
- Git / GitHub
- PHPUnit

## Architettura

Il progetto segue il pattern **MVC (Model-View-Controller)** di Laravel.

```text
app/
├── Http/
│   └── Controllers/
├── Models/
└── ...

database/
├── migrations/
└── seeders/

public/
├── css/
├── js/
└── images/

resources/
├── js/
├── sass/
└── views/

routes/
├── api.php
└── web.php
```

Le integrazioni con servizi esterni vengono gestite tramite il backend Laravel, mantenendo le API key fuori dal codice pubblico e configurandole tramite variabili d'ambiente.

## Installazione

### Requisiti

- PHP >= 8.2
- Composer
- Node.js / NPM
- MySQL

### Setup

```bash
git clone https://github.com/NunzioAleSaraniti/marispica-laravel.git
cd marispica-laravel

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Configura nel file `.env` la connessione al database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_database
DB_USERNAME=utente
DB_PASSWORD=password
```

Aggiungi inoltre le API key necessarie:

```env
OPENAI_API_KEY=
WEATHERSTACK_API_KEY=
TICKETMASTER_API_KEY=
```

Esegui le migrations:

```bash
php artisan migrate
```

Avvia l'applicazione:

```bash
php artisan serve
```

In un secondo terminale:

```bash
npm run dev
```

## API interne

Backend endpoints:

```text
POST /api/chat
GET  /api/weather
GET  /api/events
```

Le richieste dal frontend vengono gestite tramite JavaScript e inoltrate al backend Laravel.

## Contesto

Progetto realizzato nell'ambito del percorso universitario in **Ingegneria Informatica**, con particolare attenzione allo sviluppo web full-stack, alla gestione del database, all'autenticazione degli utenti e all'integrazione di servizi REST esterni.

## Note

Il progetto ha finalità **didattiche e di portfolio**.

Tutti i dati presenti nell'applicazione sono fittizi.