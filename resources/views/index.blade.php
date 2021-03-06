<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel8</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Datatable -->
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <button class="btn btn-md btn-success mb-3" data-toggle="modal"
                            data-target="#exampleModal">TAMBAH BLOG</button>
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 shadow rounded">
                                <div class="card-body">
                                    <form id="formtambah" type="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="font-weight-bold">GAMBAR</label>
                                            <input type="file" id="image"
                                                class="form-control @error('image') is-invalid @enderror" name="image">

                                            <!-- error message untuk title -->
                                            @error('image')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">JUDUL</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                name="title" value="{{ old('title') }}"
                                                placeholder="Masukkan Judul Blog">

                                            <!-- error message untuk title -->
                                            @error('title')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">KONTEN</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror"
                                                name="content" rows="5"
                                                placeholder="Masukkan Konten Blog">{{ old('content') }}</textarea>

                                            <!-- error message untuk content -->
                                            @error('content')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <button type="submit" id="saveBtn"
                                            class="btn btn-md btn-primary">SIMPAN</button>
                                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal -->

    <!-- Modal Edit -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 shadow rounded">
                                <div class="card-body">
                                    <form id="formedit" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="font-weight-bold">GAMBAR</label>
                                            <input type="file" id="imageedit" class="form-control" name="image">
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">JUDUL</label>
                                            <input type="hidden" name="id" id="id_blog">
                                            <input type="text" id="title" class="form-control" name="title"
                                                placeholder="Masukkan Judul Blog">
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">KONTEN</label>
                                            <textarea id="content" class="form-control" name="content" rows="5"
                                                placeholder="Masukkan Konten Blog"></textarea>
                                        </div>

                                        <button type="submit" id="editBtn"
                                            class="btn btn-md btn-primary">SIMPAN</button>
                                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/blog') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        "render": function (data, type, full, meta) {
                            return "<img src=\"{{ Storage::url('public/blogs/') }}" + data +
                                "\" class=\"rounded\" style=\"width: 150px\"/>";
                        },
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'content',
                        name: 'content'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#formtambah').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/blog/store') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#saveBtn").prop('disabled', true); // disable button
                    },
                    success: function (data) {
                        table.draw();
                        $('#formtambah').trigger("reset");
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });
                        toastr.success('Data berhasil ditambahkan');
                        $("#saveBtn").prop('disabled', false);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.edit', function () {
                var blog_id = $(this).data('id');
                $.get("{{ url('/blog') }}" + '/' + blog_id, function (data) {
                    $('#id_blog').val(blog_id);
                    $('#title').val(data.title);
                    $('#content').val(data.content);
                })
            });

            $('#formedit').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('_method', 'patch'); 
                var id_blog = $('#formedit').find('input[name="id"]').val();
                $.ajax({
                    type: "POST",
                    data: formData,
                    url: "{{ url('/blog') }}" + '/' + id_blog,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#editBtn").prop('disabled', true); // disable button
                    },
                    success: function (data) {
                        table.draw();
                        $('#formedit').trigger("reset");
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });
                        toastr.success('Data berhasil diedit');
                        $("#editBtn").prop('disabled', false);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#editBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.hapus', function () {
                var book_id = $(this).data("id");
                $confirm = confirm("Data akan dihapus !");
                if ($confirm == true) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('/blog/destroy') }}" + '/' + book_id,
                        success: function (data) {
                            table.draw();
                            toastr.error('Data berhasil dihapus');
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });

        });

    </script>

</body>

</html>
