 **About your Task Management System project**

```markdown
# Task Management System

The Task Management System is a web application built using the Laravel framework that allows users to manage tasks and synchronize them with an external API.

## Table of Contents

- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Usage](#usage)
- [Key Decisions](#key-decisions)
- [Contributing](#contributing)
- [License](#license)

## Features

- Create, view, update, and delete tasks.
- Synchronize tasks with an external API.
- Custom pagination with limited page links.
- Form validation for proper input.
- Error handling for API integration and database operations.
- Scheduled task to synchronize tasks every 5 minutes.

## Prerequisites

- PHP 7.4 or higher
- Composer
- MySQL or compatible database
- Web server (e.g., Apache, Nginx)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/fakhar176/task-management.git
   cd task-management
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Create a `.env` file:
    - Duplicate `.env.example` and rename it to `.env`.
    - Set up database connection details.
    - Generate `APP_KEY`:
      ```bash
      php artisan key:generate
      ```

4. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

5. Configure the scheduler:
    - Add the cron entry to your system's cron tab:
      ```
      * * * * * cd /path/to/your/project && php artisan schedule:run >> /dev/null 2>&1
      ```

6. Configure virtual host (if applicable):
    - Set up a virtual host configuration pointing to the `public` directory.

7. Access the application:
    - Open a web browser and navigate to the configured URL.

## Usage

- Create, view, update, and delete tasks from the user interface.
- Tasks are synchronized with the external API every 5 minutes.
- Use custom pagination for easy navigation between tasks.

## Key Decisions

1. **API Integration:**
    - Integration with an external API to synchronize tasks.
    - Local tasks reference the API tasks using `api_id`.

2. **Database Design:**
    - Database table `tasks` with columns: `id`, `title`, `description`, `status`, `api_id`.

3. **Custom Pagination:**
    - Implemented custom pagination to show a limited number of pagination links.

4. **Error Handling:**
    - Form validation ensures proper input for task creation and editing.
    - Graceful error handling for API integration and database operations.

5. **Scheduled Task:**
    - Scheduled task to synchronize tasks every 5 minutes.

## Contributing

Contributions are welcome! Fork the repository, make your changes, and submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
```

