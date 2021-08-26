<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class customerFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session('username')) {
            if (session('role_id') == 2) {
                return redirect()->to('/customer');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}