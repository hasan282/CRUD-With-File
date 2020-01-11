<div class="container-fluid bg-lp3i-gradient py-3">
    <div class="container">
        <div class="card shadow-lg mb-3">
            <div class="card-body">
                <div class="container">
                    <a href="<?= BaseURL(); ?>" class="btn btn-success">
                        <i class="fa fa-home"></i> Home
                    </a>
                </div>
                <div class="card mx-3 my-3">
                    <form class="card-body px-5" method="POST" action="<?= BaseURL('form/add'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama Produk</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <?php $Kategori = $this->model('BasicModel')->getThisQuery('SELECT * FROM kategori'); ?>
                        <div class="form-group">
                            <label for="nama">Kategori</label>
                            <select name="kategori" id="kategori" name="kategori" class="form-control">
                                <option value="">-------</option>
                                <?php foreach ($Kategori as $ktg) : ?>
                                    <option value="<?= $ktg['id']; ?>"><?= $ktg['kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga">
                        </div>
                        <div class="form-group">
                            <label for="photo">Tambahkan Foto</label>
                            <input type="file" id="photo" name="photo" class="form-control">
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>