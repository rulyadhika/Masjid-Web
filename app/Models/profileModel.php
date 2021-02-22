<?php namespace App\Models;

use CodeIgniter\Model;

class profileModel extends Model
{
    protected $table      = 'tb_profile';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['isi'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    protected $validationRules    = [
        'isi' => 'required',
    ];

    protected $validationMessages = [
        'isi' => [
            'required' => 'Silahkan masukan isi text terlebih dahulu'
        ]
    ];

    public function getData(){
        return $this->db->table($this->table)->get()->getRowArray();
    }

    public function getDateLastUpdate(){
        return $this->db->table($this->table)->select('updated_at')->orderBy("updated_at",'DESC')->get()->getRowArray()['updated_at'];
    }

}