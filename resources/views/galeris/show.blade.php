<h2>{{ $galeri->title }}</h2>
<p>{{ $galeri->description }}</p>
<img src="{{ asset($galeri->image_path) }}" alt="{{ $galeri->title }}" width="300">
<a href="{{ route('galeris.index') }}">Back to Gallery</a>
