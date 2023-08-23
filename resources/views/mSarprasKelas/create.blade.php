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
                                    <form action="{{ route('Aksi.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid-cols-12">
                                            <div class="col-span-12 xxl:col-span-6">
                                                <div>
                                                    <label for="update-profile-form-3" class="form-label">Ruang kelas</label>
                                                    <select name="lantai" id="update-profile-form-3" data-search="true"  class="tail-select w-full">
                                                        @foreach ( $kelas as $data )
                                                            <option value="{{ $data->id_kelas }}">{{$data->nama_kelas}} / {{$data->lantai}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="flex gap-5 mt-5">
                                            <div class="col-span-12 xl:col-span-6 flex">
                                                <div class="flex-grow mt-3 mr-3">
                                                    <label for="update-profile-form-1" class="form-label">Nama Barang</label>
                                                    <input id="update-profile-form-1" type="text" class="form-control ml-2" placeholder="Input text" value="Brad Pitt">
                                                </div>
                                                <div class="flex-grow mt-3 mr-3">
                                                    <label for="update-profile-form-2" class="form-label">Jumlah Barang</label>
                                                    <input id="update-profile-form-2" type="text" class="form-control ml-2" placeholder="Input text" value="Brad Pitt">
                                                </div>
                                                <div class="flex-grow mt-3 mr-3">
                                                    <label for="update-profile-form-3" class="form-label">Kondisi Barang</label>
                                                    <input id="update-profile-form-3" type="text" class="form-control ml-2" placeholder="Input text" value="Brad Pitt">
                                                </div>
                                                <div class="flex-grow mt-3 mr-3">
                                                    <label for="update-profile-form-2" class="form-label">Keterangan Barang</label>
                                                    <input id="update-profile-form-2" type="text" class="form-control ml-2" placeholder="Input text" value="Brad Pitt">
                                                </div>
                                            </div>
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
