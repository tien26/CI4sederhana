<?php

namespace App\Controllers;
use App\Models\usersModel;
use App\Models\ProductModel;

class Frontend extends BaseController
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
            'product' => $this->M_product->findAll()
        ];
		return view('/frontend/index.php',$data);
	}
    
    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('frontend/register.php',$data);
    }

	public function saveRegister()
	{
		if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Textbox {field} harus di isi.'
                ]
                ],
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Textbox {field} harus di isi.',
                    'is_unique' => 'Textbox {field} sudah terdaftar.'
                ]
            ],
            'pass' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Textbox {field} harus di isi.',
                    'min_length' => 'Password terlalu pendek.'
                ]
            ],
            'kpass' => [
                'rules' => 'required|matches[pass]',
                'errors' => [
                    'required' => 'Textbox {field} harus di isi.',
                    'matches' => 'Konfirmasi password tidak sama'
                ]
			],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Textbox {field} harus di isi.'
                ]
			]
			])) {
            return redirect()->to('/frontend/register')->withInput();
        }
        $pass = password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT);
        $this->M_user->save([
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => $pass,
            'alamat' => $this->request->getVar('alamat'),
            'role_id' => '2'
        ]);

        session()->setFlashdata('pesan','Data berhasil ditambahkan.');

        return redirect()->to('/frontend/register');
	}

    public function login()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('frontend/login.php',$data);
    }

    public function prosesLogin()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus disi.'
                ]
                ],
            'pass' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus disi.'
                ]
            ]
            
        ])) {
            return redirect()->to('frontend/login')->withInput();
        }
        $login = new usersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('pass');
        $cek = $login->getLogin($username);

        if ($cek) {
            if (password_verify($password, $cek['password'])) {
                if ($cek['role_id'] == 1) {
                    session()->set([
                    'id'=>$cek['id'],
                    'nama' => $cek['nama'],
                    'username' => $cek['username'],
                    'alamat' => $cek['alamat'],
                    'role_id' => $cek['role_id']
                ]);
                session()->setFlashdata('pesan','Berhasil Login.');
                return redirect()->to('/backend');
                }else {
                     session()->set([
                    'id'=>$cek['id'],
                    'nama' => $cek['nama'],
                    'username' => $cek['username'],
                    'alamat' => $cek['alamat'],
                    'role_id' => $cek['role_id']
                ]);
                session()->setFlashdata('pesan','Berhasil Login.');
                return redirect()->to('/customer');
                }
                
            }else {
            session()->setFlashdata('error','Password salah.');
            return redirect()->to('frontend/login');
            }
        }else {
            session()->setFlashdata('error','Data Tidak Ditemukan.');
            return redirect()->to('frontend/login');
        }

    }
    
}
