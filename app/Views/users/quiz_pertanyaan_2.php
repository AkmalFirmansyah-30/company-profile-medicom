<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
<style>
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
    .soal-container {
        background-color: rgba(0, 51, 153, 0.4); 
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(5px);
        max-width: 800px;
        padding: 30px;
        border-radius: 12px;
    }
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
    .opsi-label.selected {
        background-color: #ffffff; 
        color: #003399; 
        border-color: #ffffff;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }
    .opsi-input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }
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
    .alert-error {
        background-color: #dc2626;
        color: white;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
    }
</style>
<div class="bg-main-gradient min-h-[75vh] text-white pt-20 pb-40 flex flex-col items-center justify-start px-4">
    <div class="container mx-auto max-w-7xl w-full">
        <div class="max-w-4xl mx-auto text-center mb-8">
            <h1 class="text-3xl font-bold mb-2">Soal <?= esc($nomorSoal) ?></h1>
            <p class="text-lg mb-4">dari <?= esc($totalSoal) ?></p>
            <div class="progress-bar w-full">
                <div class="progress-fill" style="width: <?= esc($progressPercent) ?>%;"></div>
            </div>
        </div>
        <div class="soal-container mx-auto">
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert-error text-sm">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <div class="text-center mb-10">
                <p class="question-text font-semibold">
                    <?= esc($soal) ?>
                </p>
            </div>
            <form id="quizForm" action="<?= base_url('quiz/jawab/' . esc($nomorSoal)) ?>" method="post">
                <?= csrf_field() ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php 
                    $opsi_labels = ['A', 'B', 'C', 'D'];
                    foreach ($opsiJawaban as $index => $opsi): 
                    ?>
                        <div class="relative">
                            <input 
                                type="radio" 
                                name="jawaban" 
                                id="opsi_<?= esc($index) ?>" 
                                value="<?= esc($opsi) ?>" 
                                class="opsi-input" 
                                required
                            >
                            <label 
                                class="opsi-label" 
                                for="opsi_<?= esc($index) ?>"
                                data-index="<?= esc($index) ?>"
                            >
                                <?= esc($opsi_labels[$index]) ?>. <?= esc($opsi) ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center">
                    <button type="submit" id="btnLanjut" class="btn-lanjut" disabled>
                        Lanjut
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const labels = document.querySelectorAll('.opsi-label');
        const inputs = document.querySelectorAll('.opsi-input');
        const btnLanjut = document.getElementById('btnLanjut');
        function handleAnswerSelection() {
            labels.forEach(l => l.classList.remove('selected'));
            const selectedInput = document.querySelector('input[name="jawaban"]:checked');
            
            if (selectedInput) {
                const selectedLabel = document.querySelector(`label[for="${selectedInput.id}"]`);
                if (selectedLabel) {
                    selectedLabel.classList.add('selected');
                }
                btnLanjut.disabled = false;
                btnLanjut.classList.add('active');
            } else {
                btnLanjut.disabled = true;
                btnLanjut.classList.remove('active');
            }
        }
        labels.forEach(label => {
            label.addEventListener('click', function() {
                const inputId = this.getAttribute('for');
                const correspondingInput = document.getElementById(inputId);
                if (correspondingInput) {
                    correspondingInput.checked = true;
                    handleAnswerSelection();
                }
            });
        });
        inputs.forEach(input => {
             input.addEventListener('change', handleAnswerSelection);
        });
        handleAnswerSelection();
    });
</script>
<div class="bg-white">
    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <h3 class="text-xl md:text-2xl font-semibold mb-4 text-gray-800">Keterangan :</h3>
        <p class="text-base md:text-lg text-gray-600 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra, tincidunt metus a, scelerisque nunc. Etiam convallis a lorem in finibus. Ut dignissim velit quis augue pellentesque, hendrerit accumsan massa ultrices.
        </p>
    </div>
</div>

<?= $this->endSection() ?>