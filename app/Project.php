<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $guarded = [];

    function getAll() {
        return $this->get();
    }
    function create() {
         if( Project::Create(request()->all()) ) {
             return response()->json(['message' => 'Project is created successfully'], 200);
         }
    }

    function updateProject(){
        if( Project::Update(request()->all()) ) {
            return response()->json(['message' => 'Project is updated successfully'], 200);
        }
    }

    function getProject() {
        return Project::find(request('id'));
    }
    function deleteProject() {
        if ( Project::find(request('id'))->delete() ) {
              return response()->json(['message' => 'Project Deleted successfully'], 200);
        }
    }
    function validate() {
        if ( Project::where('project_name','=', trim(request('project_name') ) )->first() ) {
            return response()->json(['message' => 'Project Name should be unique'], 200);
        }
        return response()->json(['message' => 'Project Name is valid'], 200);
    }

}
