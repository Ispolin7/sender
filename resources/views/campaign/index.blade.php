@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Campaign</div>
                    <div class="panel-body">
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                                <td width="10%">Name</td>
                                <td width="10%">Description</td>
                                <td width="10%">Template</td>
                                <td width="10%">Bunch</td>
                                <td width="10%">Recipients</td>
                                <td width="35%">Action</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="light-green-background no-padding" title="ADD">
                                    <div class="row centered-child">
                                        <div class="col-md-12">
                                            {{ link_to_route('campaign.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @foreach($campaign as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$template =App\Model\Template::where('id', $item->template_id)->first()->name}}</td>
                                    <td>{{$bunch = App\Model\Bunch::where('id', $item->bunch_id)->first()->name}}</td>
                                    <td>{{$subscriber = App\Model\Subscriber::where('bunches_id', $item->bunch_id)->count()}}</td>
                                    <td>
                                        {{Form::open(['class' => 'confirm-delete', 'route' => ['campaign.destroy',$item ->id],'method' => 'DELETE'])}}
                                        {{ link_to_route('campaign.show', 'Preview', [$item->id], ['class' => 'btn btn-warning btn-xs']) }}
                                        {{ link_to_route('campaign.edit', 'Edit', [$item->id], ['class' => 'btn btn-success btn-xs']) }}
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