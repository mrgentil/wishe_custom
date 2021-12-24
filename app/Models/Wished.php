<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wished extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content',
        'image',
        'order',
        'matrix'
    ];

    public function getLgLogoAttribute()
    {
        return  asset('images' . DIRECTORY_SEPARATOR
            . 'image' . DIRECTORY_SEPARATOR . 'lg' . DIRECTORY_SEPARATOR . $this->image);
    }

    public function getSmLogoAttribute()
    {
        return  asset('images' . DIRECTORY_SEPARATOR
            . 'image' . DIRECTORY_SEPARATOR . 'sm' . DIRECTORY_SEPARATOR . $this->image);
    }

    public function getXsLogoAttribute()
    {
        return  asset('images' . DIRECTORY_SEPARATOR
            . 'image' . DIRECTORY_SEPARATOR . 'xs' . DIRECTORY_SEPARATOR . $this->image);
    }
}
