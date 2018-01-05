@extends('layouts.customer')
@section('content')
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                   <div class="row">
                       <div class="col-sm-4">
                            <strong>Request List</strong>
                            &nbsp;&nbsp;
                            <a href="{{url('/customer/request/create')}}" class="text-primary"><i class="fa fa-plus"></i> New</a>
                       </div>
                       <div class="col-sm-5">
                            <form action="{{url('/customer/request')}}" class="form-horizontal" method="get">
                                    <div class="input-group"  style="margin-top: -9px;margin-bottom:3px">
                                        <input type="text" class="form-control" placeholder="Search for..." name="q" value="{{$q}}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                            </form>
                       </div>
                   </div>
               
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>&numero;</th>
                            <th>Subject</th>
                            <th>Request Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $pagex = @$_GET['page'];
                            if(!$pagex)
                                $pagex = 1;
                            $i = 22 * ($pagex - 1) + 1;
                        ?>
                        @foreach($requests as $req)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$req->subject}}</td>
                                <td>{{$req->request_date}}</td>
                                <td>
                                    <a href="{{url('/customer/request/detail/'.$req->id)}}" class="btn btn-success">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$requests->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $(".mn .nav-item").removeClass('active');
        $("#menu_request").addClass("active");
    });
</script>
@endsection