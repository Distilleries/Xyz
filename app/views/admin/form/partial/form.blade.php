@if ($showStart)
    @if($model && $model->exists)
        {{ Form::model($model, $formOptions) }}
    @else
        {{ Form::open($formOptions) }}
    @endif
@endif

@if($showFields)
    @foreach ($fields as $field)
        @if(isset($isNotEditable) and $isNotEditable === true)
            @if(method_exists($field,'view'))
             {{$field->view([
                'default_value'=>($model && $model->exists and isset($model->{$field->getName()}))?$model->{$field->getName()}:''
             ]) }}
            @endif
        @else
            {{$field->render() }}
        @endif
    @endforeach
@endif

@if ($showEnd)
    {{ Form::close() }}
@endif
