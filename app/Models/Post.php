<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Post model
 *
 *@property $id
 *@property $title
 *@property $description
 *@property $likes
 *@property $is_published
 *@property $category_id
 *
 *@property Category $category
 *@property Tag[]|Collection $tags
 *
 *
 */
class Post extends Model
{
    use SoftDeletes, HasFactory, Filterable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'likes',
        'is_published',
        'category_id',
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
