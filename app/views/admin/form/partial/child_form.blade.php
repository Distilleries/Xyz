@if($showLabel && $showField)
<div {{ $options['wrapperAttrs']  }} >
@endif

@if($showLabel)
{{ Form::label($name, $options['label'], $options['label_attr']) }}
@endif

@if($showField)
    @foreach ((array)$options['children'] as $child)
        @if(isset($noEdit) and $noEdit === true)
            {{ $child->view() }}
        @else
            {{ $child->render() }}
        @endif
    @endforeach
@endif

@if ($showError && isset($errors))
    {{ $errors->first(array_get($options, 'real_name', $name), '<div '.$options['errorAttrs'].'>:message</div>') }}
@endif

@if ($showLabel && $showField)
</div>
@endif
