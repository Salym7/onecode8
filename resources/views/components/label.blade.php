@props(['required'=>false])



<label {{$attributes->class(['mb-2',($required ? 'required' : '')])}}></label>
    {{$slot}}
</label>