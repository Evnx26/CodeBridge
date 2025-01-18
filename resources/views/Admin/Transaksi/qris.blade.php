<div class="page-header" style="height: 120px; background-color: #12123a; color: white;">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title" style="color: white;">
                <h4 style="color: white;">Data Qris</h4>
            </div>
            <p>Home / Data Qris</p>
        </div>
    </div>
</div>


<div class="page-header" style="background-color: #12123a; color: white;">

<table id="example" class="table table-bordered" style="width:100%">
    <thead>
        <tr>
            <th style="text-align: left; color: white;">No.</th>
            <th style="text-align: left; color: white;">Nama</th>
            <th class="datatable-nosort" style="color: white;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data as $row) : ?>
            <tr>
                <td style="text-align: left; color: white;"><?= $no++ ?></td>
                <td style="text-align: left; color: white;"><a href="{{ asset('foto_qris/' . $row->foto) }} " target="_blank"> qris</a></td>
                <td class="action-buttons">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $row->id ?>">Edit</button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="editModal<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $row->id ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="editModalLabel<?= $row->id ?>">Edit Bahasa</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update/qris', ['id' => $row->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="<?= $row->id ?>">
                                <input type="file"  name="foto" value="<?= $row->foto ?>" required class="form-control">
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