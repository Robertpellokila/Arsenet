<x-app-layout>
    <!-- Header Section -->
    <header class="bg-blue-500 text-white py-20 rounded-md">
        <div class=" container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Tentang Kami</h1>
            <p class="text-lg">Mengenal lebih dekat perusahaan pemasangan jaringan internet terbaik untuk Anda.</p>

            <div class="flex justify-center mt-10 mx-5">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    
                    @foreach ($galeries as $foto)
                    <div class="grid gap-4">

                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="{{ asset('/storage/' . $foto->gambar) }}"
                                alt="{{ $foto->title }}">
                        </div>
                    </div>
                    @endforeach

            </div>
        </div>

        </div>
    </header>

    <!-- Content Section -->
    <main class="container mx-auto px-4 py-10 space-y-10">
        <!-- Visi & Misi -->
        <section>
            <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Visi & Misi</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Visi</h3>
                    <p class="text-gray-600 text-justify">Menjadi perusahaan penyedia layanan jaringan internet
                        terkemuka yang
                        mendukung kemajuan digital di seluruh wilayah Indonesia.</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Misi</h3>
                    <ul class="list-disc pl-5 text-gray-600 space-y-2">
                        <li>Menyediakan solusi internet yang cepat, stabil, dan terjangkau.</li>
                        <li>Meningkatkan literasi digital masyarakat dengan layanan inovatif.</li>
                        <li>Mendukung pertumbuhan ekonomi lokal melalui teknologi.</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Nilai Perusahaan -->
        <section>
            <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Nilai Perusahaan</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Inovasi</h3>
                    <p class="text-gray-600">Kami selalu mencari cara baru untuk memberikan layanan terbaik.</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Keberlanjutan</h3>
                    <p class="text-gray-600">Komitmen kami untuk solusi yang ramah lingkungan.</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Komunitas</h3>
                    <p class="text-gray-600">Membangun hubungan yang kokoh dengan masyarakat.</p>
                </div>
            </div>
        </section>

        <!-- Sejarah Singkat -->
        <section>
            <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Sejarah Kami</h2>
            <p class="text-gray-600 leading-relaxed text-justify">
                Didirikan pada tahun 2010, JaringanNet telah berkembang dari sebuah perusahaan kecil menjadi salah satu
                penyedia layanan internet terkemuka di Indonesia. Dengan dedikasi untuk memberikan layanan terbaik, kami
                telah melayani ribuan pelanggan, baik individu maupun bisnis.
            </p>
        </section>

        <!-- Informasi Kontak -->
        <section>
            <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Hubungi Kami</h2>
            <div class="bg-white shadow-md rounded-lg p-6">
                <p class="text-gray-600">Butuh informasi lebih lanjut? Silakan hubungi kami melalui:</p>
                <ul class="list-none mt-4 text-gray-600 space-y-2">
                    <li><strong>Email:</strong> support@jaringannet.com</li>
                    <li><strong>Telepon:</strong> +62 812-3456-7890</li>
                    <li><strong>Alamat:</strong> Jl. Teknologi No.123, Jakarta, Indonesia</li>
                </ul>
            </div>
        </section>
    </main>

</x-app-layout>