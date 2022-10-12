<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryLevel extends Model
{
    use HasFactory;

    protected $table = 'salary_levels';

    protected $fillable = [

                    'created_by', 
                    'salary_level',
                    
	];

   public function users(){

    return $this->belongsToMany(User::class)->withPivot(['leave_entitlement']);

   }
}
