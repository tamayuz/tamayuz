<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class season extends Model
{

    public function project()
    {
        return $this->hasMany(Project::class)->where('is_accepted' ,true);

    }







}
