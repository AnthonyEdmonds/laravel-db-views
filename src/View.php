<?php

namespace AnthonyEdmonds\LaravelDbViews;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;

abstract class View
{
    abstract public static function name(): string;

    abstract public static function definition(): QueryBuilder|EloquentBuilder;

    public static function create(): bool
    {
        $name = static::name();
        $sql = static::definition()->toRawSql();

        return DB::statement(
            DB::raw("CREATE VIEW $name AS $sql")->getValue(
                DB::getQueryGrammar(),
            ),
        );
    }

    public static function destroy(): bool
    {
        $name = static::name();

        return DB::statement("DROP VIEW IF EXISTS $name");
    }
}
