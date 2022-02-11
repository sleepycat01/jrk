@extends('adminlte::page')

@section('title', 'บทบาทการใช้งาน - เพิ่มข้อมูล')

@section('content_header')

    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">บทบาทการใช้งาน - เพิ่มข้อมูล</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="{{route('roles.index')}}">บทบาทการใช้งาน</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
@stop

@section('content')

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <button type="button" onclick="confirmStore()" class="btn btn-primary mb-2 btn-lg "><i
                    class="fas fa-save"></i> บันทึก
            </button>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">รายละเอียด</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <form action="{{route('roles.store')}}" id="formStore" method="post">

                        @csrf
                        <div class="form-group">
                            <label for="name">Code</label>
                            <input autocomplete="nope" type="text"
                                   class="form-control form-control-sm  @error('name') is-invalid @enderror"
                                   name="name" placeholder="" value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="guard name">ชื่อ</label>
                            <input type="text" class="form-control form-control-sm" name="title">
                        </div>

                        <div class="form-group">
                            <label for="role">สิทธิ์การใช้งาน</label>
                            <select class="select2bs4" multiple="multiple" id="role" name="permission_id[]"
                                    data-placeholder="กำหนดสิทธิ์"
                                    style="width: 100%;">
                                @foreach($permissions as $permission)
                                    <option value="{{$permission->id}}">{{$permission->name}} [{{$permission->description}}]</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
@section('plugins.Select2', true)
@section('plugins.Datepicker',true)
@section('plugins.JqueryThailand',true)
@section('js')
    <script>
        $('.select2bs4').select2()

        function confirmStore() {
            Swal.fire({
                icon: 'info',
                title: 'เพิ่มข้อมูล',
                text: 'ยืนยันการเพิ่มข้อมูล',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                showLoaderOnConfirm: true,
                animation: false,
                preConfirm: (e) => {
                    return new Promise(function (resolve) {
                        $('#formStore').submit();
                    })
                }
            })
        }
    </script>
@stop
