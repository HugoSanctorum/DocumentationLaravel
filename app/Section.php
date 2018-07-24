<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

	protected $table = "section";

	protected $fillable =[
		'title',
	];

    public function article(){
    	return $this->hasMany('App\Article','idSection');
    }
}
