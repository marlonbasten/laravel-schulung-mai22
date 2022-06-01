<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
