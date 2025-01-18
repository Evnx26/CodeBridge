
<div class="card-box pd-20 height-100-p mb-30" style="background-color: #12123a;">
    <div class="container">
        <a href="#">
            <p style="color: white; font-style: italic; font-weight: bold; ">Kelas Aktif Kamu</p>
        </a>

        <div class="row">
    <!-- Form Pencarian -->
    <div class="col-md-12 mb-4">
       
    </div>
</div>


<div class="row">
    <!-- Tampilkan pesan jika data kosong -->
    @if($data_kelas->isEmpty())
        <div class="col-12">
            <p style="color: white; text-align: center;">Tidak ada kelas yang ditemukan.</p>
        </div>
    @else
        <!-- Loop data kelas -->
        <?php foreach ($data_kelas as $modul) : ?>
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color:rgb(48, 48, 100);">
                    <img style="height: 200px;" class="card-img-top" src="<?= asset('foto_kelas/' . $modul->foto_kelas) ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="color: white;"><?= $modul->nama_kelas ?></h5>
                        <p class="card-text" style="color: white;"><?= $modul->deskripsi ?></p>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a href="/ruang/kelas/<?= $modul->id_kelas ?>" class="btn btn-primary btn-block">Buka Kelas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    @endif
</div>
        <!-- pagination -->
        
      
       
    </div>
</div>
</div>
</div>
