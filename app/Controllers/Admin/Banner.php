<?php

namespace App\Controllers\Admin;

use App\Models\bannerModel;
use App\Controllers\BaseController;


class Banner extends BaseController
{
    protected $bannerModel;
    protected $image;

    public function __construct()
    {
        $this->bannerModel = new bannerModel();
        $this->image = \Config\Services::image();
    }

    public function index()
    {
        $data = [
            'title' => "Admin - Kelola Banner | Masjid As-Salam",
            'menuTitle' => "Kelola Banner",
            'sub_menu' => 'Banner',
            'parent_menu' => 'Kelola Beranda',
            'data' => $this->bannerModel->getAllData(),
        ];
        return view('admin/beranda/banner', $data);
    }

    public function getSingleData()
    {
        $id = $this->request->getVar("id");
        if ($this->request->isAJAX()) {
            return json_encode($this->bannerModel->getDataById($id));
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }

    public function insertBanner()
    {
        $request = $this->request;

        $validationRules = [
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan masukan judul terlebih dahulu'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan masukan keterangan terlebih dahulu'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,1024]|mime_in[gambar,image/jpg,image/jpeg,image/png]|is_image[gambar]',
                'errors' => [
                    'uploaded' => 'Silahkan masukan gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar maksimal 1MB!',
                    'mime_in' => 'Silahkan upload gambar dengan ekstensi yang telah ditentukan!',
                    'is_image' => 'Yang anda upload bukan gambar!'
                ]
            ]
        ];
        $this->bannerModel->setValidationRules($validationRules);

        $gambar = $request->getFile("gambar");
        $newName = $gambar->getRandomName();

        $data = [
            'judul' => $request->getVar('judul'),
            'keterangan' => $request->getVar('keterangan'),
            'gambar' => $newName
        ];

        if ($this->bannerModel->save($data) === false) {
            session()->setFlashdata("errors", $this->bannerModel->errors());
            return redirect()->back()->withInput();
        } else {
            $gambar->move("asset/images/banner/", $newName);

            session()->setFlashdata("pesan", "Data Banner Berhasil Ditambahkan");
            return redirect()->to("/admin/banner/");
        }
    }

    public function updateBanner()
    {
        $request = $this->request;
        $oldData = $this->bannerModel->getDataById($request->getVar("id"));

        // jika user tidak merubah gambar
        if ($request->getFile("gambar")->getError() == 4) {
            $namaGambar = $oldData['gambar'];
        } else {
            // jika user merubah gambar
            $gambar = $request->getFile("gambar");
            $namaGambar = $gambar->getRandomName();

            unlink("asset/images/banner/" . $oldData['gambar']);
        }

        $validationRules = [
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan masukan judul terlebih dahulu'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan masukan keterangan terlebih dahulu'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|mime_in[gambar,image/jpg,image/jpeg,image/png]|is_image[gambar]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 1MB!',
                    'mime_in' => 'Silahkan upload gambar dengan ekstensi yang telah ditentukan!',
                    'is_image' => 'Yang anda upload bukan gambar!'
                ]
            ]
        ];
        $this->bannerModel->setValidationRules($validationRules);

        $data = [
            'id' => $request->getVar("id"),
            'judul' => $request->getVar('judul'),
            'keterangan' => $request->getVar('keterangan'),
            'gambar' => $namaGambar
        ];

        if ($this->bannerModel->save($data) === false) {
            session()->setFlashdata("errors", $this->bannerModel->errors());
            return redirect()->back()->withInput();
        } else {
            // jika user merubah gambar
            if ($namaGambar != $oldData['gambar']) {
                $gambar->move("asset/images/banner/", $namaGambar);
            }

            session()->setFlashdata("pesan", "Data Banner Berhasil Diubah");
            return redirect()->to("/admin/banner/");
        }
    }

    public function deleteBanner()
    {
        $id = $this->request->getVar("id");
        $oldData = $this->bannerModel->getDataById($id);

        if ($this->request->getMethod() == 'delete') {
            $this->bannerModel->delete(['id' => $id]);

            unlink("asset/images/banner/" . $oldData['gambar']);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }

    //--------------------------------------------------------------------

}
