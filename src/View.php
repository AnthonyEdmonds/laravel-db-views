<?php

namespace AnthonyEdmonds\LaravelDbViews;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;

abstract class View
{
    abstract protected function name(): string;

    abstract protected function definition(): QueryBuilder|EloquentBuilder;

    public static function create(): bool
    {
        $viewClass = static::class;
        $view = new $viewClass();

        $name = $view->name();
        $sql = $view->definition()->toRawSql();

        return DB::statement(
            DB::raw("CREATE VIEW $name AS $sql")->getValue(
                DB::getQueryGrammar(),
            ),
        );
    }

    public static function destroy(): bool
    {
        $viewClass = static::class;
        $view = new $viewClass();

        $name = $view->name();

        return DB::statement("DROP VIEW IF EXISTS $name");
    }
}
