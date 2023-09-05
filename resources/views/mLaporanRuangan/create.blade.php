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
                            Data Ruangan
                        </h2>
                    </div>
                    <div class="mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <div class="intro-y box lg:mt-5">
                                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-medium text-base mr-auto">
                                        Form Generate Laporan Sarpras Ruangan
                                    </h2>
                                </div>
                                <div class="p-5">
                                    <form action="{{ route('Toss.store') }}" method="POST" enctype="multipart/form-data" target="_blank">
                                        @csrf
                                        <div class="grid grid-cols-12 gap-x-5">
                                            <div class="col-span-12 xxl:col-span-6">
                                                <div>
                                                    <label for="update-profile-form-3" class="form-label">Ruang</label>
                                                    <select id="ruang" name="ruangan" id="update-profile-form-3" data-search="true" class="tail-select w-full">
                                                        <option value="">Pilih ruangan terlebih dahulu</option>
                                                        @foreach ( $ruangan as $data )
                                                            <option value="{{ $data->id_ruangan }}">{{$data->nama_ruangan}} / {{$data->lantai}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-span-12 xxl:col-span-6">
                                                <div class="mt-3 xxl:mt-0">
                                                    <label for="update-profile-form-3" class="form-label">Tanggal</label>
                                                    <div class="relative"> 
                                                        <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4"> 
                                                            <i data-feather="calendar" class="w-4 h-4"></i> 
                                                        </div> 
                                                        <input type="text" name="tanggal" class="datepicker form-control pl-12" data-single-mode="true"> 
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <input type="submit" class="btn btn-primary w-24" value="Generate PDF" id="generate-pdf-button">
                                            </div>
                                        </div>
                                    </form>
                                    <div id="faq-accordion-2" class="accordion accordion-boxed mt-5">
                                        <div class="accordion-item">
                                            <div id="faq-accordion-content-2" class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-6" aria-expanded="true" aria-controls="faq-accordion-collapse-6"> Barang Sarpas Ruangan Yang Sudah Di Input </button>
                                            </div>
                                            <div id="faq-accordion-collapse-6" class="accordion-collapse collapse" aria-labelledby="faq-accordion-content-2" data-bs-parent="#faq-accordion-2">
                                                <div class="accordion-body text-gray-700 dark:text-gray-600 leading-relaxed" id="result-container"> 
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                            </div>
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
        $('#ruang').change(function () {
            var selectedValue = $(this).val();
            
            $('#generate-pdf-button').prop('disabled', true);

            $.ajax({
                url: "{{ route('getExistedLaporanRuangan.data', '') }}/" + selectedValue,
                method: 'GET',
                success: function (data) {
                    $('#result-container').empty();

                    $.each(data, function (index, item) {
                        // Buat elemen HTML untuk menampilkan data, misalnya dalam <div>
                            var html = '<div class="col-span-12 xl:col-span-6 flex">' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="update-profile-form-1" class="form-label">Nama Barang</label>' +
                                        '<input value="' + item.nama_barang + '" id="update-profile-form-1" type="text" class="form-control" placeholder="Input text" disabled>' +
                                        '</div>' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="update-profile-form-2" class="form-label">Jumlah Barang</label>' +
                                        '<input value="' + item.jumlah_barang + '" id="update-profile-form-2" type="text" class="form-control" placeholder="Input text" disabled>' +
                                        '</div>' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="update-profile-form-3" class="form-label">Kondisi Barang</label>' +
                                        '<input value="' + item.kondisi + '" id="update-profile-form-3" type="text" class="form-control" placeholder="Input text" disabled>' +
                                        '</div>' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="update-profile-form-4" class="form-label">Keterangan Barang</label>' +
                                        '<input value="' + item.keterangan + '" id="update-profile-form-4" type="text" class="form-control" placeholder="Input text" disabled>' +
                                        '</div>' +
                                        '</div>';


                        // Tambahkan elemen HTML ke container
                        $('#result-container').append(html);
                        $('#generate-pdf-button').prop('disabled', false);
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#generate-pdf-button').prop('disabled', false);
                }
            });
        });
    });
</script>
@endpush
