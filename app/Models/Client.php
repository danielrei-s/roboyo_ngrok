<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'name',
        'tin',
        'code',
        'address',
        'phone',
    ];

    public function contacts()
    {
      return $this->hasMany(Contacts::class, 'client_id');
    }
}
