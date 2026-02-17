<?php

namespace AnthonyEdmonds\LaravelDbViews;

use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;

abstract class View
{
    /**
     * View
     * ----
     * Define your database view
     */

    /** What the view should be called in the database */
    abstract public static function name(): string;

    /** The query definition of the View, in either Eloquent or QueryBuilder format */
    abstract public static function definition(): QueryBuilder|EloquentBuilder;

    /** Creates the view in the database */
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

    /** Removes the view from the database */
    public static function destroy(): bool
    {
        $name = static::name();

        return DB::statement("DROP VIEW IF EXISTS $name");
    }

    /**
     * Formatters
     * ----------
     * Helpful formatters for common recurring patterns
     */

    /** Format a boolean column as a string */
    public static function boolean(
        string $column,
        string $as,
        string $yes = 'Yes',
        string $no = 'No',
        ?string $null = null,
    ): Expression {
        if ($null === null) {
            $null = $no;
        }

        return DB::raw(
            implode(' ', [
                'CASE',
                "WHEN $column = 1",
                "THEN \"$yes\"",
                "WHEN $column = 0",
                "THEN \"$no\"",
                "ELSE \"$null\"",
                "END AS \"$as\"",
            ]),
        );
    }
}
