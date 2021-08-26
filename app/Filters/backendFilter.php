<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class backendFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session('username')) {
            if (session('role_id') == 1) {
                return redirect()->to('/backend');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}