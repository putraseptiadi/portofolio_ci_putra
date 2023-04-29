<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->model = new \App\Models\User(); // Perbaiki namespace model
    }

    public function registrasi()
    {
        return view('registrasi');
    }

    public function login()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    public function simpanRegistrasi()
{
    //1. mengambil data dari input form
    $data = [
        'nama'                  => $this->request->getPost('nama'), // Menggunakan getPost() untuk mengambil data POST
        'tempat_asal'                  => $this->request->getPost('tempat_asal'),
        'tanggal_lahir'                  => $this->request->getPost('tanggal_lahir'),
        'email'                 => $this->request->getPost('email'),
        'password'              => $this->request->getPost('password'),
        'konfirmasi_password'   => $this->request->getPost('konfirmasi_password')
    ];

    //2. validasi input form
    $validation = \Config\Services::validation(); // Menggunakan \Config\Services::validation() untuk memanggil instance validation

    $validation->setRules([
        'nama'                      => 'required',
        'tempat_asal'                      => 'required',
        'tanggal_lahir'                      => 'required',
        'email'                     => 'required|valid_email|is_unique[users.email]',
        'password'                  => 'required|min_length[8]',
        'konfirmasi_password'       => 'required|matches[password]'
    ]);

    //3. cek validasi
    if ($validation->run($data)) {
        //jika berhasil, simpan data dan beri pesan berhasil
        $this->model->save([
            'name'          => $data['nama'],
            'tempat_asal'          => $data['tempat_asal'],
            'tanggal_lahir'          => $data['tanggal_lahir'],
            'email'         => $data['email'],
            'password'      => password_hash($data['password'], PASSWORD_BCRYPT),
            'role'          => 'santri'
        ]);

        return redirect()->to(base_url('registrasi'))->with('sukses', 'Registrasi berhasil !');
    } else {
        //jika gagal, beri pesan gagal
        $errorMessages = $validation->getErrors(); // Menggunakan getErrors() untuk mengambil pesan error
        return redirect()->to(base_url('registrasi'))->with('gagal', $errorMessages);
    }
}

public function prosesLogin()
{
    // validasi form login
    if ($this->validate($this->rulesLogin())) {
        // mencari user dengan email yang diberikan di database
        $query = $this->model->where('email', $this->request->getpost('email'));
        $count = $query->countAllResults(false);
        $data = $query->get()->getRow();

        if ($count > 0) { // jika user ditemukan di database
            $hashPassword = $data->password;
            // verifikasi password yang dimasukkan dengan hash password di database
            if (password_verify($this->request->getpost('password'), $hashPassword)) {
                // jika password cocok, set session untuk user dan redirect ke halaman home
                $session = [
                    'role' => $data->role,
                    'logged_in' => TRUE
                ];
                session()->set($session);
                return redirect()->to(base_url('home'));
            } else { // jika password salah
                return redirect()->to(base_url('login'))->with('login_failed', 'Username / password anda salah');
            }
        } else { // jika user tidak ditemukan di database
            return redirect()->to(base_url('login'))->with('login_failed', 'Username tidak ditemukan');
        }
    } else { // jika form login tidak valid
        return redirect()->to(base_url('login'))->withInput();
    }
}

public function rulesLogin()
{
    $setRules = [
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email harus diisi',
                'valid_email' => 'Email anda tidak valid',
            ]
        ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi',
                ]
            ]
                ];
                return $setRules;
}
public function logout()
{
    session()->destroy();
    return redirect()->to('/login');
}
}

