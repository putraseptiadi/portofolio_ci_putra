<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Santri extends ResourceController
{
    public function __construct()
    {
        $this->model = new \App\Models\User();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $dataSantri = $this->model->where('role', 'santri')->findAll();
        return view('santri/index', ['santri' => $dataSantri]);
    }
    

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $dataSantri = $this->model->where('id',$id)->first();
        return view('santri/show',['santri' => $dataSantri]);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('santri/form-tambah');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
{
    $data = [
        'name'            => $this->request->getPost('name'),
        'tempat_asal'     => $this->request->getPost('tempat_asal'),
        'tanggal_lahir'   => $this->request->getPost('tanggal_lahir'),
        'email'           => $this->request->getPost('email'),
        'password'        => password_hash('pass1234', PASSWORD_BCRYPT),
        'role'            => 'santri'
    ];

    $this->model->insert($data);

    return redirect()->to(base_url('santri'));
}


    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
{
    $dataSantri = $this->model->where('id', $id)->first();
    return view('santri/form-ubah', ['santri' => $dataSantri]);
}

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
{
    if (!$id) {
        return redirect()->back();
    }

    $data = [
        'name'          => $this->request->getVar('name'),
        'tempat_asal'   => $this->request->getVar('tempat_asal'),
        'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
        'email'         => $this->request->getVar('email'),
    ];

    $this->model->where('id', $id)->set($data)->update();

    return redirect()->to(base_url('santri'));
}


    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->delete($id);
        return redirect()->to(base_url('santri'));
    }
}

