<?php
namespace App\Models;
use CodeIgniter\Model;

class PageModel extends Model {
    protected $table = 'cms_pages';
    protected $primaryKey = 'page_slug';
    protected $allowedFields = ['page_slug', 'hero_title', 'hero_description', 'main_title', 'main_content', 'video_url'];
}