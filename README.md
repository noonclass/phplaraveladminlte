## Make App

C:\xampp\htdocs>laravel new phpadminlte
Crafting application...
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
Package operations: 59 installs, 0 updates, 0 removals
  - Installing doctrine/inflector (v1.1.0): Loading from cache
  - Installing erusev/parsedown (1.6.2): Loading from cache
  - Installing jakub-onderka/php-console-color (0.1): Loading from cache
  - Installing symfony/polyfill-mbstring (v1.3.0): Loading from cache
  - Installing symfony/var-dumper (v3.2.7): Loading from cache
  - Installing psr/log (1.0.2): Loading from cache
  - Installing symfony/debug (v3.2.7): Loading from cache
  - Installing symfony/console (v3.2.7): Loading from cache
  - Installing nikic/php-parser (v3.0.5): Loading from cache
  - Installing jakub-onderka/php-console-highlighter (v0.3.2): Loading from cache
  - Installing dnoegel/php-xdg-base-dir (0.1): Loading from cache
  - Installing psy/psysh (v0.8.3): Loading from cache
  - Installing vlucas/phpdotenv (v2.4.0): Loading from cache
  - Installing symfony/css-selector (v3.2.7): Loading from cache
  - Installing tijsverkoyen/css-to-inline-styles (2.2.0): Loading from cache
  - Installing symfony/routing (v3.2.7): Loading from cache
  - Installing symfony/process (v3.2.7): Loading from cache
  - Installing symfony/http-foundation (v3.2.7): Loading from cache
  - Installing symfony/event-dispatcher (v3.2.7): Loading from cache
  - Installing symfony/http-kernel (v3.2.7): Loading from cache
  - Installing symfony/finder (v3.2.7): Loading from cache
  - Installing swiftmailer/swiftmailer (v5.4.6): Loading from cache
  - Installing paragonie/random_compat (v2.0.10): Loading from cache
  - Installing ramsey/uuid (3.6.1): Loading from cache
  - Installing symfony/translation (v3.2.7): Loading from cache
  - Installing nesbot/carbon (1.22.1): Loading from cache
  - Installing mtdowling/cron-expression (v1.2.0): Loading from cache
  - Installing monolog/monolog (1.22.1): Loading from cache
  - Installing league/flysystem (1.0.37): Loading from cache
  - Installing laravel/framework (v5.4.17): Loading from cache
  - Installing laravel/tinker (v1.0.0): Loading from cache
  - Installing fzaninotto/faker (v1.6.0): Loading from cache
  - Installing hamcrest/hamcrest-php (v1.2.2): Loading from cache
  - Installing mockery/mockery (0.9.9): Loading from cache
  - Installing webmozart/assert (1.2.0): Loading from cache
  - Installing phpdocumentor/reflection-common (1.0): Loading from cache
  - Installing phpdocumentor/type-resolver (0.2.1): Loading from cache
  - Installing phpdocumentor/reflection-docblock (3.1.1): Loading from cache
  - Installing phpunit/php-token-stream (1.4.11): Loading from cache
  - Installing symfony/yaml (v3.2.7): Loading from cache
  - Installing sebastian/version (2.0.1): Loading from cache
  - Installing sebastian/resource-operations (1.0.0): Loading from cache
  - Installing sebastian/recursion-context (2.0.0): Loading from cache
  - Installing sebastian/object-enumerator (2.0.1): Loading from cache
  - Installing sebastian/global-state (1.1.1): Loading from cache
  - Installing sebastian/exporter (2.0.0): Loading from cache
  - Installing sebastian/environment (2.0.0): Loading from cache
  - Installing sebastian/diff (1.4.1): Loading from cache
  - Installing sebastian/comparator (1.2.4): Loading from cache
  - Installing phpunit/php-text-template (1.2.1): Loading from cache
  - Installing doctrine/instantiator (1.0.5): Loading from cache
  - Installing phpunit/phpunit-mock-objects (3.4.3): Loading from cache
  - Installing phpunit/php-timer (1.0.9): Loading from cache
  - Installing phpunit/php-file-iterator (1.4.2): Loading from cache
  - Installing sebastian/code-unit-reverse-lookup (1.0.1): Loading from cache
  - Installing phpunit/php-code-coverage (4.0.8): Loading from cache
  - Installing phpspec/prophecy (v1.7.0): Loading from cache
  - Installing myclabs/deep-copy (1.6.0): Loading from cache
  - Installing phpunit/phpunit (5.7.19): Loading from cache
