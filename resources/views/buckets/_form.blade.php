<div class="mb-4">
    {!! Form::label('name', 'Name', ['class' => 'label']) !!}
    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'field']) !!}
</div>

@if(\Hydrofon\Resource::count() > 0)
    <div class="mb-6">
        {!! Form::label('resources[]', 'Resources', ['class' => 'label']) !!}
        {!! Form::select('resources[]', \Hydrofon\Resource::orderBy('name')->pluck('name', 'id'), isset($bucket) ? $bucket->resources->pluck('id') : [], ['multiple' => true, 'class' => 'field']) !!}
    </div>
@endif

<div class="mt-6">
    <a href="{{ request()->headers->get('referer') }}" class="btn btn-link">Cancel</a>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>