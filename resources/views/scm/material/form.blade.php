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
                        <h3 style="margin:10px">{{isset($id)?'Update':'Add'}} Material </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-8 col-md-offset-2">
                        <form method="POST" action="{{isset($id)?route('materials.update', $id):route('materials.store')}}" enctype="multipart/form-data">
                            @if(isset($id))
                            {{ method_field('PUT') }}
                            @endif
                            {{ csrf_field() }}
                            <label>Material Name</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="title" value="{{isset($id)?$material['title']:old('title')}}" placeholder="Material Name..." required>
                            </div>
                            <br>
                            <label>Stock</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                <input type="text" class="form-control" name="stock" value="{{isset($id)?$material['stock']:old('stock')}}" placeholder="Material Stock..." required>
                            </div>
                            <br>
                            <label>Unit</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" class="form-control" value="{{isset($id)?$material['unit_id']:old('unit_id')}}" name="unit_id" placeholder="Unit..." required>
                            </div>
                            <br>
                            <label>length</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-arrows-h"></i></span>
                                <input type="text" class="form-control" value="{{isset($id)?$material['length']:old('length')}}" name="length" placeholder="Material Length..." required>
                            </div>
                            <br>
                            <label>Width</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-arrows-v"></i></span>
                                <input type="text" class="form-control" value="{{isset($id)?$material['width']:old('width')}}" name="width" placeholder="Material Width..." required>
                            </div>
                            <br>
                            <label>Weight</label>
                            <span style="color:red"> * </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-arrow-circle-down"></i></span>
                                <input type="text" class="form-control" value="{{isset($id)?$material['weight']:old('weight')}}" name="weight" placeholder="Material Weight..." required>
                            </div>
                            <br>
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
