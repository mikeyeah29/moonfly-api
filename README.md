# Overview

This is a refernce guide for the MoonFly API. This project is intened to be used as a starting point to create a full API.

All basic features are setup such as authorization, forgot password resetting and verification etc.

This should make starting a Laravel API much faster.

This documentation explains this basic functionality, but this documentation should be extended if used to create a full API. All API routes should be documented on the API referecne page.

The API reference is broken down by app features that should correlate with the user stories.

The API returns everything in json format.

# Project Setup

To get started complete the following steps...

- Clone moonfly
- run composer install
- run cp .env.example .env
- Edit .env file with correct database details, If working locally the settings below should be applied.

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
might also need

DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock

- Enter mail trap settings or real email server settings

- run php artisan key:generate
- run php artisan migrate
- run php artisan passport:install
- run php artisan test (optional)
- Create a super admin account (there is only one super admin user)

- run php artisan user:create

Select Super Admin