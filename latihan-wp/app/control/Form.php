<?php

class Form extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Data';
        $this->view('template/header', $data);
        $this->view('form/index', $data);
        $this->view('template/footer');
    }

    public function add()
    {
        if ($_POST) {
            $file = new FileUpload();
            $UpResult = $file->UploadFile($_FILES['photo']);
            $data = $_POST;
            $data['id'] = date('YmdHis');
            $data['foto'] = 'default.jpg';
            if ($UpResult['status'] > 0) {
                if ($UpResult['file'] != null) {
                    $data['foto'] = $UpResult['file'];
                }
                if ($this->model('ProdukModel')->addProduk($data) > 0) {
                    Redirect();
                } else {
                    echo 'Failed Insert';
                }
            } else {
                echo 'Failed Upload';
            }
        } else {
            Redirect('form');
        }
    }

    public function edit($id = '')
    {
        if ($id != '') {
            $data['produk'] = $this->model('BasicModel')->getWhere('produk', 'kode', $id);
            $data['title'] = 'Edit ' . $data['produk']['nama'];
            $this->view('template/header', $data);
            $this->view('form/edit', $data);
            $this->view('template/footer');
        } else {
            Redirect();
        }
    }

    public function delete($id = '')
    {
        if ($id != '') {
            $DataProduk = $this->model('BasicModel')->getWhere('produk', 'kode', $id);
            if ($this->model('BasicModel')->deleteRecord('produk', 'kode', $id) > 0) {
                if ($DataProduk['foto'] != 'default.jpg') {
                    $file = new FileUpload();
                    $file->DeleteFile($DataProduk['foto']);
                }
                Redirect();
            } else {
                echo 'Failed Delete';
            }
        } else {
            Redirect();
        }
    }

    public function savedit($id = '')
    {
        if ($id != '') {
            if ($_POST) {
                $file = new FileUpload();
                $UpResult = $file->UploadFile($_FILES['photo']);
                $OldPhoto = $_POST['oldphoto'];
                $data = $_POST;
                $data['id'] = $id;
                $data['foto'] = $OldPhoto;
                if ($UpResult['status'] > 0) {
                    if ($UpResult['file'] != null) {
                        $data['foto'] = $UpResult['file'];
                        if ($OldPhoto != 'default.jpg') {
                            $file->DeleteFile($OldPhoto);
                        }
                    }
                    if ($this->model('ProdukModel')->updateProduk($data) > 0) {
                        Redirect();
                    } else {
                        echo 'Failed Update';
                    }
                } else {
                    echo 'Failed Upload';
                }
            } else {
                Redirect('form/edit/' . $id);
            }
        } else {
            Redirect();
        }
    }
}
