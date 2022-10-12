<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model {

protected $fillable = [
    'created_by', 'department_id', 'designation', 'publication_status', 'designation_description'
];

public function user(){
    return $this->belongsTo(User::class,'created_by');
}
}