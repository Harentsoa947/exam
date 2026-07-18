<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelierWebQuestion extends Model
{
    protected $table = 'relier_web_questions';

    protected $fillable = ['relier_web_id', 'enonce', 'points', 'ordre'];

    public function relierWeb()
    {
        return $this->belongsTo(RelierWeb::class);
    }

    public function paires()
    {
        return $this->hasMany(RelierWebPaire::class);
    }
}
