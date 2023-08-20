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
                                        Data Kelas
                                    </h2>
                                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                        <a href="{{ route('Action.create')}}" class="btn btn-primary shadow-md mr-2" role="button">Tambah Kelas</a>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <table class="table table-striped table-responsive yajra-datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kelas</th>
                                                <th>Lantai</th>
                                                <th>Opsi</th>
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
            ajax: "{{ route('kelas.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama_kelas', name: 'kelas'},
                {data: 'lantai', name: 'lantai'},
                {
                    data: 'action', 
                    name: 'opsi', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });

        $('.yajra-datatable').on('click', '.delete', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            if (confirm('Hapus Kelas Ini ?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        console.log(response.message);
                        table.ajax.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
@endpush