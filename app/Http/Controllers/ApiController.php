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
        return $this->model->getAll();
    }
    function create() {
        return $this->model->create();
    }
    function store(){
        return $this->model->updateProject();
    }

    function get() {
        return $this->model->getProject();
    }

    function delete() {
        return $this->model->deleteProject();
    }
    function validateProjectName() {
        return $this->model->validate();
    }
}
