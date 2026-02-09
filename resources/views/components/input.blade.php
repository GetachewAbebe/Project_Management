@props(['disabled' => false, 'type' => 'text'])

<input {{ $disabled ? 'disabled' : '' }} 
       type="{{ $type }}" 
       {!! $attributes->merge(['class' => 'form-input']) !!} 
       style="{{ $disabled ? 'background: #f1f5f9; color: #64748b; cursor: not-allowed;' : 'background: white;' }}">