symfony/var-dumper suggests installing ext-symfony_debug ()
symfony/console suggests installing symfony/filesystem ()
psy/psysh suggests installing ext-pcntl (Enabling the PCNTL extension makes PsySH a lot happier :))
psy/psysh suggests installing ext-pdo-sqlite (The doc command requires SQLite to work.)
psy/psysh suggests installing ext-posix (If you have PCNTL, you'll want the POSIX extension as well.)
psy/psysh suggests installing ext-readline (Enables support for arrow-key history navigation, and showing and manipulating command history.)
psy/psysh suggests installing hoa/console (A pure PHP readline implementation. You'll want this if your PHP install doesn't already support readline or libedit.)
symfony/routing suggests installing doctrine/annotations (For using the annotation loader)
symfony/routing suggests installing symfony/config (For using the all-in-one router or any loader)
symfony/routing suggests installing symfony/dependency-injection (For loading routes from a service)
symfony/routing suggests installing symfony/expression-language (For using expression matching)
symfony/event-dispatcher suggests installing symfony/dependency-injection ()
symfony/http-kernel suggests installing symfony/browser-kit ()
symfony/http-kernel suggests installing symfony/class-loader ()
symfony/http-kernel suggests installing symfony/config ()
symfony/http-kernel suggests installing symfony/dependency-injection ()
paragonie/random_compat suggests installing ext-libsodium (Provides a modern crypto API that can be used to generate random bytes.)
ramsey/uuid suggests installing ext-libsodium (Provides the PECL libsodium extension for use with the SodiumRandomGenerator)
ramsey/uuid suggests installing ext-uuid (Provides the PECL UUID extension for use with the PeclUuidTimeGenerator and PeclUuidRandomGenerator)
ramsey/uuid suggests installing ircmaxell/random-lib (Provides RandomLib for use with the RandomLibAdapter)
ramsey/uuid suggests installing moontoast/math (Provides support for converting UUID to 128-bit integer (in string form).)
ramsey/uuid suggests installing ramsey/uuid-console (A console application for generating UUIDs with ramsey/uuid)
ramsey/uuid suggests installing ramsey/uuid-doctrine (Allows the use of Ramsey\Uuid\Uuid as Doctrine field type.)
symfony/translation suggests installing symfony/config ()
monolog/monolog suggests installing aws/aws-sdk-php (Allow sending log messages to AWS services like DynamoDB)
monolog/monolog suggests installing doctrine/couchdb (Allow sending log messages to a CouchDB server)
monolog/monolog suggests installing ext-amqp (Allow sending log messages to an AMQP server (1.0+ required))
monolog/monolog suggests installing ext-mongo (Allow sending log messages to a MongoDB server)
monolog/monolog suggests installing graylog2/gelf-php (Allow sending log messages to a GrayLog2 server)
monolog/monolog suggests installing mongodb/mongodb (Allow sending log messages to a MongoDB server via PHP Driver)
monolog/monolog suggests installing php-amqplib/php-amqplib (Allow sending log messages to an AMQP server using php-amqplib)
monolog/monolog suggests installing php-console/php-console (Allow sending log messages to Google Chrome)
monolog/monolog suggests installing rollbar/rollbar (Allow sending log messages to Rollbar)
monolog/monolog suggests installing ruflin/elastica (Allow sending log messages to an Elastic Search server)
monolog/monolog suggests installing sentry/sentry (Allow sending log messages to a Sentry server)
league/flysystem suggests installing league/flysystem-aws-s3-v2 (Allows you to use S3 storage with AWS SDK v2)
league/flysystem suggests installing league/flysystem-aws-s3-v3 (Allows you to use S3 storage with AWS SDK v3)
league/flysystem suggests installing league/flysystem-azure (Allows you to use Windows Azure Blob storage)
league/flysystem suggests installing league/flysystem-cached-adapter (Flysystem adapter decorator for metadata caching)
league/flysystem suggests installing league/flysystem-copy (Allows you to use Copy.com storage)
league/flysystem suggests installing league/flysystem-dropbox (Allows you to use Dropbox storage)
league/flysystem suggests installing league/flysystem-eventable-filesystem (Allows you to use EventableFilesystem)
league/flysystem suggests installing league/flysystem-rackspace (Allows you to use Rackspace Cloud Files)
league/flysystem suggests installing league/flysystem-sftp (Allows you to use SFTP server storage via phpseclib)
league/flysystem suggests installing league/flysystem-webdav (Allows you to use WebDAV storage)
league/flysystem suggests installing league/flysystem-ziparchive (Allows you to use ZipArchive adapter)
laravel/framework suggests installing aws/aws-sdk-php (Required to use the SQS queue driver and SES mail driver (~3.0).)
laravel/framework suggests installing doctrine/dbal (Required to rename columns and drop SQLite columns (~2.5).)
laravel/framework suggests installing guzzlehttp/guzzle (Required to use the Mailgun and Mandrill mail drivers and the ping methods on schedules (~6.0).)
laravel/framework suggests installing league/flysystem-aws-s3-v3 (Required to use the Flysystem S3 driver (~1.0).)
laravel/framework suggests installing league/flysystem-rackspace (Required to use the Flysystem Rackspace driver (~1.0).)
laravel/framework suggests installing nexmo/client (Required to use the Nexmo transport (~1.0).)
laravel/framework suggests installing pda/pheanstalk (Required to use the beanstalk queue driver (~3.0).)
laravel/framework suggests installing predis/predis (Required to use the redis cache and queue drivers (~1.0).)
laravel/framework suggests installing pusher/pusher-php-server (Required to use the Pusher broadcast driver (~2.0).)
laravel/framework suggests installing symfony/dom-crawler (Required to use most of the crawler integration testing tools (~3.2).)
laravel/framework suggests installing symfony/psr-http-message-bridge (Required to psr7 bridging features (0.2.*).)
sebastian/global-state suggests installing ext-uopz (*)
phpunit/phpunit-mock-objects suggests installing ext-soap (*)
phpunit/php-code-coverage suggests installing ext-xdebug (^2.5.1)
phpunit/phpunit suggests installing ext-xdebug (*)
phpunit/phpunit suggests installing phpunit/php-invoker (~1.1)
Generating optimized autoload files
> php -r "file_exists('.env') || copy('.env.example', '.env');"
> Illuminate\Foundation\ComposerScripts::postInstall
> php artisan optimize
Generating optimized class loader
The compiled services file has been removed.
> php artisan key:generate
Application key [base64:H9ToVbn4D1/0WMrxbh/Qo6wE25U0jA1LegLZ+hSl5rM=] set successfully.
Application ready! Build something amazing.

## Install adminlte-laravel
C:\xampp\htdocs>cd phpadminlte

C:\xampp\htdocs\phpadminlte>adminlte-laravel --no-llum install
Running composer require acacha/admin-lte-template-laravel
Using version ^4.1 for acacha/admin-lte-template-laravel
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 7 installs, 0 updates, 0 removals
  - Installing symfony/dom-crawler (v3.2.7): Loading from cache
  - Installing laravel/browser-kit-testing (v1.0.3): Loading from cache
  - Installing creativeorange/gravatar (1.0.10): Loading from cache
  - Installing acacha/user (0.2.2): Loading from cache
  - Installing acacha/helpers (0.1.3): Loading from cache
  - Installing acacha/filesystem (0.1.1): Loading from cache
  - Installing acacha/admin-lte-template-laravel (4.1.9): Loading from cache
Writing lock file
Generating optimized autoload files
> Illuminate\Foundation\ComposerScripts::postUpdate
> php artisan optimize
Generating optimized class loader
The compiled services file has been removed.
Copying file C:\xampp\php\composer\vendor\acacha\adminlte-laravel-installer\src\Console/stubs/app.php into C:\xampp\htdo
cs\phpadminlte/config/app.php
php artisan adminlte:publish


  [Symfony\Component\Console\Exception\CommandNotFoundException]
  There are no commands defined in the "adminlte-laravel" namespace.


C:\xampp\htdocs\phpadminlte>adminlte-laravel --no-llum install
Running composer require acacha/admin-lte-template-laravel
Using version ^4.1 for acacha/admin-lte-template-laravel
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Nothing to install or update
Generating optimized autoload files
> Illuminate\Foundation\ComposerScripts::postUpdate
> php artisan optimize
Generating optimized class loader
The compiled services file has been removed.
Copying file C:\xampp\php\composer\vendor\acacha\adminlte-laravel-installer\src\Console/stubs/app.php into C:\xampp\htdo
cs\phpadminlte/config/app.php
php artisan adminlte:publish
Copied File [\vendor\acacha\admin-lte-template-laravel\src\stubs\HomeController.stub] To [\app\Http\Controllers\HomeCont
roller.php]

 RegisterController.php already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied File [\vendor\acacha\admin-lte-template-laravel\src\stubs\RegisterController.stub] To [\app\Http\Controllers\Auth
\RegisterController.php]

 LoginController.php already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied File [\vendor\acacha\admin-lte-template-laravel\src\stubs\LoginController.stub] To [\app\Http\Controllers\Auth\Lo
ginController.php]

 ForgotPasswordController.php already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied File [\vendor\acacha\admin-lte-template-laravel\src\stubs\ForgotPasswordController.stub] To [\app\Http\Controller
s\Auth\ForgotPasswordController.php]

 ResetPasswordController.php already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied File [\vendor\acacha\admin-lte-template-laravel\src\stubs\ResetPasswordController.stub] To [\app\Http\Controllers
\Auth\ResetPasswordController.php]
Copied Directory [\vendor\acacha\admin-lte-template-laravel\public\img] To [\public\img]

 css already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied Directory [\vendor\acacha\admin-lte-template-laravel\public\css] To [\public\css]

 js already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied Directory [\vendor\acacha\admin-lte-template-laravel\public\js] To [\public\js]
Copied Directory [\vendor\acacha\admin-lte-template-laravel\public\plugins] To [\public\plugins]
Copied Directory [\vendor\acacha\admin-lte-template-laravel\public\fonts] To [\public\fonts]
Copied File [\vendor\acacha\admin-lte-template-laravel\public\mix-manifest.json] To [\public\mix-manifest.json]
Copied Directory [\vendor\acacha\admin-lte-template-laravel\resources\views\errors] To [\resources\views\errors]

 welcome.blade.php already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied File [\vendor\acacha\admin-lte-template-laravel\resources\views\welcome.blade.php] To [\resources\views\welcome.b
lade.php]
Copied File [\vendor\acacha\admin-lte-template-laravel\resources\views\layouts\partials\sidebar.blade.php] To [\resource
s\views\vendor\adminlte\layouts\partials\sidebar.blade.php]
Copied Directory [\vendor\acacha\admin-lte-template-laravel\resources\assets\css] To [\resources\assets\css]
Copied Directory [\vendor\acacha\admin-lte-template-laravel\resources\assets\img] To [\resources\assets\img]
Copied Directory [\vendor\acacha\admin-lte-template-laravel\resources\assets\less] To [\resources\assets\less]

 sass already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied Directory [\vendor\acacha\admin-lte-template-laravel\resources\assets\sass] To [\resources\assets\sass]

 js already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied Directory [\vendor\acacha\admin-lte-template-laravel\resources\assets\js] To [\resources\assets\js]

 webpack.mix.js already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied File [\vendor\acacha\admin-lte-template-laravel\webpack.mix.js] To [\webpack.mix.js]

 package.json already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied File [\vendor\acacha\admin-lte-template-laravel\package.json] To [\package.json]

 tests already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied Directory [\vendor\acacha\admin-lte-template-laravel\tests] To [\tests]

 phpunit.xml already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied File [\vendor\acacha\admin-lte-template-laravel\phpunit.xml] To [\phpunit.xml]
Copied Directory [\vendor\acacha\admin-lte-template-laravel\resources\lang] To [\resources\lang\vendor\adminlte_lang]
Copied File [\vendor\creativeorange\gravatar\config\gravatar.php] To [\config\gravatar.php]
Copied File [\vendor\acacha\admin-lte-template-laravel\config\adminlte.php] To [\config\adminlte.php]

 web.php already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied File [\vendor\acacha\admin-lte-template-laravel\routes\web.php] To [\routes\web.php]

 api.php already exists. Do you want to overwrite it? [y|N] (yes/no) [no]:
 > y

Copied File [\vendor\acacha\admin-lte-template-laravel\routes\api.php] To [\routes\api.php]

## Init DB
Once package installed you have to follow the usual steps of any laravel project to Login to the admin interface:

Create a database. I recommend the use of laravel homestead ()
Create/check .env file and configure database acces (database name, password, etc)
Run migrations with command $ php artisan migrate
Register a first user and Login with it

## Install Roles
C:\xampp\htdocs\phpadminlte>composer require ultraware/roles
Using version ^5.4 for ultraware/roles
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing ultraware/roles (5.4.0): Downloading (100%)
Writing lock file
Generating optimized autoload files
> Illuminate\Foundation\ComposerScripts::postUpdate
> php artisan optimize
Generating optimized class loader
The compiled services file has been removed.

Add the package to your application service providers in config/app.php file.
Ultraware\Roles\RolesServiceProvider::class,

C:\xampp\htdocs\phpadminlte>php artisan vendor:publish --provider="Ultraware\Roles\RolesServiceProvider" --tag=config
Copied File [\vendor\ultraware\roles\config\roles.php] To [\config\roles.php]
Publishing complete.

C:\xampp\htdocs\phpadminlte>php artisan vendor:publish --provider="Ultraware\Roles\RolesServiceProvider" --tag=migrations
Copied Directory [\vendor\ultraware\roles\migrations] To [\database\migrations]
Publishing complete.

C:\xampp\htdocs\phpadminlte>php artisan migrate
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table
Migrating: 2015_01_15_105324_create_roles_table
Migrated:  2015_01_15_105324_create_roles_table
Migrating: 2015_01_15_114412_create_role_user_table
Migrated:  2015_01_15_114412_create_role_user_table
Migrating: 2015_01_26_115212_create_permissions_table
Migrated:  2015_01_26_115212_create_permissions_table
Migrating: 2015_01_26_115523_create_permission_role_table
Migrated:  2015_01_26_115523_create_permission_role_table
Migrating: 2015_02_09_132439_create_permission_user_table
Migrated:  2015_02_09_132439_create_permission_user_table

## About PHPAdminLTE
<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](http://patreon.com/taylorotwell):

- **[Vehikl](http://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Styde](https://styde.net)**
- **[Codecourse](https://www.codecourse.com)**
- [Fragrantica](https://www.fragrantica.com)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
