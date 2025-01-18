
<div class="card-box pd-20 height-100-p mb-30" style="background-color: #12123a;">
    <div class="container">
        <a href="#">
            <p style="color: white; font-style: italic; font-weight: bold; ">Cari Kelas Yang Sesuai Skill-Mu</p>
        </a>

        <div class="row">
    <!-- Form Pencarian -->
    <div class="col-md-12 mb-4">
        <form method="GET" action="{{ url('/daftar/kelas') }}">
            <!-- Input keyword -->
            <div class="form-group">
                <input 
                    type="text" 
                    name="keyword" 
                    class="form-control" 
                    placeholder="Cari kelas..."
                    value="{{ request('keyword') }}" 
                >
            </div>

            <!-- Dropdown Bahasa -->
            <div class="form-group">
                <select name="bahasa" class="form-control">
                    <option value="">Pilih Bahasa</option>
                    @foreach($list_bahasa as $b)
                        <option value="{{ $b->bahasa }}" {{ request('bahasa') == $b->bahasa ? 'selected' : '' }}>
                            {{ $b->bahasa }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Dropdown Kategori -->
            <div class="form-group">
                <select name="kategori" class="form-control">
                    <option value="">Pilih Kategori</option>
                    @foreach($list_kategori as $k)
                        <option value="{{ $k->kategori }}" {{ request('kategori') == $k->kategori ? 'selected' : '' }}>
                            {{ $k->kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Cari -->
            <button type="submit" class="btn btn-primary mt-2">Cari</button>
        </form>
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
                    <img style="height: 200px;" class="card-img-top" src="<?= asset('foto_kelas/' . $modul->foto) ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="color: white;"><?= $modul->nama ?></h5>
                        <p class="card-text" style="color: white;"><?= $modul->deskripsi ?></p>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a href="/beli/kelas/<?= $modul->id ?>" class="btn btn-primary btn-block">Beli Kelas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    @endif
</div>
        <!-- pagination -->
        
        <div>
        {{$data_kelas->onEachSide(1)->links()}}
        </div>
       
    </div>
</div>
</div>
</div>
