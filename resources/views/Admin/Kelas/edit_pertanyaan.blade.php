<form action="{{ route('/quiz/update', ['id_quiz' => $id]) }}" method="POST" class="container mt-4">
    @csrf
    
    @foreach($pertanyaan as $item)
        <div id="question-{{ $item['id'] }}" class="mb-4 p-3 border rounded bg-light">
            <h3 class="mb-3">Pertanyaan: {{ $item['pertanyaan'] }}</h3>

            <div class="mb-3">
                <label for="pertanyaan-{{ $item['id'] }}" class="form-label">Pertanyaan:</label>
                <input type="text" 
                       name="questions[{{ $item['id'] }}][pertanyaan]" 
                       value="{{ $item['pertanyaan'] }}" 
                       class="form-control" 
                       required>
            </div>

            <h4 class="mb-3">Pilihan Jawaban</h4>
            @if(is_array($item['jawaban']) || is_object($item['jawaban']))
                @foreach($item['jawaban'] as $jawaban)
                    <div class="mb-3">
                        <input type="text" 
                               name="questions[{{ $item['id'] }}][options][]" 
                               value="{{ $jawaban['teks_pilihan'] }}" 
                               class="form-control" 
                               placeholder="Masukkan pilihan jawaban" 
                               required>
                    </div>
                @endforeach
            @endif

            <div class="mb-3">
                <label for="jawaban-{{ $item['id'] }}" class="form-label">Jawaban Benar:</label>
                <select name="questions[{{ $item['id'] }}][jawaban]" class="form-select" required>
                    @if(is_array($item['jawaban']) || is_object($item['jawaban']))
                        @foreach($item['jawaban'] as $index => $jawaban)
                            <option value="{{ $index + 1 }}" 
                                    {{ old('questions.' . $item['id'] . '.jawaban') == ($index + 1) ? 'selected' : '' }}>
                                Pilihan {{ $index + 1 }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Update Quiz</button>
</form>
