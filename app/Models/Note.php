<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'mark',
        'student_id'
    ];

    //AQUI VIENE LA NOVEDAD: NOTAS ES EL HIJO. PORQUE HAY 1:N
    //EN ESTE CASO NOTAS ES LA "N", MUCHOS
    //ENTONCES CUAL USO BELONGS TO O HAS MANY

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
