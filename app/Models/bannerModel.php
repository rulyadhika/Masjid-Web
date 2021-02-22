<?php

namespace App\Models;

use CodeIgniter\Model;

class bannerModel extends Model
{
    protected $table      = 'tb_banner';
    protected $primaryKey = 'id';

    protected $allowedFields = ['gambar', 'judul', 'keterangan'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAllData()
    {
        return $this->db->table($this->table)->orderBy("created_at", "DESC")->get()->getResultArray();
    }

    public function getDataById($id)
    {
        return $this->db->table($this->table)->where("id", $id)->get()->getRowArray();
    }
}
