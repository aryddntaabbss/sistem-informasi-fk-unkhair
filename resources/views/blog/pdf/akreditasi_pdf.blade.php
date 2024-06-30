<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        table {
            width: 100%;
            font-size: 12px;
            /* Perkecil font dalam tabel */
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            vertical-align: middle;
            /* Agar teks berada di tengah secara vertikal */
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000;
            /* Pastikan border hitam untuk semua sel */
        }

        .head {
            font-size: 16pt;
            font-weight: bold;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <p class="head text-center my-0">Data Akreditasi</p>
    <p class="head text-center my-0">Fakultas Teknik</p>
    <p class="head text-center my-0">Universitas Khairun</p>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Program</th>
                <th scope="col">Nama Program Studi</th>
                <th scope="col">Status / Peringkat</th>
                <th scope="col">Akreditasi Nasional No. dan Tgl. SK</th>
                <th scope="col">Tgl. Berakhir</th>
                <th scope="col">Akreditasi Internasional</th>
                <th scope="col">Tgl. Berakhir Akreditasi Internasional</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['akreditasi'] as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item['jenis'] }}</td>
                <td>{{ $item['nama_prodi'] }}</td>
                <td>{{ $item['peringkat'] }}</td>
                <td>{{ $item['akreditasi_nas'] }}</td>
                <td>{{ \Carbon\Carbon::parse($item['tgl_exp_akreditasi_nas'])->format('d/m/Y') }}</td>
                <td>{{ $item['akreditasi_inter'] }}</td>
                <td>{{ \Carbon\Carbon::parse($item['tgl_exp_akreditasi_inter'])->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>