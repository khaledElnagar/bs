@extends('admin.layouts.master')

@section('fast-nav')
    <li>
        <a href="{{url('')}}/admin">Home</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/wish">Wishes</a>
    </li>
@endsection
@section('content')

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-shopping-cart"></i> Wishes</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>User Name</th>
                            <th>Total Price</th>
                            <th>Discount</th>
                            <th>Net Amount</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->total_amount}}</td>
                            <td>{{$order->discount}}</td>
                            <td>{{$order->net_amount}}</td>
                            <td>{{$order->created_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/span-->

    </div>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-shopping-cart"></i> Order Details</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->details as $order_details)
                        <tr>
                            <td>{{$order_details->isbn}}</td>
                            <td>{{$order_details->quantity}}</td>
                            <td>{{$order_details->price}}</td>
                            <td>{{$order_details->total}}</td>
                            <td>{{$order_details->created_at}}</td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->

@endsection