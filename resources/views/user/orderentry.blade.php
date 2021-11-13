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
            <li class="breadcrumb-item"><a href="{{route('user.orderlist')}}">Order List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Entry</li>
        </ol>
    </nav>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Order Entry</h6>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <!-- Alert error message-->
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible show" role="alert">
                            {{$errors->first()}}
                        </div>
                        @endif

                        <!--Alert success message-->
                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                        @endif


                        <form method="post" action="{{route('user.orderlist.save')}}">
                            @csrf
                            <input name="id_orderlist" type="hidden" value="{{$orderlist->id}}">
                            <div class="col-md-4">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Order ID</b></label>
                                    <div class="col-sm-8">
                                        <input name="orderid" type="text" class="form-control" value="{{$orderlist->orderid}}" readonly="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label"><b>Order Date</b></label>
                                    <div class="col-sm-8">
                                        @if($orderlist->totalprice != null)
                                        <input name="orderdate" type="date" class="form-control" value="{{$orderlist->orderdate}}" readonly>
                                        @else
                                        <input name="orderdate" type="date" class="form-control" value="{{$orderlist->orderdate}}" readonly>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label"><b>Customer Name</b></label>
                                    <div class="col-sm-8">
                                        @if($orderlist->totalprice != null)
                                        <input name="customername" type="text" class="form-control" value="{{$orderlist->customername}}" readonly>
                                        @else
                                        <input name="customername" type="text" class="form-control" value="{{$orderlist->customername}}" readonly>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form><br>

                        <!--MODAL Tambah Product-->
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="{{route('user.orderentry.add')}}">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input name="id_orderlist" type="hidden" value="{{$orderlist->id}}">
                                            <input name="orderid" type="hidden" value="{{$orderlist->orderid}}">
                                            <livewire:addproduct />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--TABEL orderentry-->
                        <table id="datatable" class="table table-striped display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                    <th>QTY</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderentry as $oe)
                                <tr>
                                    <td>{{ $oe->id_product}}</td>
                                    <td>{{ $oe->productname}}</td>
                                    <td>{{ $oe->unitprice}}</td>
                                    <td>{{ $oe->qty}}</td>
                                    <td>{{ $oe->subtotal}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('user.orderlist')}}"><button type="submit" class="btn btn-success">Kembali</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection

