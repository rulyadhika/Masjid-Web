<?php

namespace App\Models;

use CodeIgniter\Model;

class postsModel extends Model
{
    protected $table      = 'tb_postingan';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_penulis', 'kategori', 'judul', 'slug', 'isi', 'thumbnail', 'data_status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $kategori_postingan = ["berita", "pengajian", "kegiatan", "pengumuman"];

    public function getPostBySlug($slug)
    {
        return $this->db->table($this->table)->select('tb_postingan.*,users.username as penulis')->join('users', 'tb_postingan.id_penulis=users.id')->getWhere(['slug' => $slug, 'data_status' => 'ditampilkan'])->getRowArray();
    }

    public function getSuggestedPost($slug)
    {
        // ambil data pada baris berikutnya
        $id = $this->getPostBySlug($slug)['id'];
        $result = $this->db->table($this->table)->select("judul,slug,kategori")->getWhere(['id>' => $id, 'data_status' => 'ditampilkan'])->getRowArray();

        if ($result === null) {
            // ambil data pada baris sebelumnya
            return $this->getPreviousPost($id);
        } else {
            $result['status'] = "next_post";
            return $result;
        }
    }

    public function getPreviousPost($id)
    {
        $result = $this->db->table($this->table)->select("judul,slug,kategori")->getWhere(['id<' => $id, 'data_status' => 'ditampilkan'])->getLastRow('array');
        $result['status'] = "previous_post";

        return $result;
    }
}
