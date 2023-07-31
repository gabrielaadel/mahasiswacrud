<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 4px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 8px;
  text-align: center;
  background-color: #183f31;
  color: white;
}
</style>
</head>
<body>

<h1>Data Mahasiswa</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Fakultas</th>
    <th>Semester</th>
    <th>No Handphone</th>
    <th>Email</th>
  </tr>
  @php
      $no=1;
  @endphp
  @foreach ($data as $row)
  <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->nim }}</td>
    <td>{{ $row->fakultas }}</td>
    <td>{{ $row->semester }}</td>
    <td>{{ $row->no_handphone }}</td>
    <td>{{ $row->email }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>
