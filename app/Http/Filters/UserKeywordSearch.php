<?php

namespace Vanguard\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class UserKeywordSearch implements Filter
{
    public function __invoke(Builder $query, $search, string $property = '')
    {
        $query->where(function ($q) use ($search) {
            $q->where('username', "like", "%{$search}%");
            $q->orWhere('email', 'like', "%{$search}%");
            $q->orWhere('first_name', 'like', "%{$search}%");
            $q->orWhere('last_name', 'like', "%{$search}%");
        });
    }
}
