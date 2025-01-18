<form action="{{ route('quiz.insert', ['idnya' => $idnya]) }}" method="POST" id="quizForm" enctype="multipart/form-data" class="p-4 border rounded shadow-sm">
    @csrf 
    <div id="questions-container" class="mb-3">
    </div>
    <button type="button" onclick="addQuestion()" class="btn btn-primary mb-3">Tambah Pertanyaan</button>
    <center>
    <button type="submit" class="btn btn-success">Simpan Quiz</button>
    </center>
</form>

<script>
    let questionCount = 0;

    function addQuestion() {
        questionCount++;

        const questionTemplate = `
            <div id="question-${questionCount}" class="question mb-4 p-3 border rounded bg-light">
                <h3 class="mb-3">Pertanyaan ${questionCount}</h3>
                <div class="mb-3">
                    <label for="pertanyaan-${questionCount}" class="form-label">Pertanyaan:</label>
                    <input type="text" name="questions[${questionCount}][pertanyaan]" class="form-control" required>
                </div>

                <h4 class="mb-3">Pilihan Jawaban</h4>
                <div id="options-${questionCount}" class="mb-3">
                    <input type="text" name="questions[${questionCount}][options][]" class="form-control mb-2" placeholder="Pilihan 1" required>
                    <input type="text" name="questions[${questionCount}][options][]" class="form-control mb-2" placeholder="Pilihan 2" required>
                    <input type="text" name="questions[${questionCount}][options][]" class="form-control mb-2" placeholder="Pilihan 3" required>
                    <input type="text" name="questions[${questionCount}][options][]" class="form-control mb-2" placeholder="Pilihan 4" required>
                </div>

                <div class="mb-3">
                    <label for="jawaban-${questionCount}" class="form-label">Jawaban Benar:</label>
                    <select name="questions[${questionCount}][jawaban]" class="form-select" required>
                        <option value="1">Pilihan 1</option>
                        <option value="2">Pilihan 2</option>
                        <option value="3">Pilihan 3</option>
                        <option value="4">Pilihan 4</option>
                    </select>
                </div>
<center>
                <button type="button" onclick="removeQuestion(${questionCount})" class="btn btn-danger">Hapus Pertanyaan</button>
            </center>
                </div>
        `;

        const container = document.getElementById('questions-container');
        container.insertAdjacentHTML('beforeend', questionTemplate);
    }

    function removeQuestion(id) {
        const questionElement = document.getElementById(`question-${id}`);
        questionElement.remove();
    }
</script>
