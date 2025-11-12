<?php
namespace App\Models;
use CodeIgniter\Model;

class ProgramModel extends Model {
    protected $table = 'cms_programs';
    protected $allowedFields = ['title', 'description', 'image_path'];
}