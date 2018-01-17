@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Bunches</div>
                    <div class="panel-body">
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                                <td width="25%">Name</td>
                                <td width="25%">Description</td>
                                <td width="15%">Emails</td>
                                <td width="35%">Action</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="light-green-background no-padding" title="ADD">
                                    <div class="row centered-child">
                                        <div class="col-md-12">
                                            {{ link_to_route('bunches.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @foreach($bunch as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$subscriber = DB::table('subscribers')->where('bunches_id', $item->id)->count()}}</td>
                                    <td>
                                        {{Form::open(['class' => 'confirm-delete', 'route' => ['bunches.destroy',$item ->id],'method' => 'DELETE'])}}
                                        {{ link_to_route('subscribers.index', 'Subscribers', [$item->id], ['class' => 'btn btn-info btn-xs']) }}
                                        {{ link_to_route('bunches.edit', 'Edit', [$item->id], ['class' => 'btn btn-success btn-xs']) }}
                                        {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                        {{Form::close()}}

                                    </td>
                                    @endforeach
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection