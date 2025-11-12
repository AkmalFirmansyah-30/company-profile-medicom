<?php

namespace App\Models;

use CodeIgniter\Model;

class DivisionModel extends Model
{
    protected $table = 'cms_divisions';
    protected $allowedFields = ['name', 'description', 'image_path', 'color_class'];
}