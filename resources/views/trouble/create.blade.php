<x-app-layout>
    @if (session('success'))
    <div id="alert-3"
        class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">

                {{-- <form action="{{ route('trouble.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                            name="address" value="{{ old('address') }}">
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Masalah</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                            name="description" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto Masalah (Opsional)</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                            name="photo">
                        @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                </form> --}}

                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Laporan Masalah Jaringan</h3>
                <form id="contact-form" action="{{ route('trouble.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="alamat" class="block text-gray-700">Alamat</label>
                        <input type="alamat" id="alamat" name="alamat" class="w-full p-3 border border-gray-300 rounded-lg"
                            required />
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-gray-700">Deskripsi Masalahnpm r</label>
                        <div id="editor-container" class="border border-gray-300 rounded-lg" style="height: 200px;">
                        </div>
                        <input type="hidden" name="deskripsi" id="deskripsi" />
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition duration-300">Kirim
                        Pesan</button>
                </form>
            </div>
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