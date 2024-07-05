<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table      = 'teachers';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name', 'major', 'created_at', 'updated_at'];

    protected $validationRules    = [
        'name' => 'required'
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'The name field is required.'
        ]
    ];

    protected $skipValidation = false;

    protected $beforeInsert = ['formatName'];
    protected $beforeUpdate = ['formatName'];

    protected function formatName(array $data)
    {
        if (isset($data['data']['name'])) {
            $data['data']['name'] = 'teacher-' . $data['data']['name'];
        }

        return $data;
    }
}
