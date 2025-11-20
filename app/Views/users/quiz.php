<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .bg-dark-blue {
            background-image: linear-gradient(
                to bottom, 
                #030A8C 0%,    
                #034C8C 50%,    
                #0468BF 100%    
            );
            color: white;
        }

        .main-quiz-section {
            padding: 50px 0;
            min-height: 50vh;
        }
        
        .card-quiz-slot {
        background-color: #ffffff !important; 
        border: 1px solid rgba(0, 0, 0, 0.1); 
        border-radius: 8px;
        height: 100px; 
        width: 100%;
        min-width: 100px;
        margin: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 5px;
        transition: transform 0.2s; 
        cursor: pointer;
    }
    .navbar-nav .nav-item {
        margin-left: 20px;
        margin-right: 20px;
    }
    .card-quiz-slot:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .slot-image {
        max-height: 40px; 
        margin-bottom: 5px;
    }
    .slot-text {
        font-size: 0.75rem; 
        font-weight: 600;
        color: #343a40 !important;
        line-height: 1.1;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .fade-in-box {
        animation: fadeIn 1s ease-out forwards; 
    }

    @keyframes blink {
        50% { border-color: transparent; }
    }
    .typing-text-cursor {
        border-right: 3px solid white;
        animation: blink 0.75s step-end infinite;
    }
    </style>

<div class="bg-dark-blue main-quiz-section text-center">
    <div class="container">
        <h1 class="display-5 fw-bold mb-3">MINI QUIZ <br> UKM MEDICOM</h1>
        <p class="lead mb-5">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Suspendisse semper dignissim bibendum. Sed venenatis volutpat eleifend.
        </p>
        
        <div class="row justify-content-center mb-5">
            <?php
            $divisi = [
                "Divisi Fotografi" => "Group_284.png",
                "Divisi Videografi" => "Group_285.png",
                "Divisi Humas" => "Group_290.png",
                "Divisi Desain Grafis" => "Group_287.png",
                "Divisi Video Editing" => "Group_291.png",
                "Divisi Jurnalistik" => "Group_286.png",
                "Divisi Publikasi" => "Group_288.png",
                "Divisi Pemrograman" => "Group_289.png"
            ];
            $logo_base_path = 'images/Logo/';
            foreach ($divisi as $nama_divisi => $file_logo):
            ?>
                <div class="col-md-3 col-6 p-2">
                    <a href="#" class="text-decoration-none">
                        <div class="card-quiz-slot">
                            <img src="<?=base_url($logo_base_path . $file_logo) ?>" 
                            alt="<?= $nama_divisi ?> Logo" 
                            class="slot-image">
                            <span class="slot-text"><?= $nama_divisi ?></span>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="<?= base_url('quiz/start') ?>" class="btn btn-quiz">Mainkan Quiz &rarr;</a>
    </div>
</div>

<div class="container py-5">
    <h3 class="mb-3">Keterangan :</h3>
    <p class="lead text-muted">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra, tincidunt metus a, scelerisque nunc. Etiam convallis a lorem in finibus. Ut dignissim velit quis augue pellentesque, hendrerit accumsan massa ultrices.
    </p>
</div>

<?= $this->endSection() ?>