@extends('layouts.panel')
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('campaign.index')}}">
                <i class="fa fa-backward" aria-hidden="true"></i> << back
            </a>
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">Campaign PREVIEW: <b>{{$campaign->name}}</b></div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['class' => 'confirm-delete', 'route' => ['campaign.destroy', $campaign->id], 'method' => 'DELETE'])}}
                    {{ link_to_route('campaign.edit', 'edit', [$campaign->id], ['class' => 'btn btn-primary btn-xs']) }} |
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-responsive">
            <tr>
                <th width="25%">Attribute</th>
                <th width="75%">Value</th>
            </tr>
            <tr>
                    <td>Subject</td>
                    <td>{{$campaign -> name}}</td>
            </tr>
            <tr>
                <td>To</td>
                <td>
                    @foreach($subscriber as $subs )
                        {{$subs->email}},
                        @endforeach
                </td>
            </tr>
            <tr>
                <td>From</td>
                <td>testmailgun77@gmail.com</td>
            </tr>
            <tr>
                <td>Message</td>
                <td>
                    @include('mail.preview')
                </td>
            </tr>
            <tr>
                <td><a class="btn btn-danger" href="/campaign/{{$campaign -> id}}/send">Send mails</a></td>
            </tr>
        </table>
    </div>
@endsection
