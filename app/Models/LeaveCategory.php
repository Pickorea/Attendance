<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class LeaveCategory extends Model
{
  

    protected $fillable = [
        'created_by', 'leave_category', 'publication_status', 'leave_category_description'
    ];
}
