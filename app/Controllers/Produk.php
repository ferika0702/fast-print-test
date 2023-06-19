<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\Client;
use App\Models\ProdukModel;

class Produk extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    
    // public function index()
    // {
    //     $modelProduk = new ProdukModel();
    //     $produk = $modelProduk->findAll();

    //     $data = [
    //         'produk' => $produk
    //     ];
    //     // $apiUrl = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';
    //     // $data = json_decode(file_get_contents($apiUrl));

    //     return view('produk/index', $data);
    // }

    public function index()
    {
        $modelProduk = new ProdukModel();
        $produk = $modelProduk->findAll();

        $data = [
            'produk' => $produk
        ];

        return view('produk/index', $data);
    }

    private function getDataFromApi($apiUrl)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            die('Error: ' . $error);
        }

        $data = json_decode($response, true);

        return $data;
    }

    public function getProduk(){
        $apiUrl = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';
        $data = $this->getDataFromApi($apiUrl);

        $viewData = [
            'produk' => $data
        ];

        // var_dump($viewData);

        return view('produk/data-produk', $viewData);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        if ($this->request->isAJAX()){
            $modelProduk = new ProdukModel();
            $produk = $modelProduk->findAll();

            $data=[
                'produk' => $produk,
            ];

            $json=[
                'data' => view('produk/add', $data)
            ];
            echo json_encode($json);
        }else {
            return 'Tidak bisa load';
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if ($this->request->isAJAX()) {
            $validasi = [
                'nama_produk'       => [
                    'rules'  => 'required',
                    'errors' => [
                        'required'  => 'Nama Barang harus diisi.',
                    ]
                ],
                'harga'  => [
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'required'  => 'Keterangan harus diisi.',
                        'numeric'   => 'Harus diisi angka'
                    ]
                ],
                'kategori'  => [
                    'rules'  => 'required',
                    'errors' => [
                        'required'  => 'Kategori harus diisi.',
                    ]
                ],
                'status'  => [
                    'rules'  => 'required',
                    'errors' => [
                        'required'  => 'status harus diisi.',
                    ]
                ],
            ];

            if (!$this->validate($validasi)) {
                $validation = \Config\Services::validation();

                $error = [
                    'error_nama_produk' => $validation->getError('nama_produk'),
                    'error_harga'          =>$validation->getError('harga'),
                    'error_kategori'  => $validation->getError('kategori'),    
                    'error_status'  => $validation->getError('status')  
                ];

                $json = [
                    'error' => $error
                ];
            } else {
                $modelProduk = new ProdukModel();

                $data = [
                    'nama_produk'   => $this->request->getPost('nama_produk'),
                    'harga'   => $this->request->getPost('harga'),
                    'kategori'   => $this->request->getPost('kategori'),
                    'status'   => $this->request->getPost('status'),
                ];
                $modelProduk->save($data);

                $json = [
                    'success' => 'Berhasil menambah data produk'
                ];
            }
            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        if ($this->request->isAJAX()) {
            $modelProduk = new ProdukModel();
            $produk      = $modelProduk->find($id);

            $data = [
                'validation'    => \Config\Services::validation(),
                'produk'        => $produk
            ];

            $json = [
                'data' => view('produk/edit', $data)
            ];

            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if ($this->request->isAJAX()) {
            $validasi = [
                'nama_produk'       => [
                    'rules'  => 'required',
                    'errors' => [
                        'required'  => 'Nama Barang harus diisi.',
                    ]
                ],
                'harga'  => [
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'required'  => 'Keterangan harus diisi.',
                        'numeric'   => 'Harus diisi angka'
                    ]
                ],
                'kategori'  => [
                    'rules'  => 'required',
                    'errors' => [
                        'required'  => 'Kategori harus diisi.',
                    ]
                ],
                'status'  => [
                    'rules'  => 'required',
                    'errors' => [
                        'required'  => 'status harus diisi.',
                    ]
                ],
            ];

            if (!$this->validate($validasi)) {
                $validation = \Config\Services::validation();

                $error = [
                    'error_nama_produk' => $validation->getError('nama_produk'),
                    'error_harga'          =>$validation->getError('harga'),
                    'error_kategori'  => $validation->getError('kategori'),    
                    'error_status'  => $validation->getError('status')  
                ];

                $json = [
                    'error' => $error
                ];
            } else {
                $modelProduk = new ProdukModel();

                $data = [
                    'id_produk'=>$id,
                    'nama_produk'   => $this->request->getPost('nama_produk'),
                    'harga'   => $this->request->getPost('harga'),
                    'kategori'   => $this->request->getPost('kategori'),
                    'status'   => $this->request->getPost('status'),
                ];
                $modelProduk->save($data);

                $json = [
                    'success' => 'Berhasil update data produk'
                ];
            }
            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $modelProduk = new ProdukModel();
        $modelProduk->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->back();
    }
}
