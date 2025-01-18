<div class="page-header" style="background-color: #12123a; color: white;">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4 style="color: white;">Manajemen Kelas</h4>
            </div>
            <p>Home / Manajemen Kelas</p>
        </div>
    </div>
</div>

<div class="page-header" style="background-color: #12123a; color: white;">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div>
                <h4 style="color: white;" class="h4 text-blue mb-30">Modul</h4>
            </div>

        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <a href="/tambah_modul/<?php echo @$idnya ?>"><button type="button" class="btn btn-primary btn-sm">Tambah Modul</button></a>
        </div>
    </div>
</div>
<div class="page-header" style="background-color: #12123a; color: white;">
    <div class="container">
        <div class="row">

            <?php foreach ($data_modul as $modul) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color:rgb(27, 27, 72);">
                        <img style="height: 200px;" class="card-img-top" src="<?= asset('foto_modul/' . $modul->foto) ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $modul->judul ?></h5>
                            <p class="card-text"><?= $modul->sub_deskripsi ?></p>

                            <!-- Row untuk tombol -->
                            <div class="row">
                                <div class="col-6">
                                    <a href="/modul/edit/<?= $modul->id ?>" class="btn btn-primary btn-block">Edit</a>
                                </div>
                                <div class="col-6">
                                    <a href="/lihat/modul/<?= $modul->id ?>" class="btn btn-secondary btn-block">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="page-header" style="background-color: #12123a; color: white;">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div>
                <h4 style="color: white;" class="h4 text-blue mb-30">Quiz</h4>
            </div>

        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahQuizModal">
                Tambah Quiz
            </button>

        </div>
    </div>
</div>


<div class="page-header" style="background-color: #12123a; color: white;">
    <div class="container">
        <div class="row">
            <?php foreach ($data_quiz as $modul) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color:rgb(27, 27, 72);">
                        <img style="height: 300px;" class="card-img-top" src="<?= asset('contoh.png') ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $modul->nama ?></h5>
                            <div class="row">
                                <div class="col-6">
                                    <a href="/in/pertanyaan/<?= $modul->id ?>" class="btn btn-primary btn-block">Tambahkan</a>
                                </div>
                                <div class="col-6">
                                    <a href="/edit/pertanyaan/<?= $modul->id ?>" class="btn btn-secondary btn-block">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>































<!-- Modal Tambah Quiz -->
<div class="modal fade" id="tambahQuizModal" tabindex="-1" role="dialog" aria-labelledby="tambahQuizModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tambahQuizModalLabel">Tambah Quiz</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menambah quiz -->
                <form action="{{ route('tambah/quiz') }}" method="post">
                    @csrf
                    <input type="number" hidden name="idnya" value="<?php echo @$idnya ?>">
                    <div class="form-group">
                        <label for="namaQuiz">Nama Quiz</label>
                        <input type="text" id="namaQuiz" name="nama" required class="form-control" placeholder="Masukkan nama quiz">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>