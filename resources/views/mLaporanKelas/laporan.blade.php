<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Laporan Sarpras Kelas</title>
      <style>
            @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css');

            table {
                  border-collapse: collapse;
                  width: 100%;
            }
            
            th, td {
                  border: 1px solid #dddddd;
                  text-align: left;
                  padding: 8px;
            }
      </style>
</head>
<body>
      <div>
            <img src="{{ public_path('Laporan/kop.png') }}" alt="KopSurat">
      </div>
      <!-- Isi Surat -->
      <br>
      
      <div class="container text-center">
            <h4 class="text-start">Kelas : </h4>
            <table class="table table-bordered mx-auto">
                  <thead>
                  <tr>
                        <th class="">No</th>
                        <th class="">Nama Barang</th>
                        <th class="">Jumlah Barang</th>
                        <th class="">Kondisi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $data)
                  <tr>
                        <td class="">{{++$i}}</td>
                        <td class="">{{$data->nama_barang}}</td>
                        <td class="">{{$data->jumlah_barang}}</td>
                        <td class="">{{$data->kondisi}}</td>
                  </tr>
                  @endforeach
                  </tbody>
            </table>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
