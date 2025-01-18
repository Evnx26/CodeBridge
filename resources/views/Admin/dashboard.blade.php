    <div class="card-box pd-20 height-100-p mb-30" style="background-color: #12123a;">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="https://cdn.dribbble.com/users/2585799/screenshots/6555657/__2_3_____.gif" style="width: 300px; height: 150px;" alt="tes ">
            </div>
            <div class="col-md-8">
                <h4 style="color: white;" class="font-20 weight-500 mb-10 text-capitalize">
                    Welcome back, <?php echo @$data->nama ?> <div class="weight-600 font-30 text-blue"><?php echo @$data->username ?></div>
                </h4>
                <p style="color: white;" class="font-18 max-width-600">Manajemen Kelas CodeBridge</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1" style="height: 120px; background-color: #12123a; color: white;"> <!-- Tambahkan tinggi card -->
                <div class="d-flex align-items-center h-100">
                    <!-- Icon User dengan Lingkaran -->
                    <div class="progress-data">
                        <div class="icon bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                            style="width: 60px; height: 60px; border: 3px solid #ffffff;">
                            <i class="icon-copy fa fa-address-card-o" aria-hidden="true"></i>
                        </div>
                    </div>
                    <!-- Teks dan Jumlah User -->
                    <div class="widget-data ms-3 d-flex align-items-center">
                        <!-- Icon di Sebelah Kiri -->
                        
                        <div>
                            <div style="color: white;" class="h4 mb-0"><?php echo $jumlah_user?></div>
                            <div class="weight-600 font-14">User</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1" style="height: 120px; background-color: #12123a; color: white;"> <!-- Tambahkan tinggi card -->
                <div class="d-flex align-items-center h-100">
                    
                    <div class="progress-data">
                        <div class="icon bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                            style="width: 60px; height: 60px; border: 3px solid #ffffff;">
                            <i class="icon-copy fa fa-address-card-o" aria-hidden="true"></i>
                        </div>
                    </div>
                    
                    <div class="widget-data ms-3 d-flex align-items-center">
                        
                        
                        <div>
                            <div style="color: white;" class="h4 mb-0"><?php  echo $jumlah_kelas?></div>
                            <div class="weight-600 font-14">Kelas</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1" style="height: 120px; background-color: #12123a; color: white;"> <!-- Tambahkan tinggi card -->
                <div class="d-flex align-items-center h-100">
                    <!-- Icon User dengan Lingkaran -->
                    <div class="progress-data">
                        <div class="icon bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                            style="width: 60px; height: 60px; border: 3px solid #ffffff;">
                            <i class="icon-copy fa fa-address-card-o" aria-hidden="true"></i>
                        </div>
                    </div>
                    <!-- Teks dan Jumlah User -->
                    <div class="widget-data ms-3 d-flex align-items-center">
                        <!-- Icon di Sebelah Kiri -->
                        
                        <div>
                            <div style="color: white;" class="h4 mb-0"><?php echo $jumlah_modul?></div>
                            <div class="weight-600 font-14">Modul</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1" style="height: 120px; background-color: #12123a; color: white;"> <!-- Tambahkan tinggi card -->
                <div class="d-flex align-items-center h-100">
                    <!-- Icon User dengan Lingkaran -->
                    <div class="progress-data">
                        <div class="icon bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                            style="width: 60px; height: 60px; border: 3px solid #ffffff;">
                            <i class="icon-copy fa fa-address-card-o" aria-hidden="true"></i>
                        </div>
                    </div>
                    <!-- Teks dan Jumlah User -->
                    <div class="widget-data ms-3 d-flex align-items-center">
                        <!-- Icon di Sebelah Kiri -->
                        
                        <div>
                            <div style="color: white;" class="h4 mb-0">150</div>
                            <div class="weight-600 font-14">User</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>