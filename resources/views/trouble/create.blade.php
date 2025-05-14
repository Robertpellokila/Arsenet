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
    <div class="container mt-16">
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

                <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Laporan Masalah Jaringan</h3>
                <form id="trouble-form" action="{{ route('trouble.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="alamat" class="block text-gray-700">Alamat</label>
                        <input type="text" id="alamat" name="alamat"
                            class="w-full p-3 border border-gray-300 rounded-lg" required />
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                            Masalah</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Leave a comment..."></textarea>
                    </div>

                    <div class="col-span-full mb-2">
                        <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Foto Masalah</label>
                        <div
                            class="mt-2 flex flex-col items-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <!-- Preview Gambar -->
                            <img id="preview" class="mb-4  rounded-lg shadow hidden" />

                            <!-- SVG Icon (Akan disembunyikan ketika gambar muncul) -->
                            <svg id="icon-upload" class="size-12 text-gray-300 transition-opacity duration-300"
                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <!-- Label Upload -->
                            <div class="mt-4 flex text-sm/6 text-gray-600">
                                <label for="foto"
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="foto" name="foto" type="file" class="sr-only"
                                        accept="image/jpeg, image/png" capture="environment">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs/5 text-gray-600">PNG, JPG up to 5MB</p>
                        </div>
                    </div>

                    {{-- <div class="mb-4">
                        <label for="foto" class="block text-gray-700 font-semibold">Upload Foto</label>

                        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                            <label for="foto" class="cursor-pointer text-indigo-600 font-semibold hover:underline">
                                Upload Foto
                            </label>
                            <input type="file" id="foto" name="foto" accept="image/jpeg, image/png"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
                        </div>
                    </div> --}}

                    <button type="submit"
                        class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition duration-300">Kirim
                        Pesan</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.getElementById('foto').addEventListener('change', function(event) {
            let file = event.target.files[0];
            let preview = document.getElementById('preview');
            let iconUpload = document.getElementById('icon-upload');
    
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    iconUpload.classList.add('hidden'); // Sembunyikan ikon saat gambar muncul
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</x-app-layout>