<div class="page-header" style="background-color: #12123a; color: white;">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4 style="color: white ;">Data Transaksi</h4>
            </div>
            <p>Home / Data Transaksi</p>
        </div>
    </div>
</div>


<div class="page-header" style="background-color: #12123a; color: white;">
    <br>
    <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="text-align: left; color: white;">No.</th>
                <th style="text-align: left; color: white;">Nama User</th>
                <th style="text-align: left; color: white">Nama Kelas</th>
                <th style="text-align: left; color: white">Harga</th>
                <th style="text-align: left; color: white">Foto</th>
                <th style="text-align: left; color: white;">Status</th>
                <th class="datatable-nosort" style="color: white;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data as $row) : ?>
                <tr>
                    <td style="text-align: left; color: white;"><?= $no++ ?></td>
                    <td style="text-align: left; color: white;"><?= $row->nama_user ?></td>
                    <td style="text-align: left; color: white;"><?= $row->nama_kelas ?></td>
                    <td style="text-align: left; color: white;"><?= $row->harga ?></td>
                    <td style="text-align: left; color: white;">
                        <a style="color: white;" href="{{ asset('foto_transaksi/' . $row->foto) }}" target="_blank">bukti</a>
                    </td>
                    <td style="text-align: left; color: white;"><?= $row->status ?></td>
                    <td class="action-buttons">
                        @if ($row->status === 'pending')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $row->id ?>">Konfirmasi</button>
                        @elseif ($row->status === 'aktif' || $row->status === 'dibatalkan' || $row->status === 'ditolak'  )
                        <button type="button" class="btn btn-success">Selesai</button>
                        @endif
                    </td>
                </tr>


                <!-- Modal -->
                <div class="modal fade" id="editModal<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $row->id ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="editModalLabel<?= $row->id ?>">Edit Status</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('update/transaksi', ['id' => $row->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="<?= $row->id ?>">
                                    <select name="status" class="form-control" required>
                                        <option value="tolak" {{ $row->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                                        <option value="terima" {{ $row->status == 'terima' ? 'selected' : '' }}>Terima</option>
                                    </select>

                                    <br>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>

<script>
    new DataTable('#example');
</script>