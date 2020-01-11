<div class="container-fluid bg-lp3i-gradient py-3">
    <div class="container">
        <div class="card shadow-lg mb-3">
            <div class="card-body">
                <div class="text-center">
                    <a href="<?= BaseURL('form'); ?>" class="btn btn-success">
                        <i class="fa fa-plus-square"></i> Tambah Produk
                    </a>
                </div>
            </div>
        </div>
        <div class="card shadow-lg">
            <div class="card-body row">
                <?php foreach ($data['produk'] as $Produk) : ?>
                    <div class="col-lg-6 px-2 py-2">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="<?= BaseURL('image/photo/' . $Produk['foto']); ?>" class="card-img" alt="<?= $Produk['nama']; ?>">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="text-right pb-2">
                                            <a href="<?= BaseURL('form/edit/' . $Produk['kode']); ?>" class="btn btn-sm btn-outline-secondary mr-1">Edit</a>
                                            <button id="<?= $Produk['kode'] . '@@' . $Produk['nama']; ?>" class="btn btn-sm btn-outline-danger delz">Delete</button>
                                        </div>
                                        <h5 class="card-title title-color"><?= $Produk['nama']; ?></h5>
                                        <p class="card-text">
                                            <span class="font-qs word-lp3i-fade">Kategori </span>
                                            <span class="font-qs"><?= $Produk['kategori']; ?></span><br>
                                            <span class="font-qs word-lp3i-fade">Harga </span>
                                            <span class="font-qs">Rp. <?= $Produk['harga']; ?>,-</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script>
    const BaseURL = "<?= BaseURL(); ?>";
</script>
<script src="<?= BaseURL('jscript/home/func.home.js'); ?>"></script>