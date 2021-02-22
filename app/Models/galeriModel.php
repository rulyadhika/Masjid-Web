<?php namespace App\Models;

use CodeIgniter\Model;

class galeriModel extends Model
{
    protected $table      = 'tb_galeri';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['gambar','keterangan'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAllData(){
        return $this->db->table($this->table)->orderBy("created_at","ASC")->get()->getResultArray();
    }

    public function getDataById($id){
        return $this->db->table($this->table)->where("id",$id)->get()->getRowArray();
    }

    public function getDateLastUpdate(){
        return $this->db->table($this->table)->select('updated_at')->orderBy("updated_at",'DESC')->get()->getRowArray()['updated_at'];
    }

}