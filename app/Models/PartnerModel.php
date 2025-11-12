<?php
namespace App\Models;
use CodeIgniter\Model;

class PartnerModel extends Model {
    protected $table = 'cms_partners';
    protected $allowedFields = ['name', 'image_path'];
}