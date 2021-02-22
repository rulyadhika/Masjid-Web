<?php

namespace App\Controllers\Admin;

use App\Models\kontakModel;
use App\Controllers\BaseController;


class Kontak extends BaseController
{
	protected $kontakModel;
	protected $db;

	public function __construct()
	{
		$this->kontakModel = new kontakModel();
		$this->db = \Config\Database::connect();
	}

	public function index()
	{
		$data = [
			'title' => "Admin - Kelola Kontak | Masjid As-Salam",
			'menuTitle' => "Kelola Kontak",
			'sub_menu' => 'Kontak',
			'parent_menu' => 'Lainnya',
			'data' => $this->kontakModel->getAllData(),
		];
		return view('admin/lainnya/kontak', $data);
	}

	public function getSingleData()
	{
		$id = $this->request->getVar("id");
		if ($this->request->isAJAX()) {
			return json_encode($this->kontakModel->getDataById($id));
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function insertKontak()
	{
		$request = $this->request;

		$data = [
			'nama' => $request->getVar('nama'),
			'icon' => $request->getVar('icon'),
			'isi' => $request->getVar('isi'),
			'link' => $request->getVar('link')
		];

		if ($this->kontakModel->save($data) === false) {
			session()->setFlashdata("errors", $this->kontakModel->errors());
			return redirect()->back()->withInput();
		} else {
			session()->setFlashdata("pesan", "Data Kontak Berhasil Ditambahkan");
			return redirect()->to("/admin/kontak/");
		}
	}

	public function updateKontak()
	{
		$request = $this->request;

		$data = [
			'id' => $request->getVar('id'),
			'nama' => $request->getVar('nama'),
			'icon' => $request->getVar('icon'),
			'isi' => $request->getVar('isi'),
			'link' => $request->getVar('link')
		];

		if ($this->kontakModel->save($data) === false) {
			session()->setFlashdata("errors", $this->kontakModel->errors());
			return redirect()->back()->withInput();
		} else {
			session()->setFlashdata("pesan", "Data Kontak Berhasil Diubah");
			return redirect()->to("/admin/kontak/");
		}
	}

	public function deleteKontak()
	{
		$id = $this->request->getVar("id");

		if ($this->request->getMethod() == 'delete') {
			$this->kontakModel->delete(['id' => $id]);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	//--------------------------------------------------------------------

}
