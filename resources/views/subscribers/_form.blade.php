<div class="form-group">
    {!!Form::label('name', 'Name') !!}
    {!!Form::text('name', null, ['class' => 'form-control']) !!}
    {!!Form::hidden('bunches_id', 1) !!}

</div>
<div class="form-group">
    {!!Form::label('surname', 'Surname') !!}
    {!!Form::text('surname', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('email', 'Email') !!}
    {!!Form::text('email', null, ['class' => 'form-control']) !!}
</div>