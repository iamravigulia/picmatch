<?php
namespace Edgewizz\Picmatch\Models;

use Illuminate\Database\Eloquent\Model;

class PicmatchQues extends Model{
    public function answers(){
        return $this->hasMany('Edgewizz\Picmatch\Models\PicmatchAns', 'question_id');
    }
    protected $table = 'fmt_picmatch_ques';
}