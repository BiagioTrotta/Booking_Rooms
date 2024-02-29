<?php

namespace App\Models;

use App\Models\ClientGroup;
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
        'date_of_birth',
        'place_of_birth',
        'gender',
        'identity_document',
        'document_number',
        'document_issuing_place',
        'group_members',
        'lastname_group_1',
        'firstname_group_1',
        'date_of_birth_group_1',
        'place_of_birth_group_1',
        'gender_group_1',
        'identity_document_group_1',
        'document_number_group_1',
        'document_issuing_place_group_1',
        'lastname_group_2',
        'firstname_group_2',
        'date_of_birth_group_2',
        'place_of_birth_group_2',
        'gender_group_2',
        'identity_document_group_2',
        'document_number_group_2',
        'document_issuing_place_group_2',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
