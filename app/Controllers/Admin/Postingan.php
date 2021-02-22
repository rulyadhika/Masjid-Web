<?php

namespace App\Controllers\Admin;

use App\Models\postsModel;
use App\Controllers\BaseController;

// controller untuk mengatur post berita,pengumuman,kegiatan,pengajian

class Postingan extends BaseController
{
	protected $postModel;
	protected $db;
	protected $data_per_page = 10;

	public function __construct()
	{
		$this->postModel = new postsModel();
		$this->db = \Config\Database::connect();
	}

	public function berita()
	{
		$key = $this->request->getVar("key");
		if (!$key) {
			$data = $this->postModel->select('tb_postingan.*,users.username as penulis')->join('users', 'tb_postingan.id_penulis=users.id')->where("kategori", "berita")->orderBy('tb_postingan.created_at', 'DESC');
		} else {
			$data = $this->postModel->select('tb_postingan.*,users.username as penulis')->join('users', 'tb_postingan.id_penulis=users.id')->where("kategori", "berita")->groupStart()->like("judul", $key)->orLike("isi", $key)->groupEnd()->orderBy('tb_postingan.created_at', 'DESC');
		}

		$data = [
			'title' => "Admin - Kelola Berita | Masjid As-Salam",
			'menuTitle' => "Kelola Berita",
			'sub_menu' => 'Berita',
			'parent_menu' => 'Kelola Postingan',
			'key' => $key,
			'posts' => $data->paginate($this->data_per_page, 'berita'),
			'pager' => $this->postModel->pager
		];
		return view('admin/postingan/index', $data);
	}

	public function pengumuman()
	{
		$key = $this->request->getVar("key");
		if (!$key) {
			$data = $this->postModel->select('tb_postingan.*,users.username as penulis')->join('users', 'tb_postingan.id_penulis=users.id')->where("kategori", "pengumuman")->orderBy('tb_postingan.created_at', 'DESC');
		} else {
			$data = $this->postModel->select('tb_postingan.*,users.username as penulis')->join('users', 'tb_postingan.id_penulis=users.id')->where("kategori", "pengumuman")->groupStart()->like("judul", $key)->orLike("isi", $key)->groupEnd()->orderBy('tb_postingan.created_at', 'DESC');
		}

		$data = [
			'title' => "Admin - Kelola Pengumuman | Masjid As-Salam",
			'menuTitle' => "Kelola Pengumuman",
			'sub_menu' => 'Pengumuman',
			'parent_menu' => 'Kelola Postingan',
			'key' => $key,
			'posts' => $data->paginate($this->data_per_page, 'pengumuman'),
			'pager' => $this->postModel->pager
		];
		return view('admin/postingan/index', $data);
	}

	public function pengajian()
	{
		$key = $this->request->getVar("key");
		if (!$key) {
			$data = $this->postModel->select('tb_postingan.*,users.username as penulis')->join('users', 'tb_postingan.id_penulis=users.id')->where("kategori", "pengajian")->orderBy('tb_postingan.created_at', 'DESC');
		} else {
			$data = $this->postModel->select('tb_postingan.*,users.username as penulis')->join('users', 'tb_postingan.id_penulis=users.id')->where("kategori", "pengajian")->groupStart()->like("judul", $key)->orLike("isi", $key)->groupEnd()->orderBy('tb_postingan.created_at', 'DESC');
		}

		$data = [
			'title' => "Admin - Kelola Pengajian | Masjid As-Salam",
			'menuTitle' => "Kelola Pengajian",
			'sub_menu' => 'Pengajian',
			'parent_menu' => 'Kelola Agenda',
			'key' => $key,
			'posts' => $data->paginate($this->data_per_page, 'pengajian'),
			'pager' => $this->postModel->pager
		];
		return view('admin/postingan/index', $data);
	}

	public function kegiatan()
	{
		$key = $this->request->getVar("key");
		if (!$key) {
			$data = $this->postModel->select('tb_postingan.*,users.username as penulis')->join('users', 'tb_postingan.id_penulis=users.id')->where("kategori", "kegiatan")->orderBy('tb_postingan.created_at', 'DESC');
		} else {
			$data = $this->postModel->select('tb_postingan.*,users.username as penulis')->join('users', 'tb_postingan.id_penulis=users.id')->where("kategori", "kegiatan")->groupStart()->like("judul", $key)->orLike("isi", $key)->groupEnd()->orderBy('tb_postingan.created_at', 'DESC');
		}

		$data = [
			'title' => "Admin - Kelola Kegiatan | Masjid As-Salam",
			'menuTitle' => "Kelola Kegiatan",
			'sub_menu' => 'Kegiatan',
			'parent_menu' => 'Kelola Agenda',
			'key' => $key,
			'posts' => $data->paginate($this->data_per_page, 'kegiatan'),
			'pager' => $this->postModel->pager
		];
		return view('admin/postingan/index', $data);
	}

	public function tambahPostingan()
	{
		$data = [
			'title' => "Admin - Tambah Postingan | Masjid As-Salam",
			'menuTitle' => "Kelola Postingan",
			'parent_menu' => 'Tambah Postingan',
			'kategori' => $this->postModel->kategori_postingan,
			'validation' => \Config\Services::validation()
		];

		return view('admin/postingan/tambahpostingan', $data);
	}

