<form action="{{ route('admin.users.update', $users->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Tambahkan ini karena route update menggunakan PUT -->

    <div class="modal-body">
        <div class="mb-5">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" value="{{ old('name', $users->name) }}" name="name" placeholder="Masukkan nama" required>
        </div>
        <div class="mb-5">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ old('email', $users->email) }}" name="email" placeholder="Masukkan email" required>
        </div>
        <div class="mb-5">
            <label for="password" class="form-label">Password <small>(Kosongkan jika tidak diubah)</small></label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan password baru (opsional)">
        </div>
        <div class="mb-5">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-control" required data-control="select2">
                <option value="user" {{ old('role', $users->role) === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role', $users->role) === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
    </div>

    <div class="modal-footer">
        <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
