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
                            <div class="intro-y box lg:mt-5">
                                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-medium text-base mr-auto">
                                        Form Tambah Sarpras Kelas
                                    </h2>
                                </div>
                                <div class="p-5">
                                    <div class="grid-cols-12">
                                        <div class="col-span-12 xxl:col-span-6">
                                            <div>
                                                <label for="update-profile-form-3" class="form-label">Ruang kelas</label>
                                                <select id="ruang-kelas" name="lantai" id="update-profile-form-3" data-search="true" class="tail-select w-full">
                                                    <option value="">Pilih kelas terlebih dahulu</option>
                                                    @foreach ( $kelas as $data )
                                                        <option value="{{ $data->id_kelas }}">{{$data->nama_kelas}} / {{$data->lantai}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="faq-accordion-2" class="accordion accordion-boxed mt-5">
                                        <div class="accordion-item">
                                            <div id="faq-accordion-content-2" class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-6" aria-expanded="true" aria-controls="faq-accordion-collapse-6"> Barang Sarpas Kelas Yang Sudah Di Input </button>
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
        $('#ruang-kelas').change(function () {
            var selectedValue = $(this).val();

            $.ajax({
                url: "{{ route('getExisted.data', '') }}/" + selectedValue,
                method: 'GET',
                success: function (data) {
                    $('#result-container').empty();

                    $.each(data, function (index, item) {
                        // Buat elemen HTML untuk menampilkan data, misalnya dalam <div>
                            var html =  '<form class="col-span-12 xl:col-span-6 flex">' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="nama-barang-' + index + '" class="form-label">Nama Barang</label>' +
                                        '<input name="nama_barang[]" value="' + item.nama_barang + '" id="nama-barang-' + index + '" type="text" class="form-control" placeholder="Input text">' +
                                        '</div>' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="jumlah-barang-' + index + '" class="form-label">Jumlah Barang</label>' +
                                        '<input name="jumlah_barang[]" value="' + item.jumlah_barang + '" id="jumlah-barang-' + index + '" type="text" class="form-control" placeholder="Input text">' +
                                        '</div>' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="kondisi-' + index + '" class="form-label">Kondisi Barang</label>' +
                                        '<input name="kondisi_barang[]" value="' + item.kondisi + '" id="kondisi-' + index + '" type="text" class="form-control" placeholder="Input text">' +
                                        '</div>' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="keterangan-' + index + '" class="form-label">Keterangan Barang</label>' +
                                        '<input name="ket_barang[]" value="' + item.keterangan + '" id="keterangan-' + index + '" type="text" class="form-control" placeholder="Input text">' +
                                        '</div>' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="update-profile-form-4" class="form-label">Opsi</label> <br>' +
                                        '<div class="inline-flex rounded-md shadow-sm" role="group">' +
                                        '<button class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-l-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" onclick="saveData(' + item.id + ', ' + index + ')">Update</button>' +
                                        '<button class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-r-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" onclick="deleteData(' + item.id + ')">Delete</button>' +
                                        '</div>' +
                                        '</div>' +
                                        '</form>';

                        // Tambahkan elemen HTML ke container
                        $('#result-container').append(html);
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        });
    });

    function saveData(id, index) {
        // Dapatkan nilai input dari form berdasarkan nomor iterasi
        var nama_barang = $('#nama-barang-' + index).val();
        var jumlah_barang = $('#jumlah-barang-' + index).val();
        var kondisi_barang = $('#kondisi-' + index).val();
        var ket_barang = $('#keterangan-' + index).val();

        // Lakukan AJAX request untuk menyimpan data ke server
        $.ajax({
            type: 'PUT', // Metode HTTP yang sesuai
            url: 'Aksi/' + id, // Ganti dengan URL yang sesuai
            data: {
                _token: '{{ csrf_token() }}', // Token CSRF
                nama_barang: nama_barang,
                jumlah_barang: jumlah_barang,
                kondisi: kondisi_barang,
                keterangan: ket_barang
            },
            success: function (response) {
                // Lakukan sesuatu setelah berhasil menyimpan data
                console.log('Data saved successfully');
            },
            error: function (error) {
                // Tangani kesalahan jika ada
                console.error('Error saving data:', error);
            }
        });
    }

    // Fungsi untuk menghapus data
    function deleteData(id) {
        // Lakukan AJAX request untuk menghapus data dari server
        $.ajax({
            type: 'DELETE', // Metode HTTP yang sesuai
            url: 'Aksi/' + id, // Ganti dengan URL yang sesuai
            data: {
                _token: '{{ csrf_token() }}' // Token CSRF
            },
            success: function (response) {
                // Lakukan sesuatu setelah berhasil menghapus data
                console.log('Data Deleted Successfully');
            },
            error: function (error) {
                // Tangani kesalahan jika ada
                console.error('Error deleting data:', error);
            }
        });
    }
</script>
@endpush
