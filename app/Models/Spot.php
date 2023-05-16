<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'content',
        'adress',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'prefecture_id',
        'user_id',
    ];
    
    protected $table = 'spots';
    
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
}
