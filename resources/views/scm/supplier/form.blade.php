@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <br>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @include('layouts.notification')
                <div class="box box-{{(isset($id))?'success':'primary'}}">
                    <div class="box-header">
                        <h3 style="margin:10px">{{isset($id)?'Update':'Add'}} Supplier </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-8 col-md-offset-2">
                        <form method="POST" action="{{isset($id)?route('suppliers.update', $id):route('suppliers.store')}}" enctype="multipart/form-data">
                            @if(isset($id))
                            {{ method_field('PUT') }}
                            @endif
                            {{ csrf_field() }}
                            <label>Supplier Name</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="title" value="{{isset($id)?$supplier['title']:old('title')}}" placeholder="Supplier Name..." required>
                            </div>
                            <br>
                            <label>Supplier Detail</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                <textarea type="text" class="form-control" name="detail">
                                        {{isset($id)?$supplier['detail']:old('detail')}}
                                </textarea>
                            </div>
                            <br>
                            <label>Supplier Address</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" class="form-control" value="{{isset($id)?$supplier['address']:old('address')}}" name="address" placeholder="Supplier Address..." required>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <label>Supplier Country</label>
                                    <div class="input-group">
                                        <select class="form-control select2" data-placeholder="Select Status"
                                                style="width: 100%;" name="country_id">
                                            @foreach($countries as $country)
                                                <option value="{{$country['id']}}" {{(isset($supplier['country_id'])?$supplier['country_id']:'0')==$country['id']?'selected':''}}>{{$country['title']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Supplier Province</label>
                                    <div class="input-group col-md-4">
                                        <select class="form-control select2" data-placeholder="Select Status"
                                                    style="width: 100%;" name="province_id">
                                            @foreach($provinces as $province)
                                                <option value="{{$province['id']}}" {{(isset($supplier['province_id'])?$supplier['province_id']:'0')==$province['id']?'selected':''}}>{{$province['title']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <label>Supplier City</label>
                                    <div class="input-group col-md-4">
                                        <select class="form-control select2" data-placeholder="Select Status"
                                                    style="width: 100%;" name="city_id">
                                            @foreach($cities as $city)
                                                    <option value="{{$city['id']}}" {{(isset($supplier['city_id'])?$supplier['city_id']:'0')==$city['id']?'selected':''}}>{{$city['title']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <label>Supplier Phone</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control" value="{{isset($id)?$supplier['phone']:old('phone')}}" name="phone" placeholder="Supplier Phone..." required>
                            </div>
                            <br>
                            <label>Supplier Representative</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-black-tie"></i></span>
                                <input type="text" class="form-control" value="{{isset($id)?$supplier['representative']:old('representative')}}" name="representative" placeholder="Representative Name..." required>
                            </div>
                            <br>
                            <label>Representative Position</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                <input type="text" class="form-control" value="{{isset($id)?$supplier['representative_position']:old('representative_position')}}" name="representative_position" placeholder="Representative Position..." required>
                            </div>
                            <br>
                            <label>Supplied Material</label>
                            <span style="color:red"> * </span>
                            <div class="input-group col-md-12">
                                <select class="form-control select2" multiple="multiple"
                                        data-placeholder="Select Material"
                                        style="width: 100%;" name="supplied_materials[]" required>
                                    @foreach($materials as $material)
                                        <option value="{{$material['id']}}" {{array_key_exists($material['id'], $supplied) == true ? 'selected':''}}>{{$material['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <label>Supplier Status</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <select class="form-control select2" data-placeholder="Select Status"
                                    style="width: 100%;" name="status_id" required>
                                    @foreach($statuses as $status)
                                        <option value="{{$status['id']}}" {{$status['id']==(isset($supplier['status_id'])?$supplier['status_id']:'0')?'selected':''}}>{{$status['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                    <label for="exampleInputFile">Documents</label>
                                    <input type="file" name="documents" id="exampleInputFile">

                                    <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-flat">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    </section>
@endsection
