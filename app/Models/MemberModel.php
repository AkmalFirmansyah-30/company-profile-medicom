<?php
namespace App\Models;
use CodeIgniter\Model;

class MemberModel extends Model {
    protected $table = 'cms_members';
    protected $allowedFields = ['division_id', 'name', 'position', 'image_path'];
}