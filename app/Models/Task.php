<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable=[
    'name',
    'user_id',
    'done',
    'deadline',
    'project_list_id'];
    public function user()
    {
        return $this ->belongsTo (User::class, 'user_id','id');
}
    public function project_list()
    {
        return $this ->belongsTo(ProjectList::class, 'project_list_id','id');
}
}