<div class="page-header" style="background-color:rgb(48, 48, 100); color: white;">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4 style="color: white;">Ruang Kelas</h4>
            </div>
            <p>Ruang Kelas / <?php echo @$data_kelas->nama ?></p>
        </div>
    </div>
</div>
<div class="page-header" style="background-color:rgb(48, 48, 100); color: white;">
    <div class="container">
        <div class="row">

            <?php foreach ($data_modul as $modul) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color:rgb(75, 75, 135); color: white;">
                        <img style="height: 200px;" class="card-img-top" src="<?= asset('foto_modul/' . $modul->foto) ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 style="color: white;" class="card-title"><?= $modul->judul ?></h5>
                            <p class="card-text"><?= $modul->sub_deskripsi ?></p>

                            <!-- Row untuk tombol -->
                            <center>
                                <div>

                                    <div class="col-6">
                                        <a href="/lihat/modul/<?= $modul->id ?>" class="btn btn-secondary btn-success">Lihat</a>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="page-header" style="background-color:rgb(48, 48, 100); color: white;">
    <div class="container">
        <div class="row">

            <?php foreach ($data_quizx as $modul2) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color:rgb(75, 75, 135); color: white;">
                        <img style="height: 300px;" class="card-img-top" src="<?= asset('contoh.png') ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 style="color: white;" class="card-title"><?= $modul2->nama ?></h5>

                            <center>
                                <div>
                                    <div class="col-6">
                                        <?php if ($modul2->is_done == true): ?>
                                            <!-- Tombol untuk membuka modal -->
                                            <a href="/hasil/quiz/<?= $modul2->id ?>" class="btn btn-secondary">Di Kerjakan</a>
                                        <?php else: ?>
                                            <a href="/isi/quiz/<?= $modul2->id ?>" class="btn btn-success">Kerjakan</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>

             
            <?php endforeach; ?>

        </div>
    </div>
</div>



@if($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif