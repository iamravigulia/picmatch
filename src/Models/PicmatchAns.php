<?php
namespace Edgewizz\Picmatch\Models;

use Illuminate\Database\Eloquent\Model;

class PicmatchAns extends Model
{
    public function match(){
        return $this->belongsTo('Edgewizz\Picmatch\Models\PicmatchAns', 'match_id');
    }
    protected $table = 'fmt_picmatch_ans';
}
