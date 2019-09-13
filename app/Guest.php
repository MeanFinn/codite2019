<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
	protected $fillable = [
		'last_name',
		'first_name',
		'middle_initial',
		'School',
		'Position'
	];
}
