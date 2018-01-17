<div class="form-group">
    {!!Form::label('name', 'Name') !!}
    {!!Form::text('name', null, ['class' => 'form-control']) !!}
    {!!Form::hidden('bunches_id', 1) !!}

</div>
<div class="form-group">
    {!!Form::label('description', 'Description') !!}
    {!!Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>