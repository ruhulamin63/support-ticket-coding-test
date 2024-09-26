## Create a Simple Support Ticket System using Laravel
You are tasked with building a simple support ticket system application using Laravel. The application should allow users to create support tickets and view their own tickets. The application should also allow administrators to view all tickets and update the status of the tickets.

Laravel v10.48.22 (PHP v8.2.22)

```bash
git clone https://github.com/ruhulamin63/support-ticket-coding-test.git
```

```bash
cp .env.example .env
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

```bash
composer update
```


```bash
php artisan migrate
```

```bash
php artisan make:seeder UserSeeder
```

### Customer can send issue to support
```bash
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
```

```bash
npm install && npm run dev
```

### Public Access Route
```bash
http://127.0.0.1:8000
```

#### ======== Enjoy coding ============

*** Copyright@reserved by Ruhul Amin ***
