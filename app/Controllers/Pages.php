<?php

namespace App\Controllers;

use App\Models\galeriModel;
use App\Models\keuanganModel;
use App\Models\profileModel;
use App\Models\kepengurusanModel;
use App\Models\kontakModel;

class Pages extends BaseController
{

	public function keuangan()
	{
		$request = $this->request;
		$keuanganModel = new keuanganModel();

		$keuanganModel->setRangeTanggal($request->getVar("tgl_awal"), $request->getVar("tgl_akhir"));
		$data = [
			'title' => "Laporan - Keuangan | Masjid As-Salam",
			'data' => $keuanganModel->getAllData(),
			'total_pemasukan' => $keuanganModel->getDataPemasukan(),
			'total_pengeluaran' => $keuanganModel->getDataPengeluaran(),
			'balance' => $keuanganModel->getBalance(),
			'last_update' => $keuanganModel->getDateLastUpdate(),
			'tanggal' => $keuanganModel->getRangeTanggal(),
			'page' => 'Laporan'
		];
		return view('pages/keuangan', $data);
	}

	public function profile()
	{
		$profileModel = new profileModel();
		$kepengurusanModel = new kepengurusanModel();
		$kontakModel = new kontakModel();

		$data = [
			'title' => "Profile & Kontak | Masjid As-Salam",
			'profile' => $profileModel->getData(),
			'last_update_profile' => $profileModel->getDateLastUpdate(),
			'page' => 'Uncategorized',
			'kepengurusan' => $kepengurusanModel->getAllData(),
			'last_update_kepengurusan' => $kepengurusanModel->getDateLastUpdate(),
			'kontak' => $kontakModel->getAllData(),
			'last_update_kontak' => $kontakModel->getDateLastUpdate()
		];
		return view('pages/profile', $data);
	}

	public function galeri()
	{
		$galeriModel = new galeriModel();

		$data = [
			'title' => "Galeri | Masjid As-Salam",
			'data' => $galeriModel->getAllData(),
			'last_update' => $galeriModel->getDateLastUpdate(),
			'page' => 'Uncategorized'
		];
		return view('pages/gallery', $data);
	}
	//--------------------------------------------------------------------

}
