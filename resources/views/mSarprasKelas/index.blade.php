@extends('layouts.LayoutBE')
 
@section('content')
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="content">
                    <div class="intro-y flex items-center mt-8">
                        <h2 class="text-lg font-medium mr-auto">
                            Data Kelas
                        </h2>
                    </div>
                    <div class="mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Basic Table -->
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                    <h2 class="font-medium text-base mr-auto">
                                        Data Sarpras Kelas
                                    </h2>
                                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                        <a href="{{ route('Aksi.create')}}" class="btn btn-primary shadow-md mr-2" role="button">Tambah Sarpras Kelas</a>
                                    </div>
                                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                        <a href="{{ route('editdatasarpras')}}" class="btn btn-primary shadow-md mr-2" role="button">Edit Sarpras Kelas</a>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <table class="table table-striped table-responsive yajra-datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Barang</th>
                                                <th>Kondisi</th>
                                                <th>Lokasi</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table> 
                                </div>
                            </div>
                            <!-- END: Basic Table -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
    </div>
    <!-- END: Content -->
@endsection
@push('scripts')
<script type="text/javascript">
    $(function () {
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('saprasKelas.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama_barang', name: 'nama barang'},
                {data: 'jumlah_barang', name: 'jumlah barang'},
                {data: 'kondisi', name: 'kondisi'},
                {data: 'ruang', name: 'lokasi'},
                {
                    orderable: true, 
                    searchable: true
                },
            ]
        });
    });
</script>
@endpush