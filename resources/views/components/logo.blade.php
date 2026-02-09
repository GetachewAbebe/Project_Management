@props(['width' => '200', 'height' => 'auto'])

@php
    $logoPath = public_path('images/logo.png');
    $logoExists = file_exists($logoPath);
@endphp

@if($logoExists)
    <img src="{{ asset('images/logo.png') }}" 
         width="{{ $width }}" 
         height="{{ $height }}" 
         alt="BETIn Logo"
         {{ $attributes->merge(['style' => 'display: block; object-fit: contain;']) }}>
@else
    <!-- Fallback sophisticated Logo if file is not yet placed in public/images/logo.png -->
    <div {{ $attributes->merge(['style' => "width: {$width}px; height: {$height}px; display: flex; align-items: center; justify-content: center; background: white; border-radius: 12px; padding: 10px; border: 1px dashed #cbd5e1;"]) }}>
        <div style="text-align: center;">
            <div style="display: flex; align-items: center; justify-content: center; gap: 8px;">
                <span style="font-family: 'Outfit', sans-serif; font-weight: 900; font-size: 1.5rem; color: #008B4B;">BET</span>
                <span style="font-family: 'Outfit', sans-serif; font-weight: 400; font-size: 1.5rem; color: #005a8c;">in</span>
            </div>
            <p style="font-size: 9px; margin-top: 4px; color: #005a8c; font-weight: 800; letter-spacing: 0.5px; line-height: 1;">BIO & EMERGING TECHNOLOGY INSTITUTE</p>
            <p style="font-size: 8px; color: #ef4444; margin-top: 5px; font-weight: 700;">(Please save your logo as public/images/logo.png)</p>
        </div>
    </div>
@endif
