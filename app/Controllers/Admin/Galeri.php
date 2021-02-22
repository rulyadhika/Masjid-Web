<?php

namespace App\Controllers\Admin;

use App\Models\galeriModel;
use App\Controllers\BaseController;


class Galeri extends BaseController
{
    protected $galeriModel;
    protected $image;

    public function __construct()
    {
        $this->galeriModel = new galeriModel();
        $this->image = \Config\Services::image();
    }

    public function index()
    {
        $data = [
            'title' => "Admin - Kelola Galeri | Masjid As-Salam",
            'menuTitle' => "Kelola Galeri",
            'sub_menu' => 'Galeri',
            'parent_menu' => 'Lainnya',
            'data' => $this->galeriModel->getAllData(),
        ];
        return view('admin/lainnya/galeri', $data);
    }

    public function getSingleData()
    {
        $id = $this->request->getVar("id");
        if ($this->request->isAJAX()) {
            return json_encode($this->galeriModel->getDataById($id));
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }

    public function insertGaleri()
    {
        $request = $this->request;

        $validationRules = [
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan masukan keterangan terlebih dahulu'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,1024]|mime_in[gambar,image/jpg,image/jpeg]|is_image[gambar]',
                'errors' => [
                    'uploaded' => 'Silahkan masukan gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar maksimal 1MB!',
                    'mime_in' => 'Silahkan upload gambar dengan ekstensi yang telah ditentukan!',
                    'is_image' => 'Yang anda upload bukan gambar!'
                ]
            ]
        ];
        $this->galeriModel->setValidationRules($validationRules);

        $gambar = $request->getFile("gambar");
        $newName = $gambar->getRandomName();

        $data = [
            'keterangan' => $request->getVar('keterangan'),
            'gambar' => $newName
        ];

        if ($this->galeriModel->save($data) === false) {
            session()->setFlashdata("errors", $this->galeriModel->errors());
            return redirect()->back()->withInput();
        } else {
            // move original file
            $gambar->move("asset/images/gallery/", $newName);

            // Make a copy and lower image size for small thumbnail
            $this->image->withFile("asset/images/gallery/".$newName)
            ->resize(640, 360, true, 'height')
            ->save("asset/images/gallery/small_thumbnail/".$newName);

            session()->setFlashdata("pesan", "Data Galeri Berhasil Ditambahkan");
            return redirect()->to("/admin/galeri/");
        }
    }

    public function updateGaleri()
    {
        $request = $this->request;
        $oldData = $this->galeriModel->getDataById($request->getVar("id"));

        // jika user tidak merubah gambar
        if($request->getFile("gambar")->getError()==4){
            $namaGambar = $oldData['gambar'];
        }else{
            // jika user merubah gambar
            $gambar = $request->getFile("gambar");
            $namaGambar = $gambar->getRandomName();

            unlink("asset/images/gallery/".$oldData['gambar']);
            unlink("asset/images/gallery/small_thumbnail/".$oldData['gambar']);
        }


        $validationRules = [
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan masukan keterangan terlebih dahulu'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|mime_in[gambar,image/jpg,image/jpeg]|is_image[gambar]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 1MB!',
                    'mime_in' => 'Silahkan upload gambar dengan ekstensi yang telah ditentukan!',
                    'is_image' => 'Yang anda upload bukan gambar!'
                ]
            ]
        ];
        $this->galeriModel->setValidationRules($validationRules);

        $data = [
            'id'=>$request->getVar("id"),
            'keterangan' => $request->getVar('keterangan'),
            'gambar' => $namaGambar
        ];

        if ($this->galeriModel->save($data) === false) {
            session()->setFlashdata("errors", $this->galeriModel->errors());
            return redirect()->back()->withInput();
        } else {
            // jika user merubah gambar
            if($namaGambar!=$oldData['gambar']){
                // move original file
                $gambar->move("asset/images/gallery/", $namaGambar);

                // Make a copy and lower image size for small thumbnail
                $this->image->withFile("asset/images/gallery/".$namaGambar)
                ->resize(640, 360, true, 'height')
                ->save("asset/images/gallery/small_thumbnail/".$namaGambar);
            }

            session()->setFlashdata("pesan", "Data Galeri Berhasil Diubah");
            return redirect()->to("/admin/galeri/");
        }
    }

    public function deleteGaleri()
    {
        $id = $this->request->getVar("id");
        $oldData = $this->galeriModel->getDataById($id);

        if ($this->request->getMethod() == 'delete') {
            $this->galeriModel->delete(['id' => $id]);

            unlink("asset/images/gallery/".$oldData['gambar']);
            unlink("asset/images/gallery/small_thumbnail/".$oldData['gambar']);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }

    //--------------------------------------------------------------------

}