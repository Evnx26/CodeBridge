<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:rgb(48, 48, 100); color: white;">
    
<div class="page-header" style="background-color:rgb(75, 75, 135); color: white;">
    <center>
<video width="640" height="360" controls>
        <source src="<?php  echo  asset('video_modul/' . @$modul->video) ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    </center>
    <br><br>
    <h2 style="text-align: center; color: white;"><?php echo $modul->judul?></h2>
    <div>{!! @$modul->deskripsi !!}</div>

   

</div>
    
</body>
</html>