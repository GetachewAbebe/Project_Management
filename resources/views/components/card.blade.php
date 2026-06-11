@props(['title' => null, 'icon' => null])

<div {{ $attributes->merge(['class' => 'card']) }}>
    @if($title || $icon)
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; padding-bottom: 1.25rem; border-bottom: 1px solid var(--glass-border);">
            <div style="display: flex; align-items: center; gap: 0.85rem;">
                @if($icon)
                    <div style="color: var(--brand-green); background: rgba(0,139,75,0.08); padding: 0.55rem; border-radius: 10px; display: flex; border: 1px solid rgba(0,139,75,0.15);">
                        {!! $icon !!}
                    </div>
                @endif
                <h3 style="font-size: 1.1rem; font-weight: 900; color: var(--text-primary); margin: 0; letter-spacing: -0.02em;">{{ $title }}</h3>
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
