@props(['title' => null, 'icon' => null])

<div {{ $attributes->merge(['class' => 'card']) }}>
    @if($title || $icon)
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2.5rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 1.25rem;">
            <div style="display: flex; align-items: center; gap: 1rem;">
                @if($icon)
                    <div style="color: var(--brand-blue); background: rgba(0, 59, 92, 0.05); padding: 0.6rem; border-radius: 12px; display: flex;">
                        {!! $icon !!}
                    </div>
                @endif
                <h3 style="font-size: 1.15rem; font-weight: 900; color: var(--brand-blue); margin: 0; letter-spacing: -0.02em;">{{ $title }}</h3>
            </div>
            
            @if(isset($headerActions))
                <div>{{ $headerActions }}</div>
            @endif
        </div>
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>
</div>
