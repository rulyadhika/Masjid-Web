<?php

namespace App\Controllers;

use App\Models\postsModel;

class Postingan extends BaseController
{
	protected $postsModel;
	protected $jml_posts_per_page = 5;

	public function __construct()
	{
		$this->postsModel = new postsModel();
	}

	public function berita()
	{
		$data = [
			'title' => "Berita | Masjid As-Salam",
			'posts' => $this->postsModel->where(['kategori' => 'berita', 'data_status' => 'ditampilkan'])->orderBy('created_at', 'DESC')->paginate($this->jml_posts_per_page, 'berita'),
			'page' => 'Berita',
			'pager' => $this->postsModel->pager
		];
		return view('postingan/index', $data);
	}

	public function pengumuman()
	{
		$data = [
			'title' => "Pengumuman | Masjid As-Salam",
			'posts' => $this->postsModel->where(['kategori' => 'pengumuman', 'data_status' => 'ditampilkan'])->orderBy('created_at', 'DESC')->paginate($this->jml_posts_per_page, 'pengumuman'),
			'page' => 'Pengumuman',
			'pager' => $this->postsModel->pager
		];
		return view('postingan/index', $data);
	}

	public function pengajian()
	{
		$data = [
			'title' => "Pengajian | Masjid As-Salam",
			'posts' => $this->postsModel->where(['kategori' => 'pengajian', 'data_status' => 'ditampilkan'])->orderBy('created_at', 'DESC')->paginate($this->jml_posts_per_page, 'pengajian'),
			'page' => 'Pengajian',
			'pager' => $this->postsModel->pager
		];
		return view('postingan/index', $data);
	}

	public function kegiatan()
	{
		$data = [
			'title' => "Kegiatan | Masjid As-Salam",
			'posts' => $this->postsModel->where(['kategori' => 'kegiatan', 'data_status' => 'ditampilkan'])->orderBy('created_at', 'DESC')->paginate($this->jml_posts_per_page, 'kegiatan'),
			'page' => 'Kegiatan',
			'pager' => $this->postsModel->pager
		];
		return view('postingan/index', $data);
	}

	public function detail($slug)
	{
		$post = $this->postsModel->getPostBySlug($slug);
		$suggestedPost = $this->postsModel->getSuggestedPost($slug);
		$data = [
			'title' => $post["judul"] . " | Masjid As-Salam",
			'page' => ucfirst($post['kategori']),
			'post' => $post,
			'suggested_post' => $suggestedPost
		];
		return view("postingan/detail", $data);
	}


	//--------------------------------------------------------------------

}
