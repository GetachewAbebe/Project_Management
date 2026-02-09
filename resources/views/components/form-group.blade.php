@props(['label', 'name', 'required' => false])

<div {{ $attributes->merge(['class' => 'form-group']) }} style="margin-bottom: 2rem;">
    <label for="{{ $name }}" style="display: block; font-size: 0.8rem; font-weight: 800; color: #002d4a; margin-bottom: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
        {{ $label }}
        @if($required) <span style="color: #ef4444;">*</span> @endif
    </label>
    
    {{ $slot }}

    @error($name)
        <span style="color: #ef4444; font-size: 0.8rem; margin-top: 0.5rem; display: block; font-weight: 600;">{{ $message }}</span>
    @enderror
</div>
