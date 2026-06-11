@props(['status'])

@php
    $status = strtoupper($status);
    $configs = [
        'REGISTERED' => ['bg' => '#f1f5f9', 'text' => '#475569', 'border' => '#e2e8f0', 'label' => 'NEW SUBMISSION', 'dot' => '#94a3b8'],
        'ONGOING'    => ['bg' => '#dcfce7', 'text' => '#15803d', 'border' => '#bbf7d0', 'label' => 'ACTIVE RESEARCH', 'dot' => '#16a34a'],
        'COMPLETED'  => ['bg' => '#dbeafe', 'text' => '#1e40af', 'border' => '#bfdbfe', 'label' => 'FINALIZED',       'dot' => '#2563eb'],
        'EVALUATED'  => ['bg' => '#f3e8ff', 'text' => '#7e22ce', 'border' => '#e9d5ff', 'label' => 'QA PASSED',       'dot' => '#9333ea'],
        'TERMINATED' => ['bg' => '#fee2e2', 'text' => '#b91c1c', 'border' => '#fecaca', 'label' => 'DISCONTINUED',    'dot' => '#dc2626'],
    ];

    $config = $configs[$status] ?? $configs['REGISTERED'];
@endphp

<span style="display: inline-flex; align-items: center; gap: 0.4rem; background: {{ $config['bg'] }}; color: {{ $config['text'] }}; border: 1px solid {{ $config['border'] }}; font-size: 0.67rem; font-weight: 900; padding: 0.3rem 0.75rem; border-radius: 7px; text-transform: uppercase; letter-spacing: 0.07em; white-space: nowrap;">
    <span style="width: 5px; height: 5px; background: {{ $config['dot'] }}; border-radius: 50%; flex-shrink: 0;"></span>
    {{ $config['label'] }}
</span>
