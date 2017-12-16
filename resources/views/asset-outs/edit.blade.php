@extends("layouts.asset")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Asset Out</strong>&nbsp;&nbsp;
                    <a href="{{url('/asset-out')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>

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
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif
                    <form action="{{url('/asset-out/update')}}" class="form-horizontal" method="post" onsubmit="return confirm('Are you sure want to save?')">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$asset_out->id}}" name="id">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="asset" class="control-label col-sm-3 lb"> Asset<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="asset" id="asset" class="form-control">
                                        @foreach($assets as $asset)
                                            <option value="{{$asset->id}}" {{$asset_out->asset_id==$asset->id?'selected':''}}>{{$asset->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity" class="control-label col-sm-3 lb">Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" value="{{$asset_out->quantity}}" name="quantity" id="quantity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="out_date" class="control-label col-sm-3 lb">Out Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="out_date" id="out_date" value="{{$asset_out->out_date}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="return_date" class="control-label col-sm-3 lb">Return Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="return_date" id="return_date" value="{{$asset_out->return_date}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="out_by" class="control-label col-sm-3 lb">Check Out By</label>
                                    <div class="col-sm-8">
                                        <select name="out_by" id="out_by" class="form-control">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" {{$asset_out->out_by==$user->id?'selected':''}}>{{$user->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reason" class="control-label col-sm-3 lb">Reason</label>
                                    <div class="col-sm-8">
                                         <textarea class="form-control" name="reason" id="reason">{{$asset_out->reason}}</textarea>
                                         <p>
                                            <br>
                                            <button class="btn btn-primary btn-flat" type="submit">Save Changes</button>
                                            <button class="btn btn-danger btn-flat" type="reset">Cancel</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset("chosen/chosen.jquery.js")}}"></script>
    <script src="{{asset("chosen/chosen.proto.js")}}"></script>
    <script>
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#menu_asset_out").addClass("current");
            
        })
    </script>

@endsection