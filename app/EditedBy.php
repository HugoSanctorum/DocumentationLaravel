<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditedBy extends Model
{
    protected $table = "edited_by";

	protected $fillable =[
		'idUser', 'idArticle'
	];
}
