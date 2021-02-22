<?php namespace App\Models;

use CodeIgniter\Model;

class kepengurusanModel extends Model
{
    protected $table      = 'tb_kepengurusan';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['nama','jabatan'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    protected $validationRules    = [
        'nama' => 'required',
        'jabatan'=> 'required',
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Silahkan masukan nama terlebih dahulu'
        ],
        'jabatan'=>[
            'required'=> 'Silahkan masukan jabatan terlebih dahulu'
        ]
    ];

    public function getAllData(){
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function getDataById($id){
        return $this->db->table($this->table)->where("id",$id)->get()->getRowArray();
    }

    public function getDateLastUpdate(){
        return $this->db->table($this->table)->select('updated_at')->orderBy("updated_at",'DESC')->get()->getRowArray()['updated_at'];
    }

}