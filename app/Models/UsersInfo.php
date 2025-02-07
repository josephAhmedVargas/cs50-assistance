<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersInfo extends Model
{
    /** @use HasFactory<\Database\Factories\UsersInfoFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 'first_name', 'middle_name', 'last_name', 'second_last_name',
        'identification_number', 'residence', 'birth_date', 'phone', 'education_level',
        'institution_name', 'institution_address', 'career', 'tshirt_size'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->hasOneThrough(Group::class, User::class, 'id', 'id', 'user_id', 'group_id');
    }
}
