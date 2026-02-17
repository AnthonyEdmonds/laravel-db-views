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

### Definition

Each `View` consists of a name and a definition.

The name should be what you want the `View` to be called in the database, such as `my_requests_view`.

The definition should be an Eloquent or QueryBuilder query, which will have the needed view creation syntax prepended to it.

```php
return DB::table('requests')
    ->select(...)
    ->leftJoin(...)
    ->where(...);
```

### Formatters

To assist with common column formatting tasks, some helpers have been provided in the `View` class:

| Method                                                               | Usage                                                   |
|----------------------------------------------------------------------|---------------------------------------------------------|
| `View::boolean($column, $as, $yes = 'Yes', $no = 'No', $null = $no)` | Output a `boolean` column in "Yes", "No", "Null" format |

### Using database views with Eloquent scopes

To limit results from a database view, you may wish to use an existing Eloquent scope.

A combination of `whereExists()` and `whereColumn()` will allow you to filter the result of a database view:

```php
DB::table('my_view')
    ->whereExists(
        MyModel::query()
            ->forUser($user)
            ->whereColumn('my_view.id', '=', 'my_models.id'),
    )
    ->get();
```

## Configuration

### Views

Register the class-string of each View to be managed by the `update:db-views` command.

## Help and support

You are welcome to raise any issues or questions on GitHub.

If you wish to contribute to this library, raise an issue before submitting a forked pull request.

## Licence

Published under the MIT licence.
