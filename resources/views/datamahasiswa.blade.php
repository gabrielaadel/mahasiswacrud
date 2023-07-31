<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <h1 class="text-center mb-4">Data Mahasiswa</h1>

        <div class="container">
            <a href="/tambahmahasiswa" class="btn btn-secondary">Add Data</a>
            <div class="row g-3 align-items-center mt-2">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Search</label>
                  </div>
                <div class="col-auto">
                <form action="/mahasiswa" method="GET">
                  <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
                </form>
                </div>

                <div class="col-auto">
                    <a href="/exportpdf" class="btn btn-info">Export PDF</a>
                    </div>
                <div class="col-auto">
                    <a href="/exportexcel" class="btn btn-success">Export Excel</a>
                    </div>
                <div class="col-auto">
                        <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Import Data
                </button>
                     </div>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Import Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/importexcel" method="POST" enctype="multipart/form-data">
            @csrf

        <div class="modal-body">
            <div class="form-group">
                <input type="file" name="file" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
      </div>
    </form>
    </div>
  </div>


            </div>
            <div class="row">
            {{--@if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                {{ $message }}
                </div>
            @endif--}}
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Semester</th>
                        <th scope="col">No Handphone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                    <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->nim }}</td>
                        <td>{{ $row->fakultas }}</td>
                        <td>{{ $row->semester }}</td>
                        <td>{{ $row->no_handphone }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}">Delete</a>
                        </td>
                      </tr>
                    @endforeach



                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>
    $('.delete').click( function(){
        var mahasiswaid = $(this).attr('data-id')
        swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this data!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
        })
        .then((willDelete) => {
  if (willDelete) {
    window.location = "/delete/"+mahasiswaid+""
    swal("Your data has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your data is safe!");
  }

        });
    });
</script>

<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif

</script>
</html>
