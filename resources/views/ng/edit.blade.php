@extends('adminlte::page')

@section('title', 'จัดการสินค้าเสีย - แก้ไขสินค้าเสีย')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการสินค้าเสีย - แก้ไขสินค้าเสีย</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="{{route('ng.index')}}">จัดการสินค้าเสีย</a></li>
                <li class="breadcrumb-item active">แก้ไขสินค้าเสีย : {{$ng->title}}</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <form action="{{route('ng.update',['ng'=>$ng->id])}}" method="post" id="formUpdate">
        <div class="row">
            <div class="col-md-12 mb-2">
                <button type="button" onclick="confirmUpdate()" class="btn btn-primary btn-lg"><i
                        class="fas fa-save mr-2"></i>
                    บันทึกข้อมูล
                </button>
            </div>
            <div class="col-md-6">
                <div class="card ">

                    @csrf
                    @method('patch')
                    <div class="card-header">
                        <h3 class="card-title">รายละเอียด</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">ชื่อสินค้าเสีย <span class="text-danger">*</span> </label>
                            <input autocomplete="nope" type="text"
                                   class="form-control form-control-sm @error('title') is-invalid @enderror"
                                   id="title"
                                   name="title" placeholder="" value="{{$ng->title}}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="code">รหัสสินค้าเสีย <span class="text-danger">*</span> </label>
                            <input autocomplete="nope" type="text"
                                   class="form-control form-control-sm @error('code') is-invalid @enderror"
                                   id="code"
                                   name="code" placeholder="" value="{{$ng->code}}">
                            @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <label>สถานะ</label>
                        <div class="form-group">
                            <label>
                                <input type="radio" name="status"
                                       @if($ng->status==\App\Models\Ng::NG_ACTIVE)  checked
                                       @endif value="{{\App\Models\Ng::NG_ACTIVE}}">
                                Active
                            </label>
                            &emsp;
                            <label>
                                <input type="radio" name="status"
                                       @if($ng->status==\App\Models\Ng::NG_INACTIVE) checked
                                       @endif value="{{\App\Models\Ng::NG_INACTIVE}}">
                                Inactive
                            </label>
                        </div>
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

        function confirmUpdate() {
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
