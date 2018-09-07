@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <section class="content">
        <!-- CREATE FORM -->
        <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New Status</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('status.store') }}">
                            <div class="form-group">
                                {{ csrf_field() }}
                                <label>Status Title</label>
                            <input type="text" name="title" class="form-control" value{{old('title')}}>
                                <label>Modules</label>
                                <select class="form-control select2" multiple="multiple"
                                        data-placeholder="Select Modules"
                                        style="width: 100%;" name="modules[]" required>
                                    @foreach($modules as $module)
                                        <option value="{{$module['id']}}" id="modules">{{$module['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary btn-flat" type="submit">Create New</button>
                        </form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </div>
    @include('layouts.notification')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Status Title</th>
                                <th>Module</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item['title']}}</td>
                                    <td>{{$item['modules']['title']}}</td>
                                    <td>{{$item['created_at']}}</td>
                                    <td>
                                        <a class="btn btn-success btn-flat"
                                           href="{{route('status.edit', $item['id'])}}"><i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-warning btn-flat"
                                           href="{{route('status.destroy', $item['id'])}}"><i
                                                    class="fa fa-trash-o"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Module Title</th>
                                <th>Module Description</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
