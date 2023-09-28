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
                            Laporan Kebersihan Sekolah
                        </h2>
                    </div>
                    <div class="mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Basic Table -->
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                    <h2 class="font-medium text-base mr-auto">
                                        Data Kebersihan Sekolah
                                    </h2>
                                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                        <select id="bulan" name="bulan" id="update-profile-form-3" data-search="true" class="tail-select w-full">
                                            <option value="">Pilih Bulan</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">Maret</option>
                                                <option value="April">April</option>
                                                <option value="May">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="July">July</option>
                                                <option value="Augustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Ocktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                        </select>
                                    </div>
                                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                        <a href="#" id="cari-button" class="btn btn-primary shadow-md mr-2" role="button">Cari</a>
                                    </div>
                                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                        <a href="{{ route('Try.create')}}" class="btn btn-primary shadow-md mr-2" role="button">Tambah Data</a>
                                    </div>
                                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                        <a href="{{ route('editReqSarpras')}}" class="btn btn-primary shadow-md mr-2" role="button">Edit Data</a>
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
                                                <th>Ruangan / Lantai</th>
                                                <th>Status Kebersihan</th>
                                                <th>Tanggal</th>
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
        $('#cari-button').on('click', function () {
            var selectedBulan = $('#bulan').val();

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('reqClean.list') }}",
                    data: {
                        bulan: selectedBulan 
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama_assets', name: 'ruangan / kelas'},
                    {data: 'kebersihan', name: 'status kebersihan'},
                    {
                        data: 'tanggal_kebersihan', 
                        name: 'tanggal',
                        orderable: true, 
                        searchable: true
                    },
                ]
            });
        });
    }); 
</script>
@endpush