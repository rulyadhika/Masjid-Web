<?php namespace App\Controllers;

use CodeIgniter\I18n\Time;
use \go2hi\go2hi;

class JadwalShalat extends BaseController
{
    
	public function getJadwalShalat($type=null){
		// $this->request->uri->getHost()
		if($this->request->isAJAX()){
			
		$client = \Config\Services::curlrequest();
		$dateToRequest = [Time::today()->toDateString(),Time::tomorrow()->toDateString()];
		$data = [];

		//request penuh data jadwal
		if($type=='full'){
			foreach($dateToRequest as $date){
				$data[] = $this->fetchDataJadwal($client,$date);
			}
		}else{
			// request jadwal parsial
			$data[] = $this->fetchDataJadwal($client,$dateToRequest[0]);
		}

		return json_encode($data);
	}else{
			return view("errors/html/error_404");
		}
	}

	private function fetchDataJadwal($client,$tgl){
		$response = json_decode($client->get("https://api.banghasan.com/sholat/format/json/jadwal/kota/707/tanggal/$tgl")->getBody(),true);
		$response['query']['tanggal_masehi'] = Time::parse($response['query']['tanggal'])->toLocalizedString('d MMMM yyy');
		$response['query']['tanggal_hijriah'] = go2hi::date('d F Y', go2hi::GO2HI_HIJRI, strtotime($response['query']['tanggal']));

		return $response;
	}

	//--------------------------------------------------------------------

}