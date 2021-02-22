<?php namespace App\Models;

use CodeIgniter\Model;

class kontakModel extends Model
{
    protected $table      = 'tb_kontak';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['nama','icon','isi','link'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    protected $validationRules = [
        'nama' => 'required',
        'icon' => 'required',
        'isi' => 'required',
        'link' => 'required'
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Silahkan masukan nama terlebih dahulu'
        ],
        'icon' => [
            'required' => 'Silahkan masukan icon terlebih dahulu'
        ],
        'isi' => [
            'required' => 'Silahkan masukan isi terlebih dahulu'
        ],
        'link' => [
            'required' => 'Silahkan masukan link terlebih dahulu'
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