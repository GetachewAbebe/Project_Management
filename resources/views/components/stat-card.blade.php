@props(['label', 'value', 'color' => '#003B5C', 'icon' => null])

<div {{ $attributes->merge(['class' => 'card']) }} style="display: flex; align-items: center; gap: 1.5rem; padding: 1.75rem;">
    @if($icon)
        <div style="flex-shrink: 0; width: 56px; height: 56px; background: {{ $color }}15; color: {{ $color }}; border-radius: 16px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px {{ $color }}20;">
            {!! $icon !!}
        </div>
    @endif
    
    <div style="flex: 1;">
        <p style="font-size: 0.75rem; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.08em; margin: 0 0 0.4rem 0;">{{ $label }}</p>
        <h4 style="font-size: 1.85rem; font-weight: 900; color: #003B5C; margin: 0; line-height: 1; letter-spacing: -0.5px;">{{ $value }}</h4>
    </div>

    <!-- Accent Indicator -->
    <div style="position: absolute; top: 0; right: 0; width: 60px; height: 60px; background: {{ $color }}; opacity: 0.02; border-radius: 0 24px 0 60px;"></div>
</div>
