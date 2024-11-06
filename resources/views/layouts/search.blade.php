<div class="row mt-3">
    <div class="col-md-12">
        <p class="text-center" style="font-size: 20px"> Cari Buku</p>
        <form action="{{ url('search') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" id="search" autocomplete="off"
                    placeholder="Cari Judul Buku ...">
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> </button>
                </div>
            </div>
            {{ csrf_field() }}
            <ul class="list-group" id="result">
            </ul>
        </form>
    </div>
</div>
<hr>

@section('scripts')
<script>
    $('#search').keyup(function () {
        var query = $(this).val();
        if (query != '') {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('autocomplete.search') }}",
                method: "POST",
                data: {
                    query: query,
                    _token: _token
                },
                success: function (data) {
                    $('#result').fadeIn();
                    $('#result').html(data);
                }
            });
        }
    });

    $(document).on('click', 'li', function () {
        $('#result').fadeOut();
    });

</script>
@endsection

