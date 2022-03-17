@extends('adminlte::page')

@section('title', 'จัดการสินค้าคงคลังของอุปกรณ์ - เพิ่มสินค้าคงคลังของอุปกรณ์')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                จัดการสินค้าคงคลังของอุปกรณ์ - เพิ่มสินค้าคงคลังของอุปกรณ์
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="{{route('inventories.index')}}">จัดการสินค้าคงคลังของอุปกรณ์</a></li>
                <li class="breadcrumb-item active">เพิ่มสินค้าคงคลังของอุปกรณ์</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <form action="{{route('inventories.store')}}" method="post" id="formStore">
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
                            <label for="title">ชื่อสินค้าคงคลังของอุปกรณ์ <span class="text-danger">*</span> </label>
                            <input autocomplete="nope" type="text"
                                   class="form-control form-control-sm @error('title') is-invalid @enderror"
                                   id="title"
                                   name="title" placeholder="" value="{{old('title')}}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="code">รหัสสินค้าคงคลังของอุปกรณ์ <span class="text-danger">*</span> </label>
                            <input autocomplete="nope" type="text"
                                   class="form-control form-control-sm @error('code') is-invalid @enderror"
                                   id="code"
                                   name="code" placeholder="" value="{{old('code')}}">
                            @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="stock">สต๊อคสินค้าคงคลังของอุปกรณ์ <span class="text-danger">*</span> </label>
                            <input autocomplete="nope" type="text"
                                   class="form-control form-control-sm @error('stock') is-invalid @enderror"
                                   id="stock"
                                   name="stock" placeholder="" value="{{old('stock')}}">
                            @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <label>
                            สถานะ
                        </label>
                        <div class="form-group">
                            <label>
                                <input type="radio" name="status" checked value="{{\App\Models\Inventory::INVENTORY_ACTIVE}}">
                                Active
                            </label>
                            &emsp;
                            <label>
                                <input type="radio" name="status" value="{{\App\Models\Inventory::INVENTORY_INACTIVE}}"> Inactive
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
