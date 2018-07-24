<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

	protected $table = "article";
	protected $fillable =[
		'title','content','author','idSection',
	];

    public function section(){
    	return $this->belongsTo('App\Section','idSection');
    }
}
