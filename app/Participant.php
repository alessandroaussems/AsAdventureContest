<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';
    public function setUpdatedAtAttribute($value)
    {
        // to Disable updated_at
    }
    public function setCreatedAtAttribute($value)
    {
        // to Disable created_at
    }
}
