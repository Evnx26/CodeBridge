<div class="card-box pd-20 height-100-p mb-30" style="background-color: #12123a;">
    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="https://cdn.dribbble.com/users/2585799/screenshots/6555657/__2_3_____.gif" style="width: 300px; height: 150px;" alt="tes ">
        </div>
        <div class="col-md-8">
            <h4 style="color: white;" class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back, <?php echo @$data->nama ?> <div class="weight-600 font-30 text-blue"><?php echo @$data->username ?></div>
            </h4>
            <p style="color: white;" class="font-18 max-width-600">CodeBridge</p>
        </div>
    </div>
</div>
<div class="card-box pd-20 height-100-p mb-30" style="background-color: #12123a;">
    <div class="container">
        <a href="#">
            <p style="color: white; font-style: italic; font-weight: bold; ">Kelas Rekomendasi</p>
        </a>
        <div class="row">
            <?php foreach ($data_kelas as $modul) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color:rgb(48, 48, 100);">
                        <img style="height: 200px;" class="card-img-top" src="<?= asset('foto_kelas/' . $modul->foto) ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title" style="color: white;"><?= $modul->nama ?></h5>
                            <p class="card-text" style="color: white;"><?= $modul->deskripsi ?></p>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <a href="/beli/kelas/<?= $modul->id ?>" class="btn btn-primary btn-block">Beli Kelas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <a href="/daftar/kelas" class="btn btn-primary btn-block">Temukan Lebih Banyak</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>