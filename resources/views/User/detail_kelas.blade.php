<div class="card-box pd-20 height-100-p mb-30" style="background-color: #12123a;">
    <div class="container">
        <a href="#">
            <p style="color: white; font-style: italic; font-weight: bold; ">Detail Kelas</p>
        </a>
        <center>
        <img style="width: 300px; height: 300px;" src="<?php echo asset('foto_kelas/' . @$data->foto )?>" alt="">
        </center>
        <br> <br>
        
        <p style="color: white; font-style: italic; font-weight: bold;">Nama Kelas : <?php echo @$data->nama?></p>
        <p style="color: white; font-style: italic; font-weight: bold;">Author Kelas: <?php echo @$data->author?></p>
        <p style="color: white; font-style: italic; font-weight: bold;">Deskripsi: <?php echo @$data->deskripsi?></p>
        <p style="color: white; font-style: italic; font-weight: bold;">Fitur: <?php echo @$jumlah_modul?> Modul, <?php echo @$jumlah_quiz?> Quiz </p>
        <p style="color: white; font-style: italic; font-weight: bold;">Harga: <?php echo @$data->harga?></p>
        
        <!-- Tombol Beli Kelas yang memicu modal -->
        <div class="col-auto">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#beliKelasModal">Beli Kelas</button>
        </div>
    </div>
</div>

<!-- Modal Form untuk Bukti Transfer -->
<div class="modal fade" id="beliKelasModal" tabindex="-1" role="dialog" aria-labelledby="beliKelasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="beliKelasModalLabel">Form Pembelian Kelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="/pembelian/kelas" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden name="id_kelas" value="<?= @$data->id ?>">
                    <input type="text" hidden name="id_user" value="<?php echo @$user->id?>">

                    <input type="text" hidden name="nama_kelas" value="<?= @$data->nama ?>">
                    <input type="text" hidden name="harga" value="<?= @$data->harga ?>">
                    <input type="text" hidden name="foto_kelas" value="<?= @$data->foto ?>">
                    <input type="text" hidden name="nama_user" value="<?php echo @$user->nama?>">

                    <!-- Input Foto Bukti Transfer -->
                    <div class="form-group">
                        <label for="bukti_transfer">Upload Bukti Transfer</label>
                        <input type="file" name="foto" id="bukti_transfer" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                    <p>note : Data anda akan tersimpan otomatis setelah konfirmasi</p>
                </form>
            </div>
        </div> 
    </div>
</div>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


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
