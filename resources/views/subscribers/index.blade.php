@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Subscriber</div>
                    <div class="panel-body">
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                                <td>Name</td>
                                <td>Surname</td>
                                <td>Email</td>
                                <td>Action</td>
                             </tr>
                             <tr>
                                <td colspan="4" class="light-green-background no-padding" title="ADD">
                                    <div class="row centered-child">
                                        <div class="col-md-12">
                                            {{ link_to_route('subscribers.create', 'Add', $bunch->id, ['class' => 'btn btn-info btn-xs']) }}
                                        </div>
                                    </div>
                                </td>
                             </tr>

                                @foreach($subscriber as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->surname}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        {{Form::open(['class' => 'confirm-delete', 'route' => ['subscribers.destroy',$bunch->id, $item ->id],'method' => 'DELETE'])}}
                                        {{ link_to_route('subscribers.edit', 'Edit', [$bunch->id, $item->id], ['class' => 'btn btn-success btn-xs']) }}
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