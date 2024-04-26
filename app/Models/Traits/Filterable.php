<?php

namespace App\Models\Traits;

use App\Http\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;


/**
 * Trait Filterable
 *
 * @package App\Models\Traits
 *
 * @method Builder|self Filter(Builder $builder, FilterInterface $filter)
 */
trait Filterable
{
    /**
     * @param  Builder  $builder
     * @param  FilterInterface  $filter
     *
     * @return Builder
     */
    public function scopeFilter(Builder $builder, FilterInterface $filter): Builder
    {
        $filter->apply($builder);

        return $builder;
    }
}
