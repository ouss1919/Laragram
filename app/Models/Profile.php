<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    use HasFactory;
    public function getImage()
    {
        return $this->image
            ? '/storage/' . $this->image
            : "https://www.chamber-music.org/sites/all/themes/custom/cma/images/profile-photo-empty.png";
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
