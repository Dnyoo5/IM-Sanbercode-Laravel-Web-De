
    <div class="modal-body">
        <!-- Nama kategori -->
        <label for="nama_kategori" class="required">Nama Genre</label>
        <input
            type="text"
            name="name"
            class="form-control"
            placeholder="Masukan nama Genre"
            id="name"
            value="{{ old('name', $genre->name) }}" readonly
        />

        <!-- Pesan Error Nama kategori -->
        @error('name')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror

        <!-- Deskripsi -->
        <div class="form-group mt-5">
            <label for="deskripsi">Deskripsi</label>
            <textarea
                name="description"
                class="form-control"
                rows="10"
                placeholder="Masukan description" readonly
                id="description">{{ old('description', $genre->description) }}</textarea>
        </div>

        <!-- Pesan Error Deskripsi -->
        @error('description')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Kembali</button>
    </div>
