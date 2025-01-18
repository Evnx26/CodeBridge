<div class="page-header" style="background-color: #12123a; color: white;">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4 style="color: white;">Manajemen Modul</h4>
            </div>
            <p>Tambah Modul</p>
        </div>
    </div>
</div> 


<div class="page-header" style="background-color: #12123a; color: white;">
<form action="{{ route('insert/modul') }}" method="post" enctype="multipart/form-data">
@csrf
<input type="text" name="id_kelas" hidden value="<?php echo @$id_kelas?>">

	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Judul</label>
		<div class="col-sm-12 col-md-10">
			<input name="judul" class="form-control" type="text" placeholder="Judul Modul">
		</div>
	</div>

	<div class="form-group">
		<label>Sub Deskripsi</label>
		<textarea name="subdeskripsi" class="form-control"></textarea>
	</div>

    <div class="form-group">
		<label>Deskripsi</label>
    <textarea name="deskripsi" class="textarea_editor form-control border-radius-0" placeholder="Enter text ..."></textarea>
    </div> 

    <div class="form-group">
		<label>Video Pembelajaran</label>
		<input  name="video" type="file" class="form-control"></input>
	</div>

    <div class="form-group">
		<label>Foto</label>
		<input name="foto" type="file" class="form-control"></input>
	</div>
    <center>
    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
    </center>


</form>

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
							