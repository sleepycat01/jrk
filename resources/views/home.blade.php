@extends('adminlte::page')

@section('title', 'หน้าแรก')

@section('content_header')
    <br>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Work Orders</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-clipboard"></i>
                    </div>
                    <a href="#" class="small-box-footer">เพิ่ม Work Order <i class="fas fa-plus-circle"></i></a>
                </div>
            </div>

            <div class="col-lg-6 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>
                        <p>Compound</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-water"></i>
                    </div>
                    <a href="#" class="small-box-footer">เพิ่ม Compound <i class="fas fa-plus-circle"></i></a>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-lg-6 col-6">
                <div class="card card-outline card-info">
                    <div class="card-header">
                            <h3 class="card-title">Work Order ล่าสุด</h3>
                        <div class="card-tools">
                            <a href="" class="btn btn-secondary btn-xs">ดูทั้งหมด</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    เลขที่ออเดอร์
                                </th>
                                <th class="text-center">
                                    วันที่ออกออเดอร์
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">
                                    220315W2HKWUD4
                                </td>
                                <td class="text-center">
                                    13/01/65
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    220315VC4A8A8U
                                </td>
                                <td class="text-center">
                                    25/02/65
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    220307AP6UUFPP
                                </td>
                                <td class="text-center">
                                    20/02/65
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">รายการเบิก Compound ล่าสุด</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-secondary btn-xs">ดูทั้งหมด</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    รหัส Compound
                                </th>
                                <th class="text-center">
                                    จำนวนที่เบิก (Kg.)
                                </th>
                                <th class="text-center">
                                    วัน / เวลาที่เบิก
                                </th>
                                <th class="text-center">
                                    พนักงาน
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">
                                    220315W2HKWUD4
                                </td>
                                <td class="text-center">
                                    10
                                </td>
                                <td class="text-center">
                                    13/01/65, 19.00 น.
                                </td>
                                <td class="text-center">
                                    ธงชัย ใจดี
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    220315W2HKWUD4
                                </td>
                                <td class="text-center">
                                    10
                                </td>
                                <td class="text-center">
                                    13/01/65, 19.00 น.
                                </td>
                                <td class="text-center">
                                    ธงชัย ใจดี
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    220315W2HKWUD4
                                </td>
                                <td class="text-center">
                                    10
                                </td>
                                <td class="text-center">
                                    13/01/65, 19.00 น.
                                </td>
                                <td class="text-center">
                                    ธงชัย ใจดี
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
