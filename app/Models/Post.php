<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $board_id
 * @property-read \App\Models\Board|null $board
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Query\Builder|Post onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereBoardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Post withoutTrashed()
 * @mixin \Eloquent
 */
class Post extends Model
{
    use SoftDeletes;

    // protected $table = 'anderer_tabellenname'; - Wenn die Tabelle nicht Laravel konform benannt wurde.

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function title(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucfirst($value), // Mutator - Bearbeitet das Feld bevor es in die DB gespeichert wird.
            get: fn ($value) => ucfirst($value)  // Accessor - Bearbeitet das Feld bevor es ausgegeben wird. Das Feld bleibt in der DB aber unverändert.
        );
    }
}
