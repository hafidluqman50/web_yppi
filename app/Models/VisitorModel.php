<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorModel extends Model
{
	protected $table      = 'visitor';
	protected $primaryKey = 'id_visitor';
	public $timestamps    = false;
	protected $guarded    = [];
}
