<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, bool $true)
 */
class Project extends Model
{
    protected $guarded = ['is_accepted'] ;

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function studyMajor()
    {
        return $this->belongsTo(StudyMajor::class);

    }  public function season()
    {
        return $this->belongsTo(season::class);

    }
}
