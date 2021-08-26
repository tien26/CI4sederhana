<?php

namespace App\Controllers;
use App\Models\usersModel;
use App\Models\ProductModel;

class Backend extends BaseController
{
    protected $M_user;
    protected $M_product;

    public function __construct()
    {
        $this->M_user = new usersModel();
        $this->M_product = new ProductModel();
        
    }
	public function index()
	{
		$data = [
			'user' => $this->M_user->countAll() ,
			'product' => $this->M_product->countAll() 
		];
		return view('/backend/index.php',$data);
	}

	public function user()
	{
		$data = [
			'user' => $this->M_user->findAll()
		];
		return view('/backend/dUser.php',$data);
	}

    public function deleteUser($id)
    {
        $this->M_user->delete($id);
        session()->setFlashdata('pesan','Data berhasil dihapus.');

        return redirect()->to('/backend/user');
    }   

	public function product()
	{
		$data = [
            'validation' => \Config\Services::validation(),
            'product' => $this->M_product->findAll()
        ];
		return view('/backend/dProduct.php',$data);
	}
	
	public function addProduct()
	{
		$data = [
            'validation' => \Config\Services::validation()
        ];
		return view('/backend/addProduct.php',$data);
	}

	public function saveproduct()
	{
		if (!$this->validate([
            'kd_product' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Textbox kode product harus di isi.'
                ]
                ],
            'nm_product' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Textbox nama product harus di isi.'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Textbox {field} harus di isi.'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Textbox {field} harus di isi.'
                ]
			],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Textbox {field} harus di isi.'
                ]
			],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
                ]
			])) {
            return redirect()->to('/backend/addProduct')->withInput();
        }

        // ambil gambar
        $gambar= $this->request->getFile('gambar');
        // cek gambar
        if ($gambar->getError() == 4) {
            $nmgambar = 'default.jpg';
        }else {
            // nama gambar random
            $nmgambar = $gambar->getRandomName();
            // pindahkan file ke folder img
            $gambar->move('img', $nmgambar);
        }

        $this->M_product->save([
            'kd_product' => $this->request->getVar('kd_product'),
            'nm_product' => $this->request->getVar('nm_product'),
            'stok' => $this->request->getVar('stok'),
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'gambar' => $nmgambar
        ]);

        session()->setFlashdata('pesan','Data berhasil ditambahkan.');

        return redirect()->to('/backend/product');
	}

    public function editProduct($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'product' => $this->M_product->getProduct($id)
        ];
        return view('Backend/editProduct',$data);
    }
    
    public function updateProduct($id)
    {
        if (!$this->validate([
            'kd_product' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Textbox kode product harus di isi.'
                ]
                ],
            'nm_product' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Textbox nama product harus di isi.'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Textbox {field} harus di isi.'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Textbox {field} harus di isi.'
                ]
			],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Textbox {field} harus di isi.'
                ]
			],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
                ]
			])) {
            return redirect()->to('/backend/editProduct')->withInput();
        }

        // ambil gambar
        $gambar= $this->request->getFile('gambar');
        // cek gambar
        if ($gambar->getError() == 4) {
            $nmgambar = $this->request->getVar('gambarLama');
        }else {
            // nama gambar random
            $nmgambar = $gambar->getRandomName();
            // pindahkan file ke folder img
            $gambar->move('img', $nmgambar);
            if ($this->request->getVar('gambarlama') !== 'default.jpg') {
                unlink('img/'. $this->request->getVar('gambarlama'));
            }
        }

        $this->M_product->save([
            'id' => $id,
            'kd_product' => $this->request->getVar('kd_product'),
            'nm_product' => $this->request->getVar('nm_product'),
            'stok' => $this->request->getVar('stok'),
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'gambar' => $nmgambar
        ]);

        session()->setFlashdata('pesan','Data berhasil ditambahkan.');

        return redirect()->to('/backend/product');
    }
    public function deleteProduct($id)
    {
        // cari gambar $id
        $gambar = $this->M_product->find($id);
        // cek gambar default
        if ($gambar['gambar'] != 'default.jpg') {
            // hapus gambar
            unlink('img/' . $gambar['gambar']);
            }

        $this->M_product->delete($id);
        session()->setFlashdata('pesan','Data berhasil dihapus.');

        return redirect()->to('/backend/product');
    }

	public function payment()
	{
		return view('/backend/dPayment.php');
	}

    public function logout()
    {
        session_destroy();
        return redirect()->to('/');
    }

}