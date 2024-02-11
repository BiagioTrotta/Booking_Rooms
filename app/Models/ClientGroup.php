<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'lastname',
        'firstname',
        'gender',
        'date_of_birth',
        'place_of_birth',
        'identity_document',
        'document_number',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
