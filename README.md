# Cat App Api

## Installation steps

-   Run `composer install` to install all the dependencies
-   Change name or copy `.env.example` file to `.env` file
-   Create an database with the name define in `DB_DATABASE` on `.env` file (you can change that name if you want to)
-   Run `php artisan migrate` to create the database tables
-   Run `php artisan serve` to serve the api server

## Endpoints

### Cats

-   **[Create a cat]** POST /api/cat
-   **[List all cats]** GET /api/cat
-   **[Find a cat by ID]** GET /api/cat?id=
-   **[Update a cat]** PUT /api/cat
-   **[Delete a cat]** DELETE /api/cat

### Breeds

-   **[Create a breed]** POST /api/breed
-   **[List all breeds]** GET /api/breed
-   **[Find breeds by name]** GET /api/breed?q=
-   **[Delete a breed]** DELETE /api/breed
