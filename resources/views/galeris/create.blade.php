<h2>Add New Image</h2>
<form action="{{ route('galeris.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="file" name="image" required>
    <button type="submit">Save</button>
</form>
