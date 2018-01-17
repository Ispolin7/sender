@extends('layouts.panel')
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <div class="centered-child col-md-11 col-sm-10 col-xs-10"><b>New Bunch</b></div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['route'=>'bunches.store']) !!}

        @include('bunches._form')

        <div class="form-group">
            {!! Form::button('Add', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection