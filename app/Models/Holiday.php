<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    protected $fillable = [
		'created_by', 'holiday_name', 'holiday_date', 'publication_status', 'description', 'deletion_status',
	];
}
