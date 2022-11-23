<?php

namespace App\Models\Admin;

use App\Models\Client\MenuItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'client_id', 'id');
    }
}
