@props(['status'])

@php
    $status = strtoupper($status);
    $configs = [
        'REGISTERED' => ['bg' => '#f1f5f9', 'text' => '#475569', 'label' => 'NEW SUBMISSION', 'glow' => 'rgba(71, 85, 105, 0.2)'],
        'ONGOING'    => ['bg' => '#dcfce7', 'text' => '#15803d', 'label' => 'ACTIVE RESEARCH', 'glow' => 'rgba(21, 128, 61, 0.2)'],
        'COMPLETED'  => ['bg' => '#dbeafe', 'text' => '#1d4ed8', 'label' => 'FINALIZED', 'glow' => 'rgba(29, 78, 216, 0.2)'],
        'EVALUATED'  => ['bg' => '#f5f3ff', 'text' => '#6d28d9', 'label' => 'QA PASSED', 'glow' => 'rgba(109, 40, 217, 0.2)'],
        'TERMINATED' => ['bg' => '#fee2e2', 'text' => '#b91c1c', 'label' => 'DISCONTINUED', 'glow' => 'rgba(185, 28, 28, 0.2)'],
    ];

    $config = $configs[$status] ?? $configs['REGISTERED'];
@endphp

<span class="status-pill" style="background: {{ $config['bg'] }}; color: {{ $config['text'] }}; box-shadow: 0 0 10px {{ $config['glow'] }};">
    {{ $config['label'] }}
</span>
