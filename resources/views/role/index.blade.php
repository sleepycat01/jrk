@extends('adminlte::page')

@section('title', 'บทบาทการใช้งาน')

@section('content_header')

    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">บทบาทการใช้งาน</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าแรก</a></li>
                <li class="breadcrumb-item active">บทบาทการใช้งาน</li>
            </ol>
        </div>
    </div>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-lg btn-info mb-2 " href="{{route('roles.create')}}"><i class="fas fa-plus mr-2"></i>เพิ่มข้อมูล</a>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-sm" id="table" style="width: 100%">
                        <thead>
                        <tr>
                            <th style="width: 50px">
                                #
                            </th>
                            <th style="width: 100px">
                                Code
                            </th>
                            <th style="width: 100px">
                                ชื่อ
                            </th>
                            <th>
                                สิทธิ์การใช้งาน
                            </th>
                            <th style="width: 150px;">

                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('js')
    <script>
        var table = $('#table').DataTable({
            responsive: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Thai.json"
            },
            processing: true,
            serverSide: true,
            ajax: "{{route('roles.index')}}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'title', name: 'title'},
                {data: 'permissions', name: 'permissions'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            columnDefs: [
                { className: 'text-center', targets: [4] },
            ],
        })

        function deleteConfirmation(id){
            Swal.fire({
                icon: 'info',
                title: 'ลบข้อมูล',
                text: 'ยืนยันการลบข้อมูล',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                showLoaderOnConfirm: true,
                animation: false,
                preConfirm: (e) => {
                    return new Promise(function (resolve) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            type: 'DELETE',
                            url: "{{url('roles')}}/" + id,
                            data: {_token: CSRF_TOKEN},
                            dataType: 'JSON',
                            success: function (results) {
                                if (results.status === true) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: results.message,
                                        animation: false,
                                    })
                                    table.ajax.reload();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: results.message,
                                        animation:false,
                                    })
                                }

                            }
                        });
                    })
                },
            })
        }
    </script>
@stop
