<?php namespace App\Controllers\Admin;

use App\Models\kepengurusanModel;
use App\Controllers\BaseController;


class Kepengurusan extends BaseController
{
	protected $kepengurusanModel;
	protected $db;

	public function __construct()
	{
		$this->kepengurusanModel = new kepengurusanModel();
		$this->db = \Config\Database::connect();
	}
	
    public function index(){
        $data = [
            'title'=>"Admin - Kelola Kepengurusan | Masjid As-Salam",
			'menuTitle'=>"Kelola Kepengurusan",
			'sub_menu'=>'Kepengurusan',
			'parent_menu'=>'Lainnya',
			'data'=>$this->kepengurusanModel->getAllData(),
		];
		return view('admin/lainnya/kepengurusan',$data);
	}

	public function getSingleData(){
		$id = $this->request->getVar("id");
		if($this->request->isAJAX()){
			return json_encode($this->kepengurusanModel->getDataById($id));
		}else{
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function insertKepengurusan(){
		$request = $this->request;

		$data = [
			'nama'=>$request->getVar('nama'),
			'jabatan' => $request->getVar('jabatan'),
		];
        
        if ($this->kepengurusanModel->save($data) === false){
			session()->setFlashdata("errors",$this->kepengurusanModel->errors());
			return redirect()->back()->withInput();
        }else{
            session()->setFlashdata("pesan","Data Kepengurusan Berhasil Ditambahkan");
            return redirect()->to("/admin/kepengurusan/");
        }
	}

	public function updateKepengurusan(){
		$request = $this->request;

		$data = [
			'id'=>$request->getVar("id"),
			'nama'=>$request->getVar('nama'),
			'jabatan' => $request->getVar('jabatan'),
		];
        
        if ($this->kepengurusanModel->save($data) === false){
			session()->setFlashdata("errors",$this->kepengurusanModel->errors());
			return redirect()->back()->withInput();
        }else{
            session()->setFlashdata("pesan","Data Kepengurusan Berhasil Diubah");
            return redirect()->to("/admin/kepengurusan/");
        }
	}

	public function deleteKepengurusan(){
		$id = $this->request->getVar("id");
		
		if($this->request->getMethod()=='delete'){
			$this->kepengurusanModel->delete(['id'=>$id]);
		}else{
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	//--------------------------------------------------------------------

}