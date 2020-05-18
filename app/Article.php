<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, bool $true)
 */
class Article extends Model
{
    protected $guarded = [''];

    /*
    study_major_id
    user_id
    image_src
    title
    description
    body
    is Accepted
    byHow
    */


    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function study_major()
    {
        return $this->belongsTo(StudyMajor::class);

    }
}
