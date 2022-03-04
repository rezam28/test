<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/69e0e324fb.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" 
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <title>DataTable</title>
</head>
<body>
    <div class="container">
        <table class="table table-striped table-bordered" id="cus-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                </tr>
            </thead>
        </table>
    </div>
    
      <div id="modal-tambah" class="modal fade" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 id="modal-title" class="modal-title w-100 font-weight-bold">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <form id="form-customer" class="form-horizontal" name="form-customer">
                          @csrf
                          <input type="hidden" name="customer_id" id="customer_id" value="" required>
                          <div class="form-group">
                            <label for="nama">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="nama" id="nama" value="" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="alamat">alamat</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="alamat" id="alamat" value="" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="name">latitude</label>
                            <div class="col-sm-12">
                                <textarea class="from-control" name="latitude" id="latitude" cols="55" value="" required></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="name">longitude</label>
                            <div class="col-sm-12">
                                <textarea class="from-control" name="longitude" id="longitude" cols="55" value="" required></textarea>
                            </div>
                          </div>
                          <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="cus_type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Customer Type
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">a</a>
                                <a class="dropdown-item" href="#">a</a>
                                <a class="dropdown-item" href="#">a</a>
                            </div>
                        </div>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                            <input placeholder="masukkan tanggal Lahir" type="text" class="form-control datepicker" id="datepicker" name="tgl_akhir">
                        </div>
                          <div class="modal-footer">
                            <button type="submit" id="btn_tambah" class="btn btn-outline-success" value="tambah">Tambah</button>
                            <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
              </div>
          </div>
      </div>

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).ready(function() {
            $('#cus-table').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                ajax: '/customer',
                columns: [
                    { data:  null },
                    { data: 'nama', name: 'nama' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'ttl', name: 'ttl' },
                    
                ],
                buttons: [
                    {
                        text: 'My button',
                        action: function ( e, dt, node, config ) {
                            $('#modal-tambah').modal('show');
                        }
                    }
                ],
            });
        });

        $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });

        if ($("#form-customer").length > 0) {
            $("#form-customer").validate({
                submitHandler: function (form) {
                    var actionType = $('#btn_tambah').val();
                    $('#btn_tambah').html('Sending..');
                    $.ajax({
                        data: $('#form-customer')
                            .serialize(), 
                        url: "/customer", 
                        type: "POST", 
                        dataType: 'json',
                        success: function (data) { 
                            $('#form-customer').trigger("reset");
                            $('#modal-tambah').modal('hide'); 
                            $('#btn_tambah').html('Simpan'); 
                            var Table = $('#cus-table').dataTable(); 
                            Table.fnDraw(false);
                            console.log(data);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                            $('#btn_tambah').html('Simpan');
                            console.log(data);
                        }
                    });
                }
            })
        }
    </script>
</body>
</html>