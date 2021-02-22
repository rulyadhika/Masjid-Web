<?php

namespace App\Controllers;

use App\Models\postsModel;
use App\Models\bannerModel;

class Home extends BaseController
{
	protected $postsModel, $bannerModel;

	public function __construct()
	{
		$this->postsModel = new postsModel();
		$this->bannerModel = new bannerModel();
	}

	public function index()
	{
		$data = [
			'title' => "Masjid As-Salam | Perumahan Griya Satria Mandalatama",
			'post_terbaru' => $this->postsModel->select("judul,kategori,slug,thumbnail,isi,updated_at")
				->where("data_status", "ditampilkan")->groupStart()->where("kategori", "berita")->orWhere("kategori", "pengumuman")
				->groupEnd()->orderBy("updated_at", "DESC")->limit(4)->get()->getResultArray(),
			'agenda_terbaru' => $this->postsModel->select("judul,kategori,slug,thumbnail,isi,updated_at,created_at")
				->where("data_status", "ditampilkan")->groupStart()->where("kategori", "kegiatan")->orWhere("kategori", "pengajian")
				->groupEnd()->orderBy("updated_at", "DESC")->limit(5)->get()->getResultArray(),
			'banners' => $this->bannerModel->getAllData()
		];
		return view('index', $data);
	}

	public function searchPosts()
	{
		$key = $this->request->getVar("key");
		if (!$key || trim($key, "") == "") {
			// throw new \CodeIgniter\Exceptions\PageNotFoundException();
			return redirect()->to("/");
		}

		$data = [
			'title' => "Hasil Pencarian : $key | Masjid As-Salam",
			'posts' => $this->postsModel->where('data_status', 'ditampilkan')->groupStart()->like("judul", $key)->orLike("isi", $key)->orLike("kategori", $key)->groupEnd()->paginate(5, 'search'),
			'jmlHasilCari' => $this->postsModel->where('data_status', 'ditampilkan')->groupStart()->like("judul", $key)->orLike("isi", $key)->orLike("kategori", $key)->groupEnd()->countAllResults(),
			'page' => 'Search',
			'keySearch' => $key,
			'pager' => $this->postsModel->pager,
		];

		return view("postingan/index.php", $data);
	}

	//--------------------------------------------------------------------

}
