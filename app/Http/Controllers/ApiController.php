<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProject;
use App\Project;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private $model;
    function __construct() {
        $this->model = new Project();
    }
    function getProjects() {
        return Project::all();
    }
    function createProject(CreateProject $request) {
        return $this->model->create();
    }

    function delete() {
        return $this->model->deleteProject();
    }
    function validateProjectName() {
        return $this->model->validate();
    }
}
