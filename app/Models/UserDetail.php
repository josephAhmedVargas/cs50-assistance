<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    /** @use HasFactory<\Database\Factories\UserDetailFactory> */
    use HasFactory;

    protected $table = 'user_details';

    protected $fillable = [
        'user_id', 'biography', 'github_username', 'staff_email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRoleAttribute(){
        return $this->user->role->name;
    }
}
