<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelierWebPaire extends Model
{
    protected $table = 'relier_web_paires';

    protected $fillable = ['relier_web_question_id', 'element_left', 'element_right', 'order_left', 'order_right'];

    public function question()
    {
        return $this->belongsTo(RelierWebQuestion::class, 'relier_web_question_id');
    }
}
