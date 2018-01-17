<div class="form-group">
    {!!Form::label('name', 'Name') !!}
    {!!Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('template_id', 'Template') !!}
    {!! Form::select(
    'template_id',
    \App\Model\Template::getSelectList(),
    isset($campaign) ? $campaign->template_id : null,
    ['class' => 'form-control']
    ) !!}
</div>

<div class="form-group">
    {!! Form::label('bunch_id', 'Bunch') !!}
    {!! Form::select(
    'bunch_id',
    \App\Model\Bunch::getSelectList(),
    isset($campaign) ? $campaign->bunch_id : null,
    ['class' => 'form-control']
    ) !!}
</div>


<div class="form-group">
    {!!Form::label('description', 'Description') !!}
    {!!Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>