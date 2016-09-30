@extends('admin.layouts.master')

@section('fast-nav')
    <li>
        <a href="{{url('')}}/admin">Home</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/order">Orders</a>
    </li>
@endsection
@section('content')

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-shopping-cart"></i> Orders</h2>

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
                            <th>Order Number</th>
                            <th>User Name</th>
                            <th>Total Price</th>
                            <th>Discount</th>
                            <th>Net Amount</th>
                            <th>Created At</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->total_amount}}</td>
                                <td>{{$order->discount}}</td>
                                <td>{{$order->net_amount}}</td>
                                <td>{{$order->created_at}}</td>
                                <td class="center">
                                    <a class="btn">
                                        <form action="{{url('')}}/admin/order/{{$order->id}}" method="POST">
                                            <input type="hidden" name="_method" value="GET">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-info" value="Details">
                                        </form>
                                    </a>
                                </td>
                                <td class="center">
                                    <a class="btn">

                                        <form action="{{url('')}}/admin/order/{{$order->id}}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>

                                    </a>
                                </td>

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