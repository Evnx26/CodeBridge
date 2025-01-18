<div class="page-header" style="background-color:rgb(48, 48, 100); color: white;">
    <div class="row">
        <div class="col-md-6 col-sm-12" style="color: white;">
            <div class="title">
                <h4 style="color: white;">Data Quiz</h4>
            </div>
            <p>Home / Data Quiz</p>
        </div>
    </div>
</div>


<div class="page-header" style="background-color:rgb(48, 48, 100); color: white;">


    <br>

    <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="text-align: left; color: white;">No.</th>
                <th style="text-align: left; color: white;">Nama Quiz</th>
                <th style="text-align: left; color: white;">Nama Nilai</th>
              

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data as $row) : ?>
                <tr>
                    <td style="text-align: left; color: white; "><?= $no++ ?></td>
                    <td style="text-align: left; color: white;"><?= $row->nama_quiz ?></td>
                    <td style="text-align: left; color: white;"><?= $row->nilai ?></td>
                </tr>
                <!-- Modal -->
                
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