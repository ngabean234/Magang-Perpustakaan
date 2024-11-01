<h2>Edit Image</h2>
<form action="{{ route('galeris.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $galeri->title }}" required>
    <textarea name="description" required>{{ $galeri->description }}</textarea>
    <input type="file" name="image">
    <img src="{{ asset($galeri->image_path) }}" width="150">
    <button type="submit">Update</button>
</form>
