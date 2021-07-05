<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class My_Parent extends Model
{
    use HasTranslations;
    public $translatable = ['Name_Father','Job_Father','Name_Mother','Job_Mother'];
    protected $table = 'my__parents';
    protected $fillable = ['Email', 'Password', 'Name_Father'];
    protected $guarded=[];
    public function setPasswordAttribute ($password){
        if (!empty($password)){
            $this->attributes['password'] = bcrypt($password);
        }
    }

}
