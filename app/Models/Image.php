<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'img',
        'img_2',
        'img_3',
        'img_4',
        'img_5',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'image_id', 'id');
    }
}
