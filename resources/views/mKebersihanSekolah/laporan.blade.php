<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Laporan Request Sarpras</title>
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
      <style>
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
            <img src="{{ public_path('Laporan/kop_req.png') }}" alt="KopSurat" width="100%">
      </div>
      <!-- Isi Surat -->
      <br>
      
      <div class="container text-center">
            <h4 class="text-start">Yang Mengajukan : Reshita Gusti Vianinggar, S.Pd </h4>
            <h4 class="text-start">Yang Mengajukan : <?php echo date("d-M-Y"); ?></h4>
            <table class="table table-bordered mx-auto">
                  <thead>
                  <tr>
                        <th class="" >No</th>
                        <th class="" >Ruang</th>
                        <th class="" >Nama Barang</th>
                        <th class="" >Jumlah Barang</th>
                        <th class="" >Harga Barang</th>
                        <th class="" >Tanggal Request</th>
                        <th class="" >Status</th>
                        <th class="" >Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $data)
                  <tr>
                        <td class="">{{++$i}}</td>
                        <td class="">{{$data->untuk_ruang}}</td>
                        <td class="">{{$data->nama_barang}}</td>
                        <td class="">{{$data->jumlah_barang}}</td>
                        <td class="">{{$data->harga_barang}}</td>
                        <td class="">{{$data->tanggal_req}}</td>
                        <td class="">{{$data->status}}</td>
                        <td class="">{{$data->keterangan}}</td>
                  </tr>
                  @endforeach
                  </tbody>
            </table>
            <div>
                  <p class="text-end">
                        <?php echo "Jakarta,".date("d-M-Y"); ?>
                  </p>
                  <div>
                        <img src="{{ public_path('Laporan/ttd_req.png') }}" alt="TTD">
                  </div>
            </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
