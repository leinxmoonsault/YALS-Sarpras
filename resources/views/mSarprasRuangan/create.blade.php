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
                                        Form Tambah Sarpras Ruangan
                                    </h2>
                                </div>
                                <div class="p-5">
                                    <form action="{{ route('Do.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid-cols-12">
                                            <div class="col-span-12 xxl:col-span-6">
                                                <div>
                                                    <label for="update-profile-form-3" class="form-label">Ruang</label>
                                                    <select id="ruang" name="lantai" id="update-profile-form-3" data-search="true" class="tail-select w-full">
                                                        <option value="">Pilih ruangan terlebih dahulu</option>
                                                        @foreach ( $ruangan as $data )
                                                            <option value="{{ $data->id_ruangan }}">{{$data->nama_ruangan}} / {{$data->lantai}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
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
                                        <div class="flex gap-5 mt-5">
                                            <div class="col-span-12 xl:col-span-6 flex">
                                                <div class="flex-grow mt-3 mr-3">
                                                    <label for="update-profile-form-1" class="form-label">Nama Barang</label>
                                                    <input name="nama_barang[]" id="update-profile-form-1" type="text" class="form-control" placeholder="Input text">
                                                </div>
                                                <div class="flex-grow mt-3 mr-3">
                                                    <label for="update-profile-form-2" class="form-label">Jumlah Barang</label>
                                                    <input name="jumlah_barang[]" id="update-profile-form-2" type="text" class="form-control" placeholder="Input text">
                                                </div>
                                                <div class="flex-grow mt-3 mr-3">
                                                    <label for="update-profile-form-3" class="form-label">Kondisi Barang</label>
                                                    <input name="kondisi_barang[]" id="update-profile-form-3" type="text" class="form-control" placeholder="Input text">
                                                </div>
                                                <div class="flex-grow mt-3 mr-3">
                                                    <label for="update-profile-form-2" class="form-label">Keterangan Barang</label>
                                                    <input name="ket_barang[]" id="update-profile-form-2" type="text" class="form-control" placeholder="Input text" value="-">
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="flex gap-5 mt-5">
                                            <div class="col-span-12 xl:col-span-6 flex">
                                                <div class="flex-grow mt-3 mr-3">
                                                    <label for="update-profile-form-1" class="form-label">Nama Barang</label>
                                                    <input name="nama_barang[]" id="update-profile-form-1" type="text" class="form-control" placeholder="Input text">
                                                </div>
                                                <div class="flex-grow mt-3 mr-3">
                                                    <label for="update-profile-form-2" class="form-label">Jumlah Barang</label>
                                                    <input name="jumlah_barang[]" id="update-profile-form-2" type="text" class="form-control" placeholder="Input text">
                                                </div>
                                                <div class="flex-grow mt-3 mr-3">
                                                    <label for="update-profile-form-3" class="form-label">Kondisi Barang</label>
                                                    <input name="kondisi_barang[]" id="update-profile-form-3" type="text" class="form-control" placeholder="Input text">
                                                </div>
                                                <div class="flex-grow mt-3 mr-3">
                                                    <label for="update-profile-form-2" class="form-label">Keterangan Barang</label>
                                                    <input name="ket_barang[]" id="update-profile-form-2" type="text" class="form-control" placeholder="Input text" value="-">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="input-container">

                                        </div>
                                        <div class="flex justify-end mt-4">
                                            <button type="button" id="add-input" class="btn btn-primary mr-auto">Tambah Form</button>
                                            <input type="submit" class="btn btn-primary ml-3" value="Submit">                                           
                                        </div>
                                    </form>
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
    document.addEventListener("DOMContentLoaded", function() {
    const addInputButton = document.getElementById("add-input");
    const inputContainer = document.getElementById("input-container");

    let inputCount = 1;

        addInputButton.addEventListener("click", function() {
            const newInputContainer = document.createElement("div");
            newInputContainer.className = "flex gap-5 mt-5";

            const inputTemplate = `
            <div class="col-span-12 xl:col-span-6 flex">
                <div class="flex-grow mt-3 mr-3">
                    <label for="update-profile-form-1" class="form-label">Nama Barang</label>
                    <input name="nama_barang[]" id="update-profile-form-1" type="text" class="form-control" placeholder="Input text">
                </div>
                <div class="flex-grow mt-3 mr-3">
                    <label for="update-profile-form-2" class="form-label">Jumlah Barang</label>
                    <input name="jumlah_barang[]" id="update-profile-form-2" type="text" class="form-control" placeholder="Input text">
                </div>
                <div class="flex-grow mt-3 mr-3">
                    <label for="update-profile-form-3" class="form-label">Kondisi Barang</label>
                    <input name="kondisi_barang[]" id="update-profile-form-3" type="text" class="form-control" placeholder="Input text">
                </div>
                <div class="flex-grow mt-3 mr-3">
                    <label for="update-profile-form-2" class="form-label">Keterangan Barang</label>
                    <input name="ket_barang[]" id="update-profile-form-2" type="text" class="form-control" placeholder="Input text" value="-">
                </div>
            </div>
            `;

            newInputContainer.innerHTML = inputTemplate;
            inputContainer.appendChild(newInputContainer);

            inputCount++;
        });
    });

    $(function () {
        $('#ruang').change(function () {
            var selectedValue = $(this).val();

            $.ajax({
                url: "{{ route('getExisted.data', '') }}/" + selectedValue,
                method: 'GET',
                success: function (data) {
                    $('#result-container').empty();

                    $.each(data, function (index, item) {
                        // Buat elemen HTML untuk menampilkan data, misalnya dalam <div>
                            var html = '<div class="col-span-12 xl:col-span-6 flex">' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="update-profile-form-1" class="form-label">Nama Barang</label>' +
                                        '<input name="nama_barang[]" value="' + item.nama_barang + '" id="update-profile-form-1" type="text" class="form-control" placeholder="Input text" disabled>' +
                                        '</div>' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="update-profile-form-2" class="form-label">Jumlah Barang</label>' +
                                        '<input name="jumlah_barang[]" value="' + item.jumlah_barang + '" id="update-profile-form-2" type="text" class="form-control" placeholder="Input text" disabled>' +
                                        '</div>' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="update-profile-form-3" class="form-label">Kondisi Barang</label>' +
                                        '<input name="kondisi_barang[]" value="' + item.kondisi + '" id="update-profile-form-3" type="text" class="form-control" placeholder="Input text" disabled>' +
                                        '</div>' +
                                        '<div class="flex-grow mt-3 mr-3">' +
                                        '<label for="update-profile-form-4" class="form-label">Keterangan Barang</label>' +
                                        '<input name="ket_barang[]" value="' + item.keterangan + '" id="update-profile-form-4" type="text" class="form-control" placeholder="Input text" disabled>' +
                                        '</div>' +
                                        '</div>';


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
</script>
@endpush
