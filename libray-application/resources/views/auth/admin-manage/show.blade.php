<!-- Tambahkan metode PUT untuk update -->
    <div class="modal-body">
        <div class="mb-5">
            <label for="edit-name" class="form-label">Nama</label>
            <input type="text" class="form-control" readonly value="{{ $users->name }}" name="name" id="edit-name" required>
        </div>
        <div class="mb-5">
            <label for="edit-email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $users->email }}" id="edit-email"
                required readonly>
        </div>
        <div class="mb-5">
            <label for="edit-role" class="form-label">Role</label>
            <select name="role" id="edit-role" class="form-control" required disabled>
                <option selected disabled>{{ $users->role }}</option>
            </select>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kembali</button>
    </div>
    </div>