	public function insertPostingan()
	{
		$request = $this->request;

		if (!$this->validate([
			"kategori" => [
				"rules" => "required",
				"errors" => [
					"required" => "Silahkan masukan kategori terlebih dahulu"
				]
			],
			"judul" => [
				"rules" => "required|is_unique[tb_postingan.judul]",
				"errors" => [
					"required" => "Silahkan masukan judul terlebih dahulu",
					"is_unique" => "Judul sudah terdaftar, silahkan pilih judul lain"
				]
			],
			"thumbnail" => [
				"rules" => "max_size[thumbnail,1024]|mime_in[thumbnail,image/png,image/jpg,image/jpeg]|is_image[thumbnail]",
				"errors" => [
					"max_size" => "Ukuran gambar terlalu besar",
					"mime_in" => "Yang anda upload bukan gambar",
					"is_image" => "Yang anda upload bukan gambar",
				]
			]
		])) {
			return redirect()->to("/admin/postingan/tambahpostingan")->withInput();
		};

		if ($request->getFile("thumbnail")->getError() === 4) {
			$thumbnailName = "default.jpg";
		} else {
			$thumbnail = $request->getFile("thumbnail");
			$thumbnailName = $thumbnail->getRandomName();
			$thumbnail->move("asset/images/thumbnails", $thumbnailName);
		}

		$slug = url_title($request->getVar("judul"), "-", true);
		$data = [
			'id_penulis' => user_id(),
			'kategori' => $request->getVar('kategori'),
			'judul' => $request->getVar('judul'),
			'slug' => $slug,
			'isi' => $request->getVar("content"),
			'thumbnail' => $thumbnailName,
			'data_status' => 'ditampilkan'
		];

		$this->postModel->save($data);

		session()->setFlashdata("pesan", "Postingan Berhasil Ditambahkan");

		return redirect()->to("/admin/postingan/" . $request->getVar("kategori"));
	}

	public function editPost($slug)
	{
		$post = $this->postModel->select('tb_postingan.*,users.username as penulis')->join('users', 'tb_postingan.id_penulis=users.id')->where('slug', $slug)->orderBy('tb_postingan.created_at', 'DESC')->first();

		$data = [
			'title' => "Admin - Edit Postingan | Masjid As-Salam",
			'menuTitle' => "Kelola Postingan",
			'parent_menu' => "Kelola Postingan",
			'kategori' => $this->postModel->kategori_postingan,
			'post' => $post,
			'validation' => \Config\Services::validation()
		];
		return view('admin/postingan/editpostingan', $data);
	}

	public function updatePost($id)
	{
		$request = $this->request;

		$dataLama = $this->postModel->where("slug", $request->getVar("slug"))->first();

		// cek apakah judul dirubah atau tidak
		if ($dataLama['judul'] == $request->getVar("judul")) {
			$judulRules = "required";
		} else {
			$judulRules = "required|is_unique[tb_postingan.judul]";
		}

		if (!$this->validate([
			"kategori" => [
				"rules" => "required",
				"errors" => [
					"required" => "Silahkan masukan kategori terlebih dahulu"
				]
			],
			"status" => [
				"rules" => "required",
				"errors" => [
					"required" => "Silahkan masukan status terlebih dahulu"
				]
			],
			"judul" => [
				"rules" => $judulRules,
				"errors" => [
					"required" => "Silahkan masukan judul terlebih dahulu",
					"is_unique" => "Judul sudah terdaftar, silahkan pilih judul lain"
				]
			],
			"thumbnail" => [
				"rules" => "max_size[thumbnail,1024]|mime_in[thumbnail,image/png,image/jpg,image/jpeg]|is_image[thumbnail]",
				"errors" => [
					"max_size" => "Ukuran gambar terlalu besar",
					"mime_in" => "Yang anda upload bukan gambar",
					"is_image" => "Yang anda upload bukan gambar",
				]
			]
		])) {
			return redirect()->to("/admin/postingan/editpost/" . $request->getVar("slug"))->withInput();
		};

		if ($request->getFile("thumbnail")->getError() === 4) {
			$thumbnailName = $request->getVar("thumbnailLama");
		} else {
			$thumbnail = $request->getFile("thumbnail");
			$thumbnailName = $thumbnail->getRandomName();
			$thumbnail->move("asset/images/thumbnails", $thumbnailName);

			if ($request->getVar("thumbnailLama") != "default.jpg") {
				unlink("asset/images/thumbnails/" . $request->getVar("thumbnailLama"));
			}
		}

		$slug = url_title($request->getVar("judul"), "-", true);
		$data = [
			'id' => $id,
			'id_penulis' => user_id(),
			'kategori' => $request->getVar('kategori'),
			'judul' => $request->getVar('judul'),
			'slug' => $slug,
			'isi' => $request->getVar("content"),
			'thumbnail' => $thumbnailName,
			'data_status' => $request->getVar("status")
		];

		$this->postModel->save($data);

		session()->setFlashdata("pesan", "Postingan Berhasil Diupdate");

		return redirect()->to("/admin/postingan/" . $request->getVar("kategori"));
	}

	public function deletePost($id)
	{
		if ($this->request->getMethod() == 'delete') {
			$dataLama = $this->postModel->where("id", $id)->first();

			if ($dataLama["thumbnail"] != "default.jpg") {
				unlink("asset/images/thumbnails/" . $dataLama['thumbnail']);
			}

			$this->postModel->delete(['id' => $id]);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	//--------------------------------------------------------------------

}
