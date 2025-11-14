<?php
namespace App\Models;
use CodeIgniter\Model;

class HeroModel extends Model {
    protected $table = 'cms_hero';
    protected $allowedFields = ['image_path'];
}