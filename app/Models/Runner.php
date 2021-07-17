<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Runner extends Model
{
    
	use Notifiable;
    
	
	protected $table = 'runners';
	protected $primaryKey   = 'runner_no';
    public    $incrementing = false;
    protected $keyType      = 'string';
	
		
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'runner_no', 'fname', 'sname', 'gender', 'age', 'region', 'email', 'phoneno', 'nationality', 'tname', 'rcat', 'tsize',
    ];
	
	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
	
}