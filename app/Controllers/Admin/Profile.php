<?php

namespace App\Controllers\Admin;

use App\Models\profileModel;
use App\Controllers\BaseController;


class Profile extends BaseController
{
	protected $profileModel;
	protected $db;

	public function __construct()
	{
		$this->profileModel = new profileModel();
		$this->db = \Config\Database::connect();
	}

	public function index()
	{
		$data = [
			'title' => "Admin - Kelola Profile | Masjid As-Salam",
			'menuTitle' => "Kelola Profile",
			'sub_menu' => 'Profile',
			'parent_menu' => 'Lainnya',
			'data' => $this->profileModel->getData(),
		];
		return view('admin/lainnya/profile', $data);
	}

	public function updateProfile()
	{
		$request = $this->request;

		$data = [
			'id' => $request->getVar("id"),
			'isi' => $request->getVar('isi'),
		];

		if ($this->profileModel->save($data) === false) {
			session()->setFlashdata("errors", $this->profileModel->errors());
			return redirect()->back()->withInput();
		} else {
			session()->setFlashdata("pesan", "Data Profile Berhasil Diubah");
			return redirect()->to("/admin/profile/");
		}
	}

	//--------------------------------------------------------------------

}
