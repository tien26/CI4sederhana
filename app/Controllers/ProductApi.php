<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductModel;

class ProductApi extends ResourceController
{
    protected $modelName = 'App\Models\Photos';
    protected $format    = 'json';
    protected $M_product;

    public function __construct()
    {
        $this->M_product = new ProductModel();
        $this->validation =\Config\Services::validation();
    }

    public function index()
    {
        return $this->respond($this->M_product->findAll());
    }

    public function create()
    {
        $product = [
            'kd_product' => $this->request->getVar('kd_product'),
            'nm_product' => $this->request->getVar('nm_product'),
            'stok' => $this->request->getVar('stok'),
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga')
        ];
        $this->validation->run($product, 'registerApi');
        $error = $this->validation->getErrors();

        if ($error) {
            return $this->fail($error);
        }
        $this->M_product->save($product);

        if ($this->M_product->save($product)) {
            return $this->respondCreated($product, 'Product Created');
        }
    }

}