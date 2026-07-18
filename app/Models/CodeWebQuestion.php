<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeWebQuestion extends Model
{
    protected $table = 'code_web_questions';

    protected $fillable = ['code_web_id', 'instruction', 'langage', 'code_starter', 'points', 'ordre'];

    public function codeWeb()
    {
        return $this->belongsTo(CodeWeb::class);
    }

    // public function reponses()
    // {
    //     return $this->hasMany(CodeWebReponse::class);
    // }
}
