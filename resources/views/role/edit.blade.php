@extends('adminlte::page')

@section('title', 'บทบาทการใช้งาน')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">บทบาทการใช้งาน - แก้ไขข้อมูล</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="{{route('roles.index')}}">บทบาทการใช้งาน</a></li>
                <li class="breadcrumb-item active">แก้ไขข้อมูล</li>
            </ol>
        </div>
    </div>
@stop

@section('content')

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <button type="button" onclick="comfirmUpdate()" class="btn btn-primary  btn-lg mb-2"><i
                    class="fas fa-save"></i> บันทึก
            </button>
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">รายละเอียด</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <form action="{{route('roles.update',['role'=>$role->id])}}" id="formUpdate" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="name">Code</label>
                            <input autocomplete="nope" type="text"
                                   class="form-control form-control-sm  @error('name') is-invalid @enderror"
                                   name="name" placeholder="" value="{{$role->name}}"
                                   @if(auth()->user()->hasExactRoles(\App\Models\User::ROLE_SUPER_MAN))

                                   @else

                                   @if(in_array($role->name,[\App\Models\User::ROLE_SUPER_MAN,\App\Models\User::ROLE_SUPER_ADMIN,\App\Models\User::ROLE_ADMIN,\App\Models\User::ROLE_TEACHER])) readonly @endif
                                @endif
                            >
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="guard name">ชื่อ</label>
                            <input type="text" class="form-control form-control-sm" name="title"
                                   value="{{$role->title}}">
                        </div>

                        <div class="form-group">
                            <label for="role">สิทธิ์การใช้งาน</label>
                            <select class="select2bs4" multiple="multiple" id="role" name="permission_id[]"
                                    data-placeholder="กำหนดสิทธิ์"
                                    style="width: 100%;">
                                @foreach($permissions as $permission)
                                    <option value="{{$permission->id}}"
                                            @if(in_array($permission->id,$rolePermission)) selected @endif >{{$permission->name}}</option>
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

        function comfirmUpdate() {

            Swal.fire({
                icon: 'info',
                title: 'แก้ไขข้อมูล',
                text: 'ยืนยันการแก้ไขข้อมูล',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                showLoaderOnConfirm: true,
                animation: false,
                preConfirm: (e) => {
                    return new Promise(function (resolve) {
                        $('#formUpdate').submit();
                    })
                }
            })
        }
    </script>
@stop
