@extends('adminlte::page')

@section('title', 'จัดการเครื่อง - แก้ไขเครื่องจักร')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการเครื่องจักร - แก้ไขเครื่องจักร</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="{{route('machines.index')}}">จัดการเครื่องจักร</a></li>
                <li class="breadcrumb-item active">แก้ไขเครื่องจักร : {{$machine->title}}</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <form action="{{route('machines.update',['machine'=>$machine->id])}}" method="post" id="formUpdate">
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
                            <label for="title">ชื่อเครื่องจักร <span class="text-danger">*</span> </label>
                            <input autocomplete="nope" type="text"
                                   class="form-control form-control-sm @error('title') is-invalid @enderror"
                                   id="title"
                                   name="title" placeholder="" value="{{$machine->title}}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="code">รหัสเครื่องจักร <span class="text-danger">*</span> </label>
                            <input autocomplete="nope" type="text"
                                   class="form-control form-control-sm @error('code') is-invalid @enderror"
                                   id="code"
                                   name="code" placeholder="" value="{{$machine->code}}">
                            @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <label>สถานะ</label>
                        <div class="form-group">
                            <label>
                                <input type="radio" name="status"
                                       @if($machine->status==\App\Models\Machine::MACHINE_ACTIVE)  checked
                                       @endif value="{{\App\Models\Machine::MACHINE_ACTIVE}}">
                                Active
                            </label>
                            &emsp;
                            <label>
                                <input type="radio" name="status"
                                       @if($machine->status==\App\Models\Machine::MACHINE_INACTIVE) checked
                                       @endif value="{{\App\Models\Machine::MACHINE_INACTIVE}}">
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
