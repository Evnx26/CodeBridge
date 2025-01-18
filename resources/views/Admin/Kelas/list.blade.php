<div class="page-header" style="background-color: #12123a; color: white;">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4 style="color: white;">Data Kelas</h4>
            </div>
            <p>Home / Data Kelas</p>
        </div>
    </div>
</div>

<div class="page-header" style="background-color: #12123a; color: white;">

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah Kelas</button>
    <br><br>

    <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="text-align: left; color: white; ">No.</th>
                <th style="text-align: left; color: white;">Nama</th>
                <th style="text-align: left; color: white;">Deskripsi</th>
                <th style="text-align: left; color: white;">Author</th>
                <th style="text-align: left; color: white;">Harga</th>
                <th style="text-align: left; color: white;">Kategori</th>
                <th style="text-align: left; color: white;">Bahasa</th>
                <th class="datatable-nosort" style="color: white;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data as $row) : ?>
                <tr>
                    <td style="text-align: left; color: white;"><?= $no++ ?></td>
                    <td style="text-align: left; color: white;"><?= $row->nama ?></td>
                    <td style="text-align: left; color: white;"><?= $row->deskripsi ?></td>
                    <td style="text-align: left; color: white;"><?= $row->author ?></td>
                    <td style="text-align: left; color: white;"><?= $row->harga ?></td>
                    <td style="text-align: left; color: white;"><?= $row->kategori ?></td>
                    <td style="text-align: left; color: white;"><?= $row->bahasa ?></td>
                    <td class="action-buttons">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $row->id ?>">Edit</button>
                        <form action="{{ route('hapus/kelas', ['id' => $row->id]) }}" method="post" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                        <a href="/manage/kelas/<?= $row->id ?>" class="btn btn-success">Modul</a>
                    </td>
                </tr>

                <!-- Modal edit -->
                <div class="modal fade" id="editModal<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $row->id ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="editModalLabel<?= $row->id ?>">Edit Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('update/kelas', ['id' => $row->id]) }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="<?= $row->id ?>">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" value="<?= $row->nama ?>" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" required class="form-control"><?= $row->deskripsi ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Author</label>
                                        <input type="text" name="author" value="<?= $row->author ?>" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" name="harga" value="<?= $row->harga ?>" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori" required class="form-control">
                                            <option value="">-- Pilih Kategori --</option>
                                            <?php foreach ($kategori as $kat) : ?>
                                                <option value="<?= $kat->kategori ?>" <?= ($kat->kategori == $row->kategori) ? 'selected' : '' ?>>
                                                    <?= $kat->kategori ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label>Bahasa</label>
                                        <select name="bahasa" required class="form-control">
                                            <option value="">-- Pilih Kategori --</option>
                                            <?php foreach ($bahasa as $kat) : ?>
                                                <option value="<?= $kat->bahasa ?>" <?= ($kat->bahasa == $row->bahasa) ? 'selected' : '' ?>>
                                                    <?= $kat->bahasa ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="file" name="foto" value="<?= $row->foto ?>" required class="form-control">
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
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<br>



<!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addModalLabel">Tambah Data Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tambah/kelas') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" required class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" required class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($kategori as $kat) : ?>
                                <option value="<?= $kat->kategori ?>"><?= $kat->kategori ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bahasa</label>
                        <select name="bahasa" required class="form-control">
                            <option value="">-- Pilih Bahasa --</option>
                            <?php foreach ($bahasa as $bah) : ?>
                                <option value="<?= $bah->bahasa ?>"><?= $bah->bahasa ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" required class="form-control">
                        @error('foto')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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




<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>

<script>
    new DataTable('#example');
</script>