<?php

namespace App\Controllers;

use App\Models\Teachers;
use CodeIgniter\RESTful\ResourceController;

class TeacherController extends ResourceController
{
    protected $modelName = 'App\Models\Teachers';
    protected $format    = 'json';
    protected $projectRepository = null;

    public function createTeacher()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'major' => $this->request->getPost('major'),
        ];

        if (!$this->validate([
            'name' => 'required'
        ])) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $this->model->insert($data);
        return $this->respondCreated($data, 'Teacher created');
    }

    public function getTeachers()
    {
        $teachers = $this->model->findAll();
        return $this->respond($teachers);
    }

    public function getAllClassTeacher()
    {
        // 
    }

    public function getClassTeacher($id)
    {
        // 
    }
}
