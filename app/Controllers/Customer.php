<?php

namespace App\Controllers;
use App\Models\usersModel;
use App\Models\ProductModel;

class Customer extends BaseController
{
    protected $M_user;

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
		return view('/customer/index.php',$data);
	}
    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('frontend/register.php',$data);
    }

    public function logout()
    {
        session_destroy();
        return redirect()->to('/');
    }
}