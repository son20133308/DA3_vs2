<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\admin as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class admin extends Authenticatable
{
	 use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "tbl_useradmin";
	protected $fillable = ['id_useradmin', 'username', 'password', 'key'];
	public $timestamp = true;
	public $primaryKey = 'id_useradmin';
	protected $guarded = [];
}

	

