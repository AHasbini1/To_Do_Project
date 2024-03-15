<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectList extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable=['user_id','name'];

    public function user()
    {
        return $this ->belongsTo(user::class, 'user_id','id');
        //table, 'foreign_key', 'local_key'
    }      
    public function tasks()
    {
        return $this ->hasMany(Tasks::class, 'project_list_id','id');
       
    }      

}