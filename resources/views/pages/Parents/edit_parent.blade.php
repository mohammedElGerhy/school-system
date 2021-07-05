@extends('layouts.master')
@section('css')

@section('title')
    Edit Parents
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Edit Parents</h4>
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
                    <h1 class="text-center">{{__('Parent_trans.Edit_Father')}}</h1>

                    <form action="{{route('pages.parents.update_parent', $my_parent->id)}}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <br>
                                <input type="hidden" name="id" value="{{$my_parent -> id}}">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('Parent_trans.Email')}}</label>
                                        <input type="email" name="Email"  class="form-control" value="{{$my_parent -> Email}}">
                                        @error('Email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{trans('Parent_trans.Password')}}</label>
                                        <input type="password" name="Password" class="form-control" >
                                        @error('Password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('Parent_trans.Name_Father')}}</label>
                                        <input type="text" name="Name_Father" class="form-control" value="{{$my_parent -> getTranslation('Name_Father', 'ar') }}">
                                        @error('Name_Father')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{trans('Parent_trans.Name_Father_en')}}</label>
                                        <input type="text" name="Name_Father_en" class="form-control" value="{{$my_parent -> getTranslation('Name_Father', 'en')}}">
                                        @error('Name_Father_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label for="title">{{trans('Parent_trans.Job_Father')}}</label>
                                        <input type="text" name="Job_Father" class="form-control" value="{{$my_parent -> getTranslation('Job_Father', 'ar')}}">
                                        @error('Job_Father')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="title">{{trans('Parent_trans.Job_Father_en')}}</label>
                                        <input type="text" name="Job_Father_en" class="form-control" value="{{$my_parent -> getTranslation('Job_Father', 'en')}}">
                                        @error('Job_Father_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="title">{{trans('Parent_trans.National_ID_Father')}}</label>
                                        <input type="text" name="National_ID_Father" class="form-control" value="{{$my_parent ->National_ID_Father}}">
                                        @error('National_ID_Father')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{trans('Parent_trans.Passport_ID_Father')}}</label>
                                        <input type="text" name="Passport_ID_Father" class="form-control" value="{{$my_parent -> Passport_ID_Father}}">
                                        @error('Passport_ID_Father')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="title">{{trans('Parent_trans.Phone_Father')}}</label>
                                        <input type="text" name="Phone_Father" class="form-control" value="{{$my_parent -> Phone_Father}}">
                                        @error('Phone_Father')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Nationality_Father_id">
                                            <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($Nationalities as $National)
                                                <option value="{{$National->id}}"
                                                        @if($my_parent -> Nationality_Father_id == $National -> id )  selected @endif
                                                >{{$National->Name}}</option>
                                            @endforeach
                                        </select>
                                        @error('Nationality_Father_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Blood_Type_Father_id">
                                            <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($Type_Bloods as $Type_Blood)
                                                <option value="{{$Type_Blood->id}}"
                                                @if($my_parent -> Blood_Type_Father_id == $Type_Blood -> id ) selected @endif
                                                >{{$Type_Blood->Name}}</option>
                                            @endforeach
                                        </select>
                                        @error('Blood_Type_Father_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Religion_Father_id">
                                            <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($Religions as $Religion)
                                                <option value="{{$Religion->id}}"
                                                        @if($my_parent -> Religion_Father_id == $Religion -> id ) selected @endif
                                                >{{$Religion->Name}}</option>
                                            @endforeach
                                        </select>
                                        @error('Religion_Father_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Father')}}</label>
                                    <textarea class="form-control" name="Address_Father" id="exampleFormControlTextarea1" rows="4">{{ $my_parent -> Address_Father }}</textarea>
                                    @error('Address_Father')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                </div>
                <hr>
                <h1 class="text-center">{{__('Parent_trans.Edit_Mother')}}</h1>

                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>

                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{trans('Parent_trans.Name_Mother')}}</label>
                                <input type="text" name="Name_Mother" class="form-control" value="{{$my_parent -> getTranslation('Name_Mother', 'ar')}}">
                                @error('Name_Mother')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="title">{{trans('Parent_trans.Name_Mother_en')}}</label>
                                <input type="text" name="Name_Mother_en" class="form-control" value="{{$my_parent -> getTranslation('Name_Mother', 'en')}}">
                                @error('Name_Mother_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="title">{{trans('Parent_trans.Job_Mother')}}</label>
                                <input type="text" name="Job_Mother" class="form-control" value="{{$my_parent -> getTranslation('Job_Mother', 'ar')}}">
                                @error('Job_Mother')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="title">{{trans('Parent_trans.Job_Mother_en')}}</label>
                                <input type="text" name="Job_Mother_en" class="form-control" value="{{$my_parent -> getTranslation('Job_Mother', 'en')}}">
                                @error('Job_Mother_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="title">{{trans('Parent_trans.National_ID_Mother')}}</label>
                                <input type="text" name="National_ID_Mother" class="form-control" value="{{$my_parent -> National_ID_Mother}}">
                                @error('National_ID_Mother')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="title">{{trans('Parent_trans.Passport_ID_Mother')}}</label>
                                <input type="text" name="Passport_ID_Mother" class="form-control" value="{{$my_parent -> Passport_ID_Mother}}">
                                @error('Passport_ID_Mother')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="title">{{trans('Parent_trans.Phone_Mother')}}</label>
                                <input type="text" name="Phone_Mother" class="form-control" value="{{$my_parent -> Phone_Mother}}">
                                @error('Phone_Mother')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                                <select class="custom-select my-1 mr-sm-2" name="Nationality_Mother_id">
                                    <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Nationalities as $National)
                                        <option value="{{$National->id}}"
                                        @if($my_parent -> Nationality_Mother_id == $National-> id) selected @endif
                                        >{{$National->Name}}</option>
                                    @endforeach
                                </select>
                                @error('Nationality_Mother_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                                <select class="custom-select my-1 mr-sm-2" name="Blood_Type_Mother_id">
                                    <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Type_Bloods as $Type_Blood)
                                        <option value="{{$Type_Blood->id}}"
                                                @if($my_parent -> Blood_Type_Mother_id == $Type_Blood-> id) selected @endif
                                        >{{$Type_Blood->Name}}</option>
                                    @endforeach
                                </select>
                                @error('Blood_Type_Mother_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                                <select class="custom-select my-1 mr-sm-2" name="Religion_Mother_id">
                                    <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Religions as $Religion)
                                        <option value="{{$Religion->id}}"
                                                @if($my_parent -> Religion_Mother_id == $Religion-> id) selected @endif
                                        >{{$Religion->Name}}</option>
                                    @endforeach
                                </select>
                                @error('Religion_Mother_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Mother')}}</label>
                            <textarea class="form-control" name="Address_Mother" id="exampleFormControlTextarea1"
                                      rows="4">{{ $my_parent-> Address_Mother}}</textarea>
                            @error('Address_Mother')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{trans('Parent_trans.photos')}}</label>
                            <input type="file" name="photos" class="form-control" accept="image/*" multiple>
                            @error('photos')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm btn-lg pull-right"
                                    type="submit">{{ trans('Parent_trans.Finish') }}</button>
                        </div>

                    </div>
                </div>
            </div>
            </form>

        </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
