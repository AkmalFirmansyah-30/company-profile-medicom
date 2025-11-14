<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="bg-dark-blue main-quiz-section d-flex align-items-center justify-content-center">
    <div class="container text-center">
        <div id="instruction-box" class="card mx-auto text-white" 
             style="max-width: 700px; padding: 60px; border-radius: 10px; 
                    background-color: rgba(3, 76, 140, 0.8);
                    border: 1px solid rgba(255, 255, 255, 0.3);
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                    opacity: 0;"> <p id="line-1" class="lead fw-bold mb-0" style="font-size: 1.5rem;"></p>
            <p id="line-2" class="mb-0" style="font-size: 1.5rem;"></p>
        </div>
    </div>
</div>

<div class="container py-5">
    <h3 class="mb-3">Keterangan :</h3>
    <p class="lead text-muted">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra, tincidunt metus a, scelerisque nunc. Etiam convallis a lorem in finibus. Ut dignissim velit quis augue pellentesque, hendrerit accumsan massa ultrices.
    </p>
</div>

<?= $this->endSection() ?>