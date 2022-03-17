@extends('adminlte::page')

@section('title', 'จัดการเครื่องจักร')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                จัดการเครื่องจักร
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าแรก</a></li>
                <li class="breadcrumb-item active">จัดการเครื่องจักร</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
{{--            <x-adminlte-button href="{{route('admins.create')}}" label="เพิ่มผู้ใช้" theme="info" icon="fas fa-plus"/>--}}
            <a class="btn btn-lg btn-info mb-2" href="{{route('machines.create')}}"><i class="fas fa-plus"></i> เพิ่มเครื่องจักร</a>
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm table-striped nowrap" id="table" style="width: 100%" >
                        <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                ชื่อเครื่องจักร
                            </th>
                            <th>
                                รหัสเครื่องจักร
                            </th>
                            <th>
                                สถานะ
                            </th>
                            <th>
                                จัดการ
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop

@section('css')

@stop
@section('plugins.Datatables', true)

@section('js')
    <script>
        var table = $('#table').DataTable({
            responsive: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Thai.json"
            },
            processing: true,
            serverSide: true,
            ajax: "{{route('machines.index')}}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'code', name: 'code'},
                {data: 'status_format', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            columnDefs: [

            ],
        })

        function deleteConfirmation(id) {
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
                            url: "{{url('machines')}}/" + id,
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
                                        animation: false,
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
