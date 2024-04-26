<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model Category
 *
 * @property int $id
 * @property string $title
 */
class Category extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
    ];

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }

}
