<x-app-layout>

    @if (session('success'))
    <div id="alert-3" class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif
    <!-- Kontak Kami Section -->
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Kontak Kami</h2>

        <!-- Informasi Kontak -->
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Alamat dan Info Kontak -->
            <div class="space-y-4">
                <h3 class="text-2xl font-semibold text-gray-800">Alamat Kami</h3>
                <p class="text-gray-600">Jl. Raya Internet No. 123, Jakarta, Indonesia</p>
                <p class="text-gray-600">Telp: (021) 12345678</p>
                <p class="text-gray-600">Email: info@perusahaaninternet.com</p>

                <h3 class="text-2xl font-semibold text-gray-800 mt-6">Jam Operasional</h3>
                <p class="text-gray-600">Senin - Jumat: 09:00 - 18:00</p>
                <p class="text-gray-600">Sabtu: 10:00 - 14:00</p>
                <p class="text-gray-600">Minggu: Tutup</p>
            </div>

            <!-- Formulir Kontak dengan Quill.js -->
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Kirim Pesan</h3>
                <form id="contact-form" action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg"
                            required />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg"
                            required />
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700">Pesan</label>
                        <div id="editor-container" class="border border-gray-300 rounded-lg" style="height: 200px;">
                        </div>
                        <input type="hidden" name="message" id="message" />
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition duration-300">Kirim
                        Pesan</button>
                </form>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        


        <!-- Peta Lokasi -->
        <div class="mt-12">
            <h3 class="text-2xl font-semibold text-center text-gray-800 mb-4">Lokasi Kami</h3>
            <div class="w-full h-96">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3231.8258911704497!2d123.6018531740428!3d-10.157709689955876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c569cc78848e3c7%3A0xa63e72b4a7dd0236!2sArsenet%20Global%20Solusi!5e1!3m2!1sid!2sid!4v1737796469910!5m2!1sid!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <!-- Quill.js Script -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        // Inisialisasi Quill.js
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: 'Tulis pesan Anda di sini...',
            modules: {
                toolbar: [
                    [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['bold', 'italic', 'underline'],
                    [{ 'align': [] }],
                    ['link']
                ]
            }
        });

        // Menyimpan pesan dari editor Quill.js ke input hidden sebelum mengirimkan form
        document.getElementById('contact-form').onsubmit = function() {
            var message = quill.root.innerHTML;
            document.getElementById('message').value = message;  // Menyimpan isi pesan
        };
    </script>
</x-app-layout>