<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    // دالة تحدد العلاقة مع نموذج User
    public function service()
{
    return $this->belongsTo(Service::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}


}

