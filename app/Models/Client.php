<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'lastname',
        'firstname',
        'phone',
        'email',
        //others
        'date_of_birth',
        'place_of_birth',
        'gender',
        'identity_document',
        'document_number',
        'document_issuing_place',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
