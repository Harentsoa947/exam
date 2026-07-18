<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointillerWebQuestion extends Model
{
    protected $table = 'pointiller_web_questions';

    protected $fillable = [
        'pointiller_web_id', 'enonce', 'image', 'video',
        'points', 'ordre',
    ];

    public function pointillerWeb()
    {
        return $this->belongsTo(PointillerWeb::class);
    }

    public function reponses()
    {
        return $this->hasMany(PointillerWebReponse::class);
    }
}
