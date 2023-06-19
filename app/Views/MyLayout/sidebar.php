<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu div-menu">
            <div class="nav">
                <br>
                    <a class="nav-link" href="<?= base_url() ?>/dashboard">
                        <div class="sb-nav-link-icon">
                            <i class="fa-fw fa-solid fa-gauge"></i>
                        </div>
                        Dashboard
                    </a>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="produkDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="sb-nav-link-icon">
                                    <i class="fa-fw fa-brands fa-product-hunt"></i>
                                </div>
                                Produk
                            </a>
                            <div class="dropdown-menu" aria-labelledby="produkDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>/produk">Produk</a>
                                <a class="dropdown-item" href="<?= base_url() ?>/data-produk">Data Produk</a>
                            </div>
                        </div>
            </div>
        </div>
        <div class="sb-sidenav-footer py-1">
            <div class="small">Masuk sebagai :</div>
            <?= user()->email ?>
        </div>
    </nav>
</div>