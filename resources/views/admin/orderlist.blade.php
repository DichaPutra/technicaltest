@extends('layouts.bootstrap')

@section('body')
<!-- Begin Page Content -->
<div class="container-fluid ">

    <!-- Page Heading -->
    <!--    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order List</h1>
    </div>-->

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page" >Order List</li>
        </ol>
    </nav>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Order List</h6>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form method="post" action="#">
                            @csrf
                            <div class="col-md-4">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label" ><b>Order ID</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label"><b>Customer</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{route('admin.orderlist.add')}}" class="btn btn-success" ><i class="fas fa-plus"></i> New Order</a>
                        </form>
                        <br>

                        <table id="datatable" class="table table-striped display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Customer Name</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderListData as $ol)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td>{{ $ol->orderid }}</td>
                                    <td>{{ $ol->orderdate }}</td>
                                    <td>{{ $ol->customername }}</td>
                                    <td>{{ $ol->totalprice }}</td>
                                    <td>
                                        @if($ol->totalprice == null)
                                        <a class="btn btn-secondary btn-sm" href="{{route('admin.orderentry.view',$ol->orderid)}}">Edit</a>
                                        @else
                                        <a class="btn btn-primary btn-sm" href="{{route('admin.orderentry.view',$ol->orderid)}}">Detail</a>
                                        @endif
                                        <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection

