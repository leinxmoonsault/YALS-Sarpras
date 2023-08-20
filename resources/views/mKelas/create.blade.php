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
                                        Display Information
                                    </h2>
                                </div>
                                <div class="p-5">
                                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                                        <div class="flex-1 mt-6 xl:mt-0">
                                            <form action="{{ route('Action.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                            <div class="grid grid-cols-12 gap-x-5">
                                                <div class="col-span-12 xxl:col-span-6">
                                                    <div>
                                                        <label for="update-profile-form-1" class="form-label">Nama Kelas</label>
                                                        <input name="nama_kelas" id="update-profile-form-1" type="text" class="form-control" placeholder="Input Kelas Contoh : X-1, XI-IPA-2">
                                                    </div>
                                                </div>
                                                <div class="col-span-12 xxl:col-span-6">
                                                    <div class="mt-3 xxl:mt-0">
                                                        <label for="update-profile-form-3" class="form-label">Lantai</label>
                                                        <select name="lantai" id="update-profile-form-3" data-search="true"  class="tail-select w-full">
                                                            <option value="Lantai 1">Lantai 1</option>
                                                            <option value="Lantai 2">Lantai 2</option>
                                                            <option value="Lantai 3">Lantai 3</option>
                                                            <option value="Lantai 4">Lantai 4</option>
                                                            <option value="Lantai 5">Lantai 5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right mt-5">
                                                <input type="submit" class="btn btn-primary w-24" value="Tambah">
                                                <input type="reset" class="btn btn-outline-secondary w-24 mr-1" value="Reset">
                                            </div>
                                            </form>
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
