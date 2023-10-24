<!DOCTYPE html>
<html>
<head>
    <title>Laporan Bulan {{ \Carbon\Carbon::parse('01-'.request()->bulan)->isoFormat('MMMM') }} Kelas
        @php
        $kelas = App\Models\Kelas::find(Auth::user()->id_kelas);
        if ($kelas) {
            echo $kelas->tingkat;
            echo " ";
            echo $kelas->kelas;
        }
        @endphp

    </title>
    <style>
        .header-divider {
            border-bottom: 1px solid #000;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ffd900;
        }
        th.text-uppercase {
            text-transform: uppercase;
            font-weight: bold;
        }
        th[rowspan="2"], th[colspan="3"] {
            background-color: #ffd900;
        }
        th[rowspan="2"] {
            text-transform: uppercase;
            font-weight: bold;
        }
        td.text-center {
            text-align: center;
        }
        .fs-5 {
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center">Laporan Bulanan</h2>
    <h3 style="text-align: center">
        Bulan : {{ \Carbon\Carbon::parse('01-'.request()->bulan)->isoFormat('MMMM') }}
    </h3>
    <h3 style="text-align: center">Kelas : 
        @php
        $kelas = App\Models\Kelas::find(Auth::user()->id_kelas);
        if ($kelas) {
            echo $kelas->tingkat;
            echo " ";
            echo $kelas->kelas;
        }
        @endphp
    </h3>
    <div class="header-divider"></div>

    <h4>A. Daftar Kehadiran Guru</h4>
    <table>
        <thead>
            <tr>
                <th rowspan="2" class="text-uppercase">No</th>
                <th rowspan="2" class="text-uppercase">Nama Guru</th>
                <th rowspan="2" class="text-uppercase">Mata Pelajaran</th>
                <th colspan="3" class="text-uppercase">Jumlah Keterangan Per Bulan</th>
            </tr>
            <tr>
                <th class="text-uppercase">Masuk Kelas</th>
                <th class="text-uppercase">Penugasan</th>
                <th class="text-uppercase">Absen dan Tidak Ada Tugas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($absenGurus as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $item->jadwal->gurumapel->guru->nama }}</td>
                <td class="text-center">{{ $item->jadwal->gurumapel->mapel->nama_mapel }}</td>
                <td class="text-center">{{ $item->hadir }}</td>
                <td class="text-center">{{ $item->penugasan }}</td>
                <td class="text-center">{{ $item->tidakhadir }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center fs-5">Belum ada Data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <h4>B. Daftar Kehadiran Siswa</h4>
    <table>
        <thead>
            <tr>
                <th rowspan="2" class="text-uppercase">No</th>
                <th rowspan="2" class="text-uppercase">Nama Siswa</th>
                <th colspan="4" class="text-uppercase">Jumlah Keterangan Per Bulan</th>
            </tr>
            <tr>
                <th class="text-uppercase">Sakit</th>
                <th class="text-uppercase">Izin</th>
                <th class="text-uppercase">Alpa</th>
                <th class="text-uppercase">Dispensasi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($absenSiswas as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $item->siswa->nama }}</td>
                <td class="text-center">{{ $item->sakit }}</td>
                <td class="text-center">{{ $item->izin }}</td>
                <td class="text-center">{{ $item->alpa }}</td>
                <td class="text-center">{{ $item->dispensasi }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center fs-5">Belum ada Data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="right-align">
        <br>
        <br>
        <p style="text-align: right">……………………………, …………………20…………</p>
        <br>Mengetahui,
        <br>
        <br>
        <div>
            Kepala Sekolah
            <span style="margin-left: 170px">Kepala Kompetensi</span>
            <span style="margin-left: 190px">Wali Kelas</span>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div>
            ( ……………… )
            <span style="margin-left: 160px">( ……………… )</span>
            <span style="margin-left: 185px">( ……………… )</span>
        </div>
    </div>
</body>
</html>
