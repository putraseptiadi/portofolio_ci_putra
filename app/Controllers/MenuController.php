<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MenuController extends BaseController
{
    public function home()
    {
        return view('home');
    }
    public function infokegiatan()
    {
        return view('info-kegiatan');
    }
    public function dataSantri()
    {
        return view('santri');
    }
}
