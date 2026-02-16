# laravel-db-views

![Composer status](.github/composer.svg)
![Coverage status](.github/coverage.svg)
![NPM status](.github/npm.svg)
![PHP version](.github/php.svg)
![Tests status](.github/tests.svg)

Manage database views for Laravel applications

## Installation

Add this library using `composer require anthonyedmonds/laravel-db-views`.

The service provider will be automatically registered.

Publish the config file using `php artisan vendor:publish --tag=db-views"`

## How does this work?

You can define any number of Views by extending the `View` class provided in this library.

Register your `View` classes in the config file then run the `update:db-views` Artisan command to add them to your database.

Running the command will cause each registered View to be deleted and recreated fresh.

## Configuration

### Views

Register the class-string of each View to be managed by the `update:db-views` command.

## Help and support

You are welcome to raise any issues or questions on GitHub.

If you wish to contribute to this library, raise an issue before submitting a forked pull request.

## Licence

Published under the MIT licence.
