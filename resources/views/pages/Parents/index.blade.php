@extends('layouts.master')
@section('css')

@section('title')
    parent
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> parent</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Page Title</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a href="{{route('pages.parents.add_parent')}}" class="btn btn-success btn-sm btn-lg pull-right">{{ trans('Parent_trans.add_parent') }}</a>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr class="table-success">
                                <th>#</th>
                                <th>{{ trans('Parent_trans.Email') }}</th>
                                <th>{{ trans('Parent_trans.Name_Father') }}</th>
                                <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
                                <th>{{ trans('Parent_trans.Passport_ID_Father') }}</th>
                                <th>{{ trans('Parent_trans.Phone_Father') }}</th>
                                <th>{{ trans('Parent_trans.Job_Father') }}</th>
                                <th>{{ trans('Parent_trans.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($my_parents as $my_parent)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $my_parent->Email }}</td>
                                    <td>{{ $my_parent->Name_Father }}</td>
                                    <td>{{ $my_parent->National_ID_Father }}</td>
                                    <td>{{ $my_parent->Passport_ID_Father }}</td>
                                    <td>{{ $my_parent->Phone_Father }}</td>
                                    <td>{{ $my_parent->Job_Father }}</td>
                                    <td>
                                        <a href="{{route('pages.parents.edit_parent', $my_parent ->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('pages.parents.delete_parent', $my_parent ->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
