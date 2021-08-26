<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
	protected $table ='product';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_product','nm_product','stok','kategori','harga','gambar'];

    public function getProduct($id)
    {
        return $this->where(['id'=> $id])->first();
    }
}
