<?php
namespace App\Models;
use CodeIgniter\Model;

class ReportModel extends Model {
    protected $table = 'cms_reports';
    protected $allowedFields = ['year', 'month', 'url'];
}