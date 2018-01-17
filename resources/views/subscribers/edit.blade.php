@extends('layouts.panel')
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <div class="centered-child col-md-11 col-sm-10 col-xs-10"><b>Edit Subscriber</b></div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::model($subscriber, ['route' => ['subscribers.update', $bunch->id, $subscriber->id], 'method' => 'PUT']) !!}

        @include('subscribers._form')

        <div class="form-group">
            {!! Form::button('Edit', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
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