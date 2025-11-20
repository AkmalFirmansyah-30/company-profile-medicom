<?php
namespace App\Models;
use CodeIgniter\Model;

class ObjectiveModel extends Model {
    protected $table = 'cms_objectives';
    protected $allowedFields = ['content'];
}