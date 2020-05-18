<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyMajor extends Model
{
    public function user()
    {
        return $this->hasMany(User::class);

    }

    public function article()
    {
        return $this->hasMany(Article::class);

    }

    public function project()
    {
        return $this->hasMany(Project::class);

    }
}
