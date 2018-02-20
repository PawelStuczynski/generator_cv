<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable= ['image','name','surname','phone','email','adress','zipcode','city','birthdate','education','employer','language','additional_abilities','interests'];
}
