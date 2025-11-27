<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
<style>
    /* Styles umum */
    body {
        font-family: 'Poppins', sans-serif;
    }
    .bg-main-gradient {
        background-image: linear-gradient(
            to bottom, 
            #000B4F 0%, 
            #003399 50%, 
            #0066CC 100% 
        );
        color: white;
    }

    /* Styles untuk Progress Bar */
    .progress-bar {
        height: 6px;
        background-color: rgba(255, 255, 255, 0.4);
        border-radius: 3px;
    }
    .progress-fill {
        height: 100%;
        background-color: white;
        border-radius: 3px;
        transition: width 0.5s ease-in-out;
    }

    /* Styles untuk Kontainer Soal */
    .soal-container {
        background-color: rgba(0, 51, 153, 0.4); 
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(5px);
        max-width: 800px;
        padding: 30px;
        border-radius: 12px;
    }

    /* Styles untuk Opsi Jawaban (Button Look) */
    .opsi-label {
        background-color: rgba(255, 255, 255, 0.1); 
        border: 1px solid rgba(255, 255, 255, 0.5);
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.2s, transform 0.1s, border-color 0.2s;
        display: block; 
    }
    
    .opsi-label:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }
    
    /* Style saat jawaban dipilih */
    .opsi-label.selected {
        background-color: #ffffff; 
        color: #003399; 
        border-color: #ffffff;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }

    /* Input radio disembunyikan */
    .opsi-input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Styles untuk Tombol Lanjut */
    .btn-lanjut {
        background-color: #ffffff;
        color: #003399;
        padding: 10px 40px;
        border-radius: 4px;
        font-weight: 600;
        transition: background-color 0.2s, color 0.2s;
        border: none;
        cursor: pointer;
        font-size: 1rem;
        margin-top: 30px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        /* Awalnya tombol dinonaktifkan */
        opacity: 0.5;
        cursor: not-allowed; 
    }
    .btn-lanjut:hover:not(:disabled) {
        background-color: #f0f0ff;
        color: #0066CC;
    }
    .btn-lanjut:disabled {
        cursor: not-allowed;
    }
    .btn-lanjut.active {
        opacity: 1;
        cursor: pointer;
    }
    
    .question-text {
        font-size: 1.25rem;
        line-height: 1.6;
        min-height: 50px; 
    }

    /* Style untuk pesan error validasi */
    .alert-error {
        background-color: #dc2626; /* red-600 */
        color: white;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 500;
        text-align: left;
    }
</style>

<!-- ============================================== -->
<!-- KONTEN UTAMA: HALAMAN KUIS -->
<!-- ============================================== -->
<div class="bg-main-gradient min-h-[75vh] text-white pt-20 pb-40 flex flex-col items-center justify-start px-4">
    <div class="container mx-auto max-w-7xl w-full">

        <!-- Header Soal dan Progress Bar -->
        <div class="max-w-4xl mx-auto text-center mb-8">
            <h1 class="text-3xl font-bold mb-2">Soal <?= esc($nomorSoal) ?></h1>
            <p class="text-lg mb-4">dari <?= esc($totalSoal) ?></p>

            <!-- Progress Bar -->
            <div class="progress-bar w-full">
                <div class="progress-fill" style="width: <?= esc($progressPercent) ?>%;"></div>
            </div>
        </div>

        <!-- Kontainer Pertanyaan dan Opsi Jawaban -->
        <div class="soal-container mx-auto">

            <!-- Tampilkan pesan error jika ada (dari prosesJawaban) -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert-error text-sm">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <!-- Teks Pertanyaan -->
            <div class="text-center mb-10">
                <p class="question-text font-semibold">
                    <?= esc($soal) ?>
                </p>
            </div>

            <!-- Form Jawaban -->
            <form id="quizForm" action="<?= base_url('quiz/jawab/' . esc($nomorSoal)) ?>" method="post">
                <?= csrf_field() ?> <!-- Tambahkan CSRF Field untuk keamanan -->
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php 
                    $opsi_labels = [];
                    foreach ($opsiJawaban as $index => $opsi): 
                        // Tentukan apakah opsi ini adalah jawaban yang tersimpan dari sesi
                        $isChecked = (isset($jawabanTersimpan) && $jawabanTersimpan === $opsi);
                    ?>
                        <div class="relative">
                            <input 
                                type="radio" 
                                name="jawaban" 
                                id="opsi_<?= esc($index) ?>" 
                                value="<?= esc($opsi) ?>" 
                                class="opsi-input"
                                <?= $isChecked ? 'checked' : '' ?>
                                required
                            >
                            <label 
                                class="opsi-label <?= $isChecked ? 'selected' : '' ?>" 
                                for="opsi_<?= esc($index) ?>"
                                data-index="<?= esc($index) ?>"
                            >
                                <?= esc($opsi_labels[$index]) ?>. <?= esc($opsi) ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Tombol Lanjut -->
                <div class="text-center">
                    <button type="submit" id="btnLanjut" class="btn-lanjut" disabled>
                        Lanjut
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============================================== -->
<!-- JavaScript untuk Interaksi Klik Jawaban -->
<!-- ============================================== -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const labels = document.querySelectorAll('.opsi-label');
        const inputs = document.querySelectorAll('.opsi-input');
        const btnLanjut = document.getElementById('btnLanjut');

        function handleAnswerSelection() {
            // Hapus kelas 'selected' dari semua label
            labels.forEach(l => l.classList.remove('selected'));
            
            // Temukan input yang sedang dicek
            const selectedInput = document.querySelector('input[name="jawaban"]:checked');
            
            if (selectedInput) {
                // Tambahkan kelas 'selected' ke label yang terkait
                const selectedLabel = document.querySelector(`label[for="${selectedInput.id}"]`);
                if (selectedLabel) {
                    selectedLabel.classList.add('selected');
                }
                
                // Aktifkan tombol Lanjut
                btnLanjut.disabled = false;
                btnLanjut.classList.add('active');
            } else {
                // Jika tidak ada yang dipilih, nonaktifkan tombol
                btnLanjut.disabled = true;
                btnLanjut.classList.remove('active');
            }
        }

        // Listener pada label (untuk tampilan visual)
        labels.forEach(label => {
            label.addEventListener('click', function() {
                // Centang input radio yang sesuai
                const inputId = this.getAttribute('for');
                const correspondingInput = document.getElementById(inputId);
                if (correspondingInput) {
                    correspondingInput.checked = true;
                    handleAnswerSelection();
                }
            });
        });
        
        // Listener pada input (untuk konsistensi)
        inputs.forEach(input => {
            input.addEventListener('change', handleAnswerSelection);
        });

        // Panggil saat DOM dimuat untuk menangani jawaban tersimpan (jika user back/error)
        handleAnswerSelection();
    });
</script>

<!-- ============================================== -->
<!-- BAGIAN KETERANGAN -->
<!-- ============================================== -->
<div class="bg-white">
    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <h3 class="text-xl md:text-2xl font-semibold mb-4 text-gray-800">Keterangan :</h3>
        <p class="text-base md:text-lg text-gray-600 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra, tincidunt metus a, scelerisque nunc. Etiam convallis a lorem in finibus. Ut dignissim velit quis augue pellentesque, hendrerit accumsan massa ultrices.
        </p>
    </div>
</div>

<?= $this->endSection() ?>