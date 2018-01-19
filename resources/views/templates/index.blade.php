@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Templates</div>
                    <div class="panel-body">
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                                <td width="25%">Name</td>
                                <td width="25%">Content</td>
                                <td width="35%">Action</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="light-green-background no-padding" title="ADD">
                                    <div class="row centered-child">
                                        <div class="col-md-12">
                                            {{ link_to_route('templates.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @foreach($template as $item)
                                <tr style="background-color:#f9f9f9;"
                                    onMouseOver="this.style.backgroundColor='white';"
                                    onMouseOut="this.style.backgroundColor='#f9f9f9'"
                                    onclick="location.href='/templates/{{$item->id}}'">
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->content}}</td>
                                    <td>
                                        {{Form::open(['class' => 'confirm-delete', 'route' => ['templates.destroy',$item ->id],'method' => 'DELETE'])}}
                                        {{ link_to_route('templates.show', 'Info', [$item->id], ['class' => 'btn btn-info btn-xs']) }}
                                        {{ link_to_route('templates.edit', 'Edit', [$item->id], ['class' => 'btn btn-success btn-xs']) }}
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