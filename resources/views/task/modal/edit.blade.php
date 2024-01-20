<div class="modal fade" id="editUserModal{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="editUserModal{{ $index }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModal{{ $index }}Label">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update', $index) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="editName{{ $index }}">Name</label>
                        <input type="text" class="form-control" id="editName{{ $index }}" name="name" value="{{ $user['name'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="editAddress{{ $index }}">Address</label>
                        <input type="text" class="form-control" id="editAddress{{ $index }}" name="address" value="{{ $user['address'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="editGender{{ $index }}">Gender</label>
                        <select class="form-control" id="editGender{{ $index }}" name="gender" required>
                            <option value="Female" {{ $user['gender'] === 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Male" {{ $user['gender'] === 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Others" {{ $user['gender'] === 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editImage{{ $index }}">Image</label>
                        <input type="file" class="form-control" id="editImage{{ $index }}" name="image">
                    </div>
                    <div class="form-group">
                        <label>Current Image</label>
                        <img src="{{ asset('storage/' . $user['image']) }}" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
