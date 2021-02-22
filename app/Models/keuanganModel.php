<?php

namespace App\Models;

use CodeIgniter\Model;

class keuanganModel extends Model
{
    protected $table      = 'tb_keuangan';
    protected $primaryKey = 'id';

    protected $allowedFields = ['keterangan', 'nominal', 'status', 'tanggal'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    private $tgl_awal, $tgl_akhir;

    protected $validationRules    = [
        'keterangan' => 'required',
        'nominal' => 'required|integer',
        'status' => 'required|in_list[pemasukan,pengeluaran]',
        'tanggal' => 'required|valid_date'
    ];

    protected $validationMessages = [
        'keterangan' => [
            'required' => 'Silahkan masukan keterangan terlebih dahulu'
        ],
        'nominal' => [
            'required' => 'Silahkan masukan nominal terlebih dahulu',
            'integer' => 'Yang anda masukan bukan angka!'
        ],
        'status' => [
            'required' => 'Silahkan masukan status terlebih dahulu',
            'in_list' => 'Yang anda masukan tidak sesuai ketentuan!'
        ],
        'tanggal' => [
            'required' => 'Silahkan masukan tanggal terlebih dahulu',
            'valid_date' => 'Yang anda masukan bukan tanggal!'
        ]
    ];

    public function setRangeTanggal($tgl_awal = null, $tgl_akhir = null)
    {
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
    }

    public function getRangeTanggal()
    {
        return ["tgl_awal" => $this->tgl_awal, "tgl_akhir" => $this->tgl_akhir];
    }

    public function getAllData()
    {
        return $this->db->table($this->table)->where('tanggal BETWEEN "' . $this->tgl_awal . '" AND "' . $this->tgl_akhir . '"')->orderBy("tanggal", "ASC")->get()->getResultArray();
    }

    public function getDataById($id)
    {
        return $this->db->table($this->table)->where("id", $id)->get()->getRowArray();
    }

    public function getDataPemasukan()
    {
        return $this->db->table($this->table)->selectSum('nominal')->where("status", "pemasukan")->where('tanggal BETWEEN "' . $this->tgl_awal . '" AND "' . $this->tgl_akhir . '"')->get()->getRowArray()['nominal'];
    }

    public function getDataPengeluaran()
    {
        return $this->db->table($this->table)->selectSum('nominal')->where("status", "pengeluaran")->where('tanggal BETWEEN "' . $this->tgl_awal . '" AND "' . $this->tgl_akhir . '"')->get()->getRowArray()['nominal'];
    }

    public function countBalance()
    {
        return (($this->getDataPemasukan()) - ($this->getDataPengeluaran()));
    }

    public function getBalance()
    {
        return $this->countBalance();
    }

    public function getDateLastUpdate()
    {
        return $this->db->table($this->table)->select('updated_at')->orderBy("updated_at", 'DESC')->get()->getRowArray()['updated_at'];
    }
}
