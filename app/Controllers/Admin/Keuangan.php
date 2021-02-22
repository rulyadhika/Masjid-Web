<?php

namespace App\Controllers\Admin;

use App\Models\keuanganModel;
use App\Controllers\BaseController;


class Keuangan extends BaseController
{
	protected $keuanganModel;
	protected $db;

	public function __construct()
	{
		$this->keuanganModel = new keuanganModel();
		$this->db = \Config\Database::connect();
	}

	public function index()
	{
		$request = $this->request;

		$this->keuanganModel->setRangeTanggal($request->getVar("tgl_awal"), $request->getVar("tgl_akhir"));
		$data = [
			'title' => "Admin - Kelola Keuangan | Masjid As-Salam",
			'menuTitle' => "Kelola Keuangan",
			'sub_menu' => 'Keuangan',
			'parent_menu' => 'Kelola Laporan',
			'data' => $this->keuanganModel->getAllData(),
			'total_pemasukan' => $this->keuanganModel->getDataPemasukan(),
			'total_pengeluaran' => $this->keuanganModel->getDataPengeluaran(),
			'balance' => $this->keuanganModel->getBalance(),
			'tanggal' => $this->keuanganModel->getRangeTanggal()
		];
		return view('admin/lainnya/keuangan', $data);
	}

	public function getSingleData()
	{
		$id = $this->request->getVar("id");
		if ($this->request->isAJAX()) {
			return json_encode($this->keuanganModel->getDataById($id));
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function insertKeuangan()
	{
		$request = $this->request;

		$data = [
			'keterangan' => $request->getVar('keterangan'),
			'status' => $request->getVar('status'),
			'nominal' => $request->getVar('nominal'),
			'tanggal' => $request->getVar('tanggal')
		];

		if ($this->keuanganModel->save($data) === false) {
			session()->setFlashdata("errors", $this->keuanganModel->errors());
			return redirect()->back()->withInput();
		} else {
			session()->setFlashdata("pesan", "Data Keuangan Berhasil Ditambahkan");
			return redirect()->to("/admin/keuangan/");
		}
	}

	public function updateKeuangan()
	{
		$request = $this->request;

		$data = [
			'id' => $request->getVar("id"),
			'keterangan' => $request->getVar('keterangan'),
			'status' => $request->getVar('status'),
			'nominal' => $request->getVar('nominal'),
			'tanggal' => $request->getVar('tanggal')
		];

		if ($this->keuanganModel->save($data) === false) {
			session()->setFlashdata("errors", $this->keuanganModel->errors());
			return redirect()->back()->withInput();
		} else {
			session()->setFlashdata("pesan", "Data Keuangan Berhasil Diubah");
			return redirect()->to("/admin/keuangan/");
		}
	}

	public function deleteKeuangan()
	{
		$id = $this->request->getVar("id");

		if ($this->request->getMethod() == 'delete') {
			$this->keuanganModel->delete(['id' => $id]);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	//--------------------------------------------------------------------

}
