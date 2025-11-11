<footer class="text-white mt-auto" style="background: linear-gradient(to right, #0a67b4, #0a2fa3);">
    <div class="container mx-auto px-10 py-10 grid md:grid-cols-3 gap-10">
        <!-- Kolom 1 -->
        <div class="flex flex-col space-y-3">
            <div class="flex items-center space-x-3">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" class="h-12">
                <h3 class="text-lg font-bold">UKM Medicom PNC</h3>
            </div>
            <p class="text-sm leading-relaxed text-gray-100">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Suspendisse semper dignissim bibendum. Sed venenatis volutpat eleifend.
            </p>
        </div>

        <!-- Kolom 2 -->
        <div>
            <h4 class="font-semibold text-lg mb-3">Quick Links</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="<?= base_url('/') ?>" class="hover:underline">🏠 Beranda</a></li>
                <li><a href="<?= base_url('/tentang') ?>" class="hover:underline">ℹ️ Tentang Kami</a></li>
                <li><a href="<?= base_url('/prestasi') ?>" class="hover:underline">🏅 Prestasi</a></li>
                <li><a href="<?= base_url('/pengurus') ?>" class="hover:underline">👥 Pengurus</a></li>
            </ul>
        </div>

        <!-- Kolom 3 -->
        <div>
            <h4 class="font-semibold text-lg mb-3">Contact</h4>
            <ul class="space-y-2 text-sm">
                <li>📍 Jl. Yudistira No.999</li>
                <li>📞 +62 899999</li>
                <li>📧 medicom@pnc.ac.id</li>
            </ul>
        </div>
    </div>

    <div class="border-t border-white/30 text-center text-xs py-3">
        Copyright © <?= date('Y') ?> UKM Medicom PNC
    </div>
</footer>
