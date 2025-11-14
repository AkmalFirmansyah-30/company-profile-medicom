<?php
namespace App\Models;
use CodeIgniter\Model;

class GalleryModel extends Model {
    protected $table = 'cms_gallery';
    protected $allowedFields = ['image_path'];
}