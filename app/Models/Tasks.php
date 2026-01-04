<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'tasks';

    protected $primaryKey = 'id';

    public $incrementing = true;
    public $timestamps = true;
    protected $fillable =
        [
        'nom',
        'description',
        'status',
        'startDate',
        'endDate',
        'project_id',
        'user_id'
    ];




    public function tasks()
    {
        return $this->hasOne(User::class, 'user_id');
    }



    public function projects()
    {
        return $this->hasOne(Projects::class, 'user_project');
    }


}
