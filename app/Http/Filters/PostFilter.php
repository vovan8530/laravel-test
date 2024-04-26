<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const string TITLE = 'title';
    public const string DESCRIPTION = 'description';
    public const string CATEGORY_ID = 'category_id';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }

    /**
     * @param  Builder  $builder
     * @param $value
     * @return void
     */
    public function title(Builder $builder, $value): void
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    /**
     * @param  Builder  $builder
     * @param $value
     * @return void
     */
    public function content(Builder $builder, $value): void
    {
        $builder->where('description', 'like', "%{$value}%");
    }

    /**
     * @param  Builder  $builder
     * @param $value
     * @return void
     */
    public function categoryId(Builder $builder, $value): void
    {
        $builder->where('category_id', $value);
    }

}
