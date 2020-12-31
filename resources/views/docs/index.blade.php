@extends('layouts.docs')

@section('side_bar')

	<div class="side_bar">

        <p class="hdln-3">General</p>

        <ul class="no_bullet">
            <li>
                <a href="#section-overview">Overview</a>
            </li>
            <li>
                <a href="#section-project-setup">Project Setup</a>
            </li>
            <li>
                <a href="#section-user-roles">User Roles</a>
            </li>
        </ul>

        <p class="hdln-3">Technical Details</p>

        <ul class="no_bullet">
            <li>
                <a href="#section-file-uploads">File Uploads</a>
            </li>
            <li>
                <a href="#section-database">Database</a>
            </li>
            <li>
                <a href="#section-guides">Guides</a>
            </li>
            <!-- <li>
                <a href="#section-email-sending">Email Sending</a>
            </li> -->
        </ul>

        <p class="hdln-3">Testing</p>

        <ul class="no_bullet">
            <li>
                <a href="#section-unit-tests">Unit tests</a>
            </li>
            <li>
                <a href="#section-email-tests">Email testing</a>
            </li>
        </ul>

    </div>

@endsection

@section('content')

<div class="row d-flex justify-content-center mb-4">
    <div class="col-sm-9 col-lg-8">

        <h1 class="pt-4 pb-5" style="font-size: 36px;">MoonFly API Documentation</h1>

        <div class="section mb-4" id="section-overview">

            <p class="hdln-1">Overview</p>
            <p>
                This is a refernce guide for the MoonFly API. This project is intened to be used as a starting point to create a full API.
            </p>
            <p>
                All basic features are setup such as authorization, forgot password resetting and verification etc. 
            </p>
            <p>
                This should make starting a Laravel API much faster.
            </p>
            <p>
                This documentation explains this basic functionality, but this documentation should be extended if used to create a full API. All API routes should be documented on the API referecne page.
            </p>
            <p>
                The API reference is broken down by app features that should correlate with the user stories.
            </p>
            <p>
                The API returns everything in json format.
            </p>

        </div>

        <div class="section mb-2 mt-4" id="section-project-setup">

            <p class="hdln-2">Project Setup</p>

            <p>
                To get started complete the following steps...
            </p>

            <ol>
                <li>Clone moonfly from <a href="https://github.com/mikeyeah29/moonfly-api">github</a></li>
                <li>run <code>composer install</code></li>
                <li>run <code>cp .env.example .env</code></li>
                <li>
                    <p>
                        Edit .env file with correct database details, If working locally the settings below should be applied.
                    </p>
                    <p>
                        DB_CONNECTION=mysql</br>
                        DB_HOST=localhost</br>
                        DB_PORT=3306</br>
                    </p>
                    <p>
                        might also need
                    </p>
                    <p>
                        DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock
                    </p>
                    <p>
                        Enter mail trap settings or real email server settings
                    </p>
                </li>
                <li>
                    run <code>php artisan key:generate</code>
                </li>
                <li>
                    run <code>php artisan migrate</code>
                </li>
                <li>
                    run <code>php artisan passport:install</code>
                </li>
                <li>
                    run <code>php artisan test (optional)</code>
                </li>
                <li>
                    <p>Create a super admin account (there is only one super admin user)</p>
                    <p>run <code>php artisan user:create</code></p>
                    <p>Select Super Admin</p>
                </li>
            </ol>

        </div>

        <div class="section mb-2 mt-4" id="section-user-roles">
            
            <p class="hdln-2">User Roles</p>

            <p>
                There are currently 5 user roles. 
            </p>

            <ol>
                <li>Subscriber</li>
                <li>Editor</li>
                <li>Developer</li>
                <li>Admin</li>
                <li>Super Admin</li>
            </ol>

            <p>
                Routes can be restricted by adding the middleware 'check_user_role:' . UserRole::ROLE_ADMIN in the routes file or controller.
            </p>
            <p>
                Role names and role hierarchy can be seen in app\lib\roles\UserRole
            </p>

        </div>

        <div class="section mb-2 mt-4" id="section-file-uploads">
            
            <p class="hdln-2">File Uploads</p>

            <p>
                Uploaded files get saved in storage/app/public/users/{ user email }.
            </p>

        </div>

        <div class="section mb-2" id="section-database">

            <p class="hdln-1">Database</p>

            <p>
                Uses a mysql database - schema is designed at https://dbdiagram.io. The schema mark up is at the link below. It can be copy and pasted into https://dbdiagram.io to see the design visualy.
            </p>

            <a href="docs/schema">Schema markup</a>

        </div>

        <div class="section mb-2 mt-4" id="section-guides">
            
            <p class="hdln-2">Guides</p>

            <p>
                This is a list of tutorials, videos etc that I followed or plan to follow to achevie a certain thing
            </p>

            <ul class="no_bullet">
                <li>
                    <a class="link" href="https://www.youtube.com/watch?v=VElnT8EoEEM">
                        Image preview before upload
                    </a>
                </li>
                <li>
                    <a class="link" href="https://medium.com/@tomgrohl/implementing-user-roles-into-a-laravel-application-f8b9b5c266a7">
                        User roles
                    </a>
                </li>
            </ul>

        </div>

        <!-- <div class="section mb-2 mt-4" id="section-email-sending">
            <p class="hdln-2">Email Sending</p>
        </div> -->

        <div class="section mb-2 mt-4" id="section-unit-tests">
            <p class="hdln-2">Unit Tests</p>
            <p>
                Unit tests are in the /tests folder. To run the tests run <code>php artisan test</code>
            </p>
        </div>

        <div class="section mb-2 mt-4" id="section-email-tests">
            <p class="hdln-2">Email Testing</p>
            <p>
                Email sending can be tested using https://mailtrap.io/signin. 
                Credentials need to be entered in the env file
            </p>
            <p>
                MAIL_MAILER=smtp</br>
                MAIL_HOST=smtp.mailtrap.io</br>
                MAIL_PORT=2525</br>
                MAIL_USERNAME=123</br>
                MAIL_PASSWORD=123</br>
                MAIL_ENCRYPTION=tls</br>
                MAIL_FROM_ADDRESS=mail@moonfly.com</br>
                MAIL_FROM_NAME="${APP_NAME}"
            </p>
        </div>

    </div>
</div>

@endsection