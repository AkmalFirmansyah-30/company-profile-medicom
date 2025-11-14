<?php
namespace App\Models;
use CodeIgniter\Model;

class AchievementModel extends Model {
    protected $table = 'cms_achievements';
    protected $allowedFields = ['name', 'year', 'level', 'image_path'];
}