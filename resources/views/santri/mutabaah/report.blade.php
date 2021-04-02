@extends('main.app')

@section('page-breadcrumb')
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Mutaba'ah Yaumiyah</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item text-muted active" aria-current="page">Mutaba'ah</li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Input</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                    <option selected>Aug 19</option>
                    <option value="1">July 19</option>
                    <option value="2">Jun 19</option>
                </select>
            </div>
        </div>
    </div>
@endsection

@section('page-wrapper')
    <div class="row">
        <div class="col-md-12">
            @include('components.message')
        </div>
    </div>

    <div class="row">


        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-dark">Agenda Mutaba'ah</h1>
                            <p>Klik tombol lihat laporan untuk melihat detail lembar mutaba'ah<br>
                            </p>
                        </div>

                        <div class="col-12">

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="table_data" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Mutaba'ah</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($widget['mutabaahProcessed'] as $item)
                                    @if ($item['inputed'] == 1)

                                    @endif

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['judul'] }}</td>
                                        <td>{{ $item['tanggal'] }}</td>
                                        <td>
                                            @if ($item['inputed'] == 1)
                                                <a href="{{route('santri.mutabaah.see_report',['id'=>$item['id']])}}">
                                                    <button type="button" class="btn btn-block btn-success btn-rounded"><i
                                                            class="fas fa-check"></i> Lihat Laporan</button>
                                                </a>
                                            @else
                                                @if ($item['status'] == 1)
                                                    <button type="button" class="btn btn-block btn-danger btn-rounded">
                                                        <i class=" fas fa-times-circle"></i>
                                                        Lembar Mutaba'ah Belum Diisi</button>
                                                    </button>
                                                @endif

                                                @if ($item['status'] == 0)
                                                    <button disabled type="button" class="btn btn-block btn-danger disabled mr-4">Status :
                                                        Ditutup</button>
                                                    <a href="{{ route('santri.mutabaah.input', $item['id']) }}">
                                                        <button type="button" class="btn btn-outline-danger disabled">Lembar
                                                            Mutabaah
                                                            Ditutup</button>
                                                    </a>
                                                @endif

                                                @if ($item['status'] == 2)
                                                    <h5 class="badge badge-warning">Pending</h5>
                                                @endif

                                            @endif


                                        </td>

                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                        <ul class="pagination float-right">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection


@section('app-script')
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4-4.1.1/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/r-2.2.7/sb-1.0.1/sp-1.2.2/datatables.min.js">
</script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js">
</script>

<script type="text/javascript">
    $(function() {
        var table = $('#table_data').DataTable({
            processing: true,
            serverSide: false,
            columnDefs: [{
                orderable: true,
                targets: 0
            }],
            dom: 'lrtipB',
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            buttons: [
                'copyHtml5',
            ],

        });




    });

</script>




@endsection
