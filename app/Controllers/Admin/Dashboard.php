<?php namespace App\Controllers\Admin;

use App\Models\postsModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	protected $postModel;
	protected $db;

	public function __construct()
	{
		$this->postModel = new postsModel();
		$this->db = \Config\Database::connect();
	}

	public function index()
	{
		$data = [
			'title'=>"Admin | Masjid As-Salam",
			'menuTitle'=>"Dashboard",
			'parent_menu'=>'Dashboard'
		];
		return view('admin/dashboard',$data);
    }

	//--------------------------------------------------------------------

}