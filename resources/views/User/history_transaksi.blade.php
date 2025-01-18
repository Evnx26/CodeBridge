<div class="page-header" style="background-color:rgb(48, 48, 100); color: white;">
    <div class="row">
        <div class="col-md-6 col-sm-12" style="color: white;">
            <div class="title">
                <h4 style="color: white;">Data Transaksi</h4>
            </div>
            <p>Home / Data Transaksi</p>
        </div>
    </div>
</div>


<div class="page-header" style="background-color:rgb(48, 48, 100); color: white;">


    <br>

    <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="text-align: left; color: white;">No.</th>
                <th style="text-align: left; color: white;">Nama User</th>
                <th style="text-align: left; color: white;">Nama Kelas</th>
                <th style="text-align: left; color: white;">Harga</th>
                <th style="text-align: left; color: white;">Foto</th>
                <th style="text-align: left; color: white;">Status</th>

                <th class="datatable-nosort" style="color: white;">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data as $row) : ?>
                <tr>
                    <td style="text-align: left; color: white; "><?= $no++ ?></td>
                    <td style="text-align: left; color: white;"><?= $row->nama_user ?></td>
                    <td style="text-align: left; color: white;"><?= $row->nama_kelas ?></td>
                    <td style="text-align: left; color: white;"><?= $row->harga ?></td>
                    <td style="text-align: left; color: white;">
                        <a href="{{ asset('foto_transaksi/' . $row->foto) }}"  target="_blank"> <p style="color: blue; ">bukti</p></a>
                    </td>
                    <td style="text-align: left; color: white;"><?= $row->status ?></td>
                    <td class="action-buttons">
                        @if ($row->status === 'pending')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $row->id }}">Batalkan</button>
                        @elseif ($row->status === 'aktif')
                        <button type="button" class="btn btn-success">Selesai</button>
                        @elseif ($row->status === 'ditolak')
                        <button type="button" class="btn btn-danger">Ditolak</button>
                        @elseif ($row->status === 'dibatalkan')
                        <button type="button" class="btn btn-warning">Batal</button>
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
                                <form action="{{ route('update/transaksi_user', ['id' => $row->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="<?= $row->id ?>">
                                    <select name="status" class="form-control" required>
                                        <option value="batalkan" {{ $row->status == 'batalkan' ? 'selected' : '' }}>Batalkan</option>
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