<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Generator extends Model
{
    use HasFactory;

    protected $table = 'generators';

    protected $fillable = [
        'brand',
        'model',
        'state_id'
    ];

    public $timestamps = true;

    public function state(): HasOne
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
}
