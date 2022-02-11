@extends('adminlte::page')

@section('title', 'จัดการโปรไฟล์')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการโปรไฟล์</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าแรก</a></li>
{{--                <li class="breadcrumb-item"><a href="{{route('admins.index')}}">ผู้ใช้งาน</a></li>--}}
                <li class="breadcrumb-item active">จัดการโปรไฟล์ : {{$admin->name}}</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <form action="{{route('profiles.store')}}" method="post" id="formStore">
        <div class="row">
            <div class="col-md-12 mb-2">
                <button type="button" onclick="confirmStore()" class="btn btn-primary btn-lg"><i
                        class="fas fa-save mr-2"></i>
                    บันทึกข้อมูล
                </button>
            </div>

            <div class="col-md-6">
                <div class="card ">
                    @csrf

                    <div class="card-header">
                        <h3 class="card-title">รายละเอียด</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">ชื่อ-สกุล <span class="text-danger">*</span> </label>
                            <input autocomplete="nope" type="text"
                                   class="form-control form-control-sm @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name" placeholder="" value="{{$admin->name}}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username">Username </label>
                            <input autocomplete="nope" type="text"
                                   class="form-control form-control-sm @error('username') is-invalid @enderror"
                                   id="username"
                                   name="username" placeholder="" value="{{$admin->username}}">
                            @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <label class="text-muted">ข้อมูลการเข้าสู่ระบบ</label>
                        <div class="form-group">
                            <label for="email">อีเมล <span class="text-danger">*</span></label>
                            <input type="text"
                                   class="form-control form-control-sm @error('email') is-invalid @enderror "
                                   id="email"
                                   name="email"
                                   placeholder="example" value="{{$admin->email}}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="alert alert-warning">
                            <ul class="mb-0">
                                <li>รหัสผ่านไม่จำเป็นต้องกรอก</li>
                                <li>กรอกรหัสผ่าน เมื่อต้องการเปลี่ยนรหัสผ่านใหม่</li>
                            </ul>

                        </div>
                        <div class="form-group">
                            <label for="password">รหัสผ่าน <span class="text-danger">*</span></label>
                            <input type="password"
                                   autocomplete="none"
                                   class="form-control form-control-sm @error('password') is-invalid @enderror "
                                   id="password" name="password"
                                   placeholder="*********">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">ยืนยันรหัสผ่าน <span class="text-danger">*</span></label>
                            <input type="password"
                                   class="form-control form-control-sm @error('password') is-invalid @enderror "
                                   autocomplete="none"
                                   name="password_confirmation"
                                   placeholder="*********">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        สิทธ์การใช้งาน / สถานะ
                    </div>
                    <div class="card-body">

                        @can('manage admin')
                            @if(auth()->user()->hasRole([\App\Models\User::ROLE_SUPER_MAN,\App\Models\User::ROLE_SUPER_ADMIN]))
                                <label>
                                    บทบาทผู้ดูแล
                                </label>
                                <div class="form-group">
                                    <select class="form-control form-control-sm select2" multiple="multiple"
                                            name="roles[]">
                                        @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                            @if(auth()->user()->hasRole([\App\Models\User::ROLE_SUPER_MAN]))
                                                <option value="{{$role->name}}"
                                                        @if(in_array($role->name,$myrole)) selected @endif>{{$role->name}}</option>
                                            @else
                                                @if($role->name == \App\Models\User::ROLE_SUPER_MAN)
                                                    @continue
                                                @endif
                                                <option value="{{$role->name}}"
                                                        @if(in_array($role->name,$myrole)) selected @endif>{{$role->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        @endcan

                    </div>
                </div>

            </div>
        </div>
    </form>
@stop

@section('css')

@stop
@section('plugins.Select2',true)
@section('js')
    <script>
        $('.select2').select2();

        function confirmStore() {
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
                        $('#formStore').submit();
                    })
                }
            })
        }
    </script>
@stop
