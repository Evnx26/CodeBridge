<div class="page-header" style="background-color:rgb(48, 48, 100); color: white;">
    
<form action="{{ route('quiz.submit', ['id_quiz' => $id]) }}" method="POST" class="container mt-4"  > 
    @csrf

    <input type="text" hidden name="id_quiz" value="<?php echo $id?>">
    <input type="text" name="id_kelas"  hidden value="<?php echo @$data_kelas->id?>">
    <input type="text" hidden name="id_user" value="<?php echo @$data_user->id?>">
    <input type="text" name="nama_kelas"  hidden value="<?php echo @$data_kelas->nama?>">
    <input type="text" name="nama_quiz"  hidden value="<?php echo @$data_quiz->nama?>">

    <center>
        <p style="font-style: italic; font-weight: bold; font-size: 30px;">Quiz <?php echo @$data_quiz->nama?></p>
    </center>

    @foreach($pertanyaan as $index => $item)
        <div id="question-{{ $item['id'] }}" class="mb-4 p-3 border rounded bg-light" style="background-color:rgb(75, 75, 135); color: white;">
            <h3 class="mb-3" style="background-color:rgb(75, 75, 135); color: white;"> {{ $index + 1 }}. {{ $item['pertanyaan'] }}</h3>

            <div class="mb-3" style="background-color:rgb(75, 75, 135); color: white;">
                @if(is_array($item['jawaban']) || is_object($item['jawaban']))
                    @foreach($item['jawaban'] as $jawaban)
                        <div class="form-check" style="background-color:rgb(75, 75, 135); color: white;">
                            <input type="radio" 
                                   name="answers[{{ $item['id'] }}]" 
                                   value="{{ $jawaban['id'] }}" 
                                   id="jawaban-{{ $jawaban['id'] }}" 
                                   class="form-check-input" 
                                   required>
                            <label for="jawaban-{{ $jawaban['id'] }}" class="form-check-label">
                                {{ $jawaban['teks_pilihan'] }}
                            </label>
                        </div>
                    @endforeach
                @else
                    <p>Tidak ada jawaban untuk pertanyaan ini.</p>
                @endif
            </div>
        </div>
    @endforeach
    <center>
    <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
    </center>
</form>
</div>
