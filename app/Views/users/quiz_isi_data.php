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
    .form-card {
        background-color: rgba(0, 51, 153, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(5px);
        max-width: 500px;
    }
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        color: #333;
        background-color: #ffffff;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: border-color 0.2s;
    }
    .form-control:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.5); 
    }
    .btn-start-quiz {
        background-color: #ffffff;
        color: #003399;
        padding: 10px 25px;
        border-radius: 4px;
        font-weight: 600;
        transition: background-color 0.2s, color 0.2s;
        border: none;
        cursor: pointer;
        font-size: 1rem;
    }
    .btn-start-quiz:hover {
        background-color: #f0f0ff;
        color: #0066CC;
    }
</style>
<div class="bg-main-gradient min-h-[75vh] text-white pt-20 pb-40 flex items-center justify-center">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="flex justify-center">
            <div class="form-card w-full p-8 md:p-12 rounded-lg text-center mx-4">
                <h2 class="text-3xl font-bold mb-8">ISI DATA</h2>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="bg-red-500 text-white p-3 rounded-md mb-4 text-sm">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('quiz/process') ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="mb-6">
                        <input 
                            type="text" 
                            name="nama_peserta" 
                            id="nama_peserta" 
                            class="form-control" 
                            placeholder="Masukkan Nama Anda" 
                            required
                        >
                    </div>

                    <a href="<?= base_url('quiz/pertanyaan') ?>" class="btn-quiz shadow-lg hover:shadow-xl">Mainkan Quiz &rarr;</a>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="bg-white">
    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <h3 class="text-xl md:text-2xl font-semibold mb-4 text-gray-800">Keterangan :</h3>
        <p class="text-base md:text-lg text-gray-600 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra, tincidunt metus a, scelerisque nunc. Etiam convallis a lorem in finibus. Ut dignissim velit quis augue pellentesque, hendrerit accumsan massa ultrices.
        </p>
    </div>
</div>

<?= $this->endSection() ?>