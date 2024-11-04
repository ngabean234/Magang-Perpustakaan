<!-- Small boxes (Stat box) -->
<div class="row" style="margin-top: 20px">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $books }}</h3>

                <p>Buku</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="{{ url('book') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box for gallery -->
        <div class="small-box bg-primary"> <!-- Ganti warna sesuai keinginan -->
            <div class="inner">
                {{-- <h3>{{ $categories }}</h3> --}}
                <p>Galeri</p>
            </div>
            <div class="icon">
                <i class="fa fa-image"></i>
            </div>
            <a href="{{ url('galeris') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $categories }}</h3>

                <p>Kategori</p>
            </div>
            <div class="icon">
                <i class="fa fa-list"></i>
            </div>
            <a href="{{ url('kategory') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $anggota }}</h3>

                <p>Anggota</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ url('anggota') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $comment }}</h3>

                <p>Review</p>
            </div>
            <div class="icon">
                <i class="fa fa-bookmark"></i>
            </div>
            <a href="{{ url('review') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-6">
        <div class="alert alert-warning">
            <i class="icon fas fa-info"></i> Kalkulasi Total Pengunjung :<br>
            <table>
                <thead>
                    <tr>
                        <th>Hari ini</th>
                        <td>:</td>
                        <td>{{ $hari_ini }} Orang</td>
                    </tr>
                    <tr>
                        <th>Bulan ini</th>
                        <td>:</td>
                        <td>{{ $bulan_ini }} Orang</td>
                    </tr>
                    <tr>
                        <th>Tahun ini</th>
                        <td>:</td>
                        <td>{{ $tahun_ini }} Orang</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="alert alert-info">
            <i class="icon fas fa-info"></i>Total Rata -rata Pembaca :<br>
            <table>
                <thead>
                    <tr>
                        <th>laki -laki</th>
                        <td>:</td>
                        <td>{{ $lk }} Orang</td>
                    </tr>
                    <tr>
                        <th>Perempuan</th>
                        <td>:</td>
                        <td>{{ $pr }} Orang</td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td>:</td>
                        <td>{{ $ageavg}} Tahun</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header" style="background-color: var(--blue);color: white">
        <h3 class="card-title">IP Pengunjung</h3>
    </div>
    <div class="card-body">
        <div class="table table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Ip Visitor</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key=>$dt)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $dt->ip_visitor }}</td>
                        <td>{{date('d-F-Y H:i:s', strtotime($dt->created_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Ip Visitor</th>
                        <th>Tanggal</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div> 
</div>
