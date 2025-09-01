# Mockup Image Search

This is a Laravel application that allows you to search for mockup images.

## Setup

1. Clone the repository:
   ```
   git clone https://github.com/gemini/mockup-search-laravel.git
   ```
2. Install dependencies:
   ```
   composer install
   npm install
   ```
3. Create a copy of the `.env.example` file and name it `.env`:
   ```
   cp .env.example .env
   ```
4. Generate an application key:
   ```
   php artisan key:generate
   ```
5. Create a database file:
   ```
   touch database/database.sqlite
   ```
6. Run the database migrations:
   ```
   php artisan migrate
   ```
7. Start the development server:
   ```
   php artisan serve
   ```

## Usage

1. Open your browser and navigate to `http://127.0.0.1:8000`.
2. Use the search bar to search for mockup images.