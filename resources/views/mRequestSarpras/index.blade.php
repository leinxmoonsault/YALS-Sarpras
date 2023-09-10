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
                                        Data Request Sarpras
                                    </h2>
                                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                        <a href="{{ route('Try.create')}}" class="btn btn-primary shadow-md mr-2" role="button">Tambah Request</a>
                                    </div>
                                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                        <a href="{{ route('editReqSarpras')}}" class="btn btn-primary shadow-md mr-2" role="button">Edit Request</a>
                                    </div>
                                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                        <a href="#" class="btn btn-primary shadow-md mr-2" role="button">Buat Laporan</a>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <table class="table table-striped table-responsive yajra-datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Ruangan / Kelas</th>
                                                <th>Nama Barang</th>
                                                <th>Request Dari</th>
                                                <th>Status</th>
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
            ajax: "{{ route('reqSapras.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'untuk_ruang', name: 'ruangan / kelas'},
                {data: 'nama_barang', name: 'nama barang'},
                {data: 'req_by', name: 'request dari'},
                {data: 'status', name: 'status'},
                {
                    data: 'keterangan', 
                    name: 'keterangan',    
                    orderable: true, 
                    searchable: true
                },
            ]
        });
    });
</script>
@endpush