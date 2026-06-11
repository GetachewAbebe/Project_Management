@extends('layouts.app')
@section('title', 'Executive Dashboard')

@section('content')

@php
$hour = now()->hour;
$greeting = $hour < 12 ? 'Good morning' : ($hour < 17 ? 'Good afternoon' : 'Good evening');
$firstName = explode(' ', auth()->user()->name)[0];
@endphp

{{-- ═══ HERO BANNER ══════════════════════════════════════════════════════════ --}}
<div style="background: linear-gradient(-45deg, #001520, #002540, #00355a, #001e30, #002035, #003050); background-size: 400% 400%; animation: heroGradient 14s ease infinite; border-radius: 24px; padding: 3rem 3.5rem; margin-bottom: 2rem; position: relative; overflow: hidden; box-shadow: 0 20px 60px rgba(0,15,40,0.5), 0 4px 14px rgba(0,0,0,0.25); border: 1px solid rgba(0,200,100,0.14);">

    {{-- Grid-line texture overlay --}}
    <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,0.025) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.025) 1px,transparent 1px);background-size:52px 52px;border-radius:24px;pointer-events:none;"></div>

    {{-- Aurora glow spots --}}
    <div style="position:absolute;top:-120px;right:-120px;width:420px;height:420px;background:radial-gradient(circle,rgba(0,200,100,0.16) 0%,transparent 65%);border-radius:50%;pointer-events:none;"></div>
    <div style="position:absolute;bottom:-130px;left:80px;width:480px;height:480px;background:radial-gradient(circle,rgba(0,80,160,0.14) 0%,transparent 65%);border-radius:50%;pointer-events:none;"></div>
    <div style="position:absolute;top:20px;right:20px;width:100px;height:100px;background:rgba(0,212,122,0.07);border-radius:50%;pointer-events:none;"></div>

    {{-- Decorative rings --}}
    <div style="position:absolute;top:-80px;right:-80px;width:340px;height:340px;border:1px solid rgba(0,200,100,0.13);border-radius:50%;pointer-events:none;"></div>
    <div style="position:absolute;bottom:-60px;left:-60px;width:260px;height:260px;border:1px solid rgba(255,255,255,0.04);border-radius:50%;pointer-events:none;"></div>

    {{-- Top row: greeting + clock --}}
    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:2.5rem;gap:1rem;flex-wrap:wrap;position:relative;z-index:1;">
        <div>
            <div style="display:flex;align-items:center;gap:0.65rem;margin-bottom:1rem;flex-wrap:wrap;">
                <div style="display:flex;align-items:center;gap:0.4rem;background:rgba(0,200,100,0.2);border:1px solid rgba(0,200,100,0.35);border-radius:8px;padding:0.28rem 0.8rem;">
                    <div style="width:6px;height:6px;background:#00d47a;border-radius:50%;animation:pulse 2s infinite;box-shadow:0 0 6px rgba(0,212,122,0.8);"></div>
                    <span style="font-size:0.63rem;font-weight:900;color:#00d47a;text-transform:uppercase;letter-spacing:0.15em;">Live · {{ now()->format('F Y') }}</span>
                </div>
                <div style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);border-radius:8px;padding:0.28rem 0.8rem;">
                    <span style="font-size:0.63rem;font-weight:800;color:rgba(255,255,255,0.5);letter-spacing:0.1em;">Evaluation Cycle {{ now()->year }}</span>
                </div>
                <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.08);border-radius:8px;padding:0.28rem 0.8rem;">
                    <span style="font-size:0.63rem;font-weight:800;color:rgba(255,255,255,0.35);letter-spacing:0.1em;">BETin · Est. 2016</span>
                </div>
            </div>
            <h1 style="font-size:2.75rem;font-weight:950;color:white;letter-spacing:-0.045em;margin:0 0 0.5rem;line-height:1.05;">
                {{ $greeting }},
                <span style="background:linear-gradient(135deg,#00d47a 0%,#4ade80 45%,#22d3ee 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ $firstName }}</span>
            </h1>
            <p style="color:rgba(255,255,255,0.42);font-size:0.9rem;font-weight:600;margin:0;letter-spacing:0.01em;">
                {{ now()->format('l, F j, Y') }} &nbsp;·&nbsp; Bio and Emerging Technology Institute
            </p>
        </div>

        <div style="text-align:right;flex-shrink:0;position:relative;z-index:1;">
            <div style="font-size:0.56rem;font-weight:900;color:rgba(255,255,255,0.25);text-transform:uppercase;letter-spacing:0.18em;margin-bottom:5px;">System Time</div>
            <div style="font-size:3rem;font-weight:950;color:white;letter-spacing:-0.06em;line-height:1;font-variant-numeric:tabular-nums;text-shadow:0 0 30px rgba(255,255,255,0.12);">{{ now()->format('H:i') }}</div>
            <div style="font-size:0.7rem;font-weight:800;color:rgba(0,212,122,0.65);margin-top:5px;letter-spacing:0.08em;">betin.gov.et</div>
        </div>
    </div>

    {{-- Stat tiles --}}
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;position:relative;z-index:1;">

        <div style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);border-radius:18px;padding:1.5rem 1.6rem;backdrop-filter:blur(12px);position:relative;overflow:hidden;">
            <div style="position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.25),transparent);border-radius:18px 18px 0 0;"></div>
            <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.9rem;">
                <div style="width:34px;height:34px;background:rgba(255,255,255,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.75);">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <span style="font-size:0.63rem;font-weight:900;color:rgba(255,255,255,0.38);text-transform:uppercase;letter-spacing:0.13em;">Portfolio</span>
            </div>
            <div style="font-size:3.2rem;font-weight:950;color:white;line-height:1;letter-spacing:-0.05em;text-shadow:0 2px 12px rgba(255,255,255,0.15);">{{ $stats['projects'] }}</div>
            <div style="font-size:0.73rem;color:rgba(255,255,255,0.32);font-weight:700;margin-top:0.35rem;letter-spacing:0.02em;">Total research projects</div>
        </div>

        <div style="background:linear-gradient(135deg,rgba(0,168,88,0.25) 0%,rgba(0,100,55,0.15) 100%);border:1px solid rgba(0,212,122,0.3);border-radius:18px;padding:1.5rem 1.6rem;backdrop-filter:blur(12px);position:relative;overflow:hidden;box-shadow:inset 0 1px 0 rgba(0,212,122,0.15);">
            <div style="position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,rgba(0,212,122,0.6),transparent);border-radius:18px 18px 0 0;"></div>
            <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.9rem;">
                <div style="width:34px;height:34px;background:rgba(0,212,122,0.18);border-radius:10px;display:flex;align-items:center;justify-content:center;color:#00d47a;box-shadow:0 0 12px rgba(0,212,122,0.2);">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <span style="font-size:0.63rem;font-weight:900;color:rgba(0,212,122,0.65);text-transform:uppercase;letter-spacing:0.13em;">Performance</span>
            </div>
            <div style="font-size:3.2rem;font-weight:950;color:#00d47a;line-height:1;letter-spacing:-0.05em;text-shadow:0 2px 16px rgba(0,212,122,0.35);">{{ round($stats['performance_index']) }}<span style="font-size:1.6rem;opacity:0.7;">%</span></div>
            <div style="font-size:0.73rem;color:rgba(0,212,122,0.45);font-weight:700;margin-top:0.35rem;">Avg evaluation score</div>
        </div>

        <div style="background:linear-gradient(135deg,rgba(251,191,36,0.15) 0%,rgba(217,119,6,0.1) 100%);border:1px solid rgba(251,191,36,0.28);border-radius:18px;padding:1.5rem 1.6rem;backdrop-filter:blur(12px);position:relative;overflow:hidden;">
            <div style="position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,rgba(251,191,36,0.55),transparent);border-radius:18px 18px 0 0;"></div>
            <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.9rem;">
                <div style="width:34px;height:34px;background:rgba(251,191,36,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;color:#fbbf24;">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <span style="font-size:0.63rem;font-weight:900;color:rgba(251,191,36,0.55);text-transform:uppercase;letter-spacing:0.13em;">Active</span>
            </div>
            <div style="font-size:3.2rem;font-weight:950;color:#fbbf24;line-height:1;letter-spacing:-0.05em;text-shadow:0 2px 16px rgba(251,191,36,0.3);">{{ $stats['ongoing_projects'] }}</div>
            <div style="font-size:0.73rem;color:rgba(251,191,36,0.42);font-weight:700;margin-top:0.35rem;">Ongoing research</div>
        </div>

        <div style="background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.1);border-radius:18px;padding:1.5rem 1.6rem;backdrop-filter:blur(12px);position:relative;overflow:hidden;">
            <div style="position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.15),transparent);border-radius:18px 18px 0 0;"></div>
            <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.9rem;">
                <div style="width:34px;height:34px;background:rgba(255,255,255,0.09);border-radius:10px;display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.62);">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <span style="font-size:0.63rem;font-weight:900;color:rgba(255,255,255,0.32);text-transform:uppercase;letter-spacing:0.13em;">Directorates</span>
            </div>
            <div style="font-size:3.2rem;font-weight:950;color:white;line-height:1;letter-spacing:-0.05em;text-shadow:0 2px 12px rgba(255,255,255,0.12);">10</div>
            <div style="font-size:0.73rem;color:rgba(255,255,255,0.28);font-weight:700;margin-top:0.35rem;">2 Research Centers</div>
        </div>

    </div>
</div>

{{-- ═══ ANALYTICS GRID ═══════════════════════════════════════════════════════ --}}
<div style="display:grid;grid-template-columns:1fr 1.4fr;gap:1.75rem;margin-bottom:1.75rem;">

    {{-- Portfolio Velocity — ring charts --}}
    <div style="background:white;border:1px solid var(--glass-border);border-radius:18px;padding:1.75rem;box-shadow:0 2px 4px rgba(0,0,0,0.04),0 12px 36px rgba(0,59,92,0.09);position:relative;overflow:hidden;">
        <div style="position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--brand-green),#00d47a,#4ade80);border-radius:18px 18px 0 0;"></div>
        <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:1.75rem;padding-bottom:1.25rem;border-bottom:1px solid var(--glass-border);margin-top:0.5rem;">
            <div style="background:rgba(0,139,75,0.08);border:1px solid rgba(0,139,75,0.15);border-radius:9px;padding:0.5rem;color:var(--brand-green);">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
            <h3 style="font-size:1.05rem;font-weight:900;color:var(--text-primary);margin:0;letter-spacing:-0.02em;">Portfolio Velocity</h3>
        </div>

        @php
            $ringData = [
                'Ongoing Projects'    => ['color' => '#16a34a', 'track' => '#dcfce7', 'label' => 'Active R&D',  'text' => '#15803d'],
                'Completed Projects'  => ['color' => '#2563eb', 'track' => '#dbeafe', 'label' => 'Completed',   'text' => '#1e40af'],
                'Terminated Projects' => ['color' => '#94a3b8', 'track' => '#f1f5f9', 'label' => 'Archived',    'text' => '#475569'],
            ];
        @endphp

        <div style="display:flex;flex-direction:column;gap:1rem;">
            @foreach($projectStatusCounts as $status => $count)
            @php
                $cfg = $ringData[$status] ?? $ringData['Terminated Projects'];
                $pct = $stats['projects'] > 0 ? round(($count / $stats['projects']) * 100) : 0;
                $dash = $pct . ' ' . (100 - $pct);
                $filterId = 'glow-' . $loop->index;
            @endphp
            <div style="display:flex;align-items:center;gap:1.25rem;padding:1rem 1.25rem;background:var(--bg-surface);border-radius:14px;border:1px solid var(--glass-border);transition:all 0.22s;box-shadow:0 1px 3px rgba(0,59,92,0.04);" onmouseover="this.style.borderColor='{{ $cfg['color'] }}33';this.style.transform='translateX(4px)';this.style.boxShadow='0 4px 16px rgba(0,59,92,0.1)'" onmouseout="this.style.borderColor='var(--glass-border)';this.style.transform='';this.style.boxShadow='0 1px 3px rgba(0,59,92,0.04)'">

                {{-- SVG ring chart with glow --}}
                <div style="flex-shrink:0;">
                    <svg width="80" height="80" viewBox="0 0 36 36">
                        <defs>
                            <filter id="{{ $filterId }}" x="-40%" y="-40%" width="180%" height="180%">
                                <feGaussianBlur stdDeviation="1.2" in="SourceGraphic" result="blur"/>
                                <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                            </filter>
                        </defs>
                        <circle cx="18" cy="18" r="15.9155" fill="none" stroke="{{ $cfg['track'] }}" stroke-width="3"/>
                        <circle cx="18" cy="18" r="15.9155" fill="none" stroke="{{ $cfg['color'] }}" stroke-width="3.8"
                            stroke-dasharray="{{ $dash }}"
                            transform="rotate(-90 18 18)"
                            stroke-linecap="round"
                            filter="url(#{{ $filterId }})"/>
                        <text x="18" y="17.2" text-anchor="middle"
                            font-size="6.5" font-weight="900" fill="{{ $cfg['text'] }}"
                            font-family="Outfit,sans-serif">{{ $pct }}%</text>
                        <text x="18" y="22.5" text-anchor="middle"
                            font-size="3.5" font-weight="700" fill="{{ $cfg['text'] }}" opacity="0.6"
                            font-family="Outfit,sans-serif">{{ $count }}</text>
                    </svg>
                </div>

                <div style="flex:1;min-width:0;">
                    <div style="font-size:0.88rem;font-weight:800;color:var(--text-primary);margin-bottom:3px;">{{ $cfg['label'] }}</div>
                    <div style="font-size:0.72rem;color:var(--text-secondary);font-weight:600;margin-bottom:8px;">{{ $status }}</div>
                    {{-- Mini bar --}}
                    <div style="height:4px;background:{{ $cfg['track'] }};border-radius:99px;overflow:hidden;">
                        <div style="height:100%;width:{{ $pct }}%;background:{{ $cfg['color'] }};border-radius:99px;transition:width 1.4s ease;"></div>
                    </div>
                </div>

                <div style="text-align:right;flex-shrink:0;">
                    <div style="font-size:2.4rem;font-weight:950;color:{{ $cfg['color'] }};line-height:1;letter-spacing:-0.04em;">{{ $count }}</div>
                    <div style="font-size:0.6rem;font-weight:900;color:{{ $cfg['text'] }};background:{{ $cfg['track'] }};padding:0.15rem 0.5rem;border-radius:5px;text-transform:uppercase;margin-top:4px;letter-spacing:0.06em;">projects</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Directorate Performance --}}
    <div style="background:white;border:1px solid var(--glass-border);border-radius:18px;padding:1.75rem;box-shadow:0 2px 4px rgba(0,0,0,0.04),0 12px 36px rgba(0,59,92,0.09);position:relative;overflow:hidden;">
        <div style="position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--brand-blue),#1a7db5,var(--brand-green));border-radius:18px 18px 0 0;"></div>
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;padding-bottom:1.25rem;border-bottom:1px solid var(--glass-border);margin-top:0.5rem;">
            <div style="display:flex;align-items:center;gap:0.75rem;">
                <div style="background:rgba(0,59,92,0.07);border:1px solid rgba(0,59,92,0.12);border-radius:9px;padding:0.5rem;color:var(--brand-blue);">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 style="font-size:1.05rem;font-weight:900;color:var(--text-primary);margin:0;letter-spacing:-0.02em;">Directorate Performance</h3>
            </div>
            <div style="display:flex;gap:0.5rem;">
                <span style="display:inline-flex;align-items:center;gap:0.35rem;font-size:0.63rem;font-weight:800;color:#1e40af;background:#dbeafe;border:1px solid #bfdbfe;padding:0.2rem 0.6rem;border-radius:6px;">
                    <span style="width:6px;height:6px;background:#2563eb;border-radius:1px;display:inline-block;"></span>Biotech
                </span>
                <span style="display:inline-flex;align-items:center;gap:0.35rem;font-size:0.63rem;font-weight:800;color:#15803d;background:#dcfce7;border:1px solid #bbf7d0;padding:0.2rem 0.6rem;border-radius:6px;">
                    <span style="width:6px;height:6px;background:var(--brand-green);border-radius:1px;display:inline-block;"></span>EmTech
                </span>
            </div>
        </div>

        <div style="display:flex;flex-direction:column;gap:0.6rem;max-height:370px;overflow-y:auto;padding-right:2px;">
            @forelse($directorateStats as $index => $d)
            @php
                $rankColors = [
                    0 => ['bg'=>'linear-gradient(135deg,#f59e0b,#d97706)','shadow'=>'rgba(245,158,11,0.4)'],
                    1 => ['bg'=>'linear-gradient(135deg,#94a3b8,#64748b)','shadow'=>'rgba(100,116,139,0.3)'],
                    2 => ['bg'=>'linear-gradient(135deg,#cd7c54,#b45309)','shadow'=>'rgba(180,83,9,0.3)'],
                ];
                $rankStyle = $rankColors[$index] ?? ['bg'=>'linear-gradient(135deg,var(--brand-blue),var(--brand-green))','shadow'=>'rgba(0,59,92,0.2)'];
            @endphp
            <div style="display:flex;align-items:center;gap:1rem;padding:0.85rem 1rem;background:var(--bg-surface);border-radius:12px;border:1px solid var(--glass-border);transition:all 0.2s;" onmouseover="this.style.background='white';this.style.borderColor='rgba(0,139,75,0.2)';this.style.boxShadow='0 4px 14px rgba(0,59,92,0.07)'" onmouseout="this.style.background='var(--bg-surface)';this.style.borderColor='var(--glass-border)';this.style.boxShadow='none'">

                {{-- Rank badge --}}
                <div style="width:32px;height:32px;background:{{ $rankStyle['bg'] }};color:white;border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:950;font-size:0.78rem;flex-shrink:0;box-shadow:0 3px 10px {{ $rankStyle['shadow'] }};">
                    {{ $index < 3 ? ['🥇','🥈','🥉'][$index] : '#'.($index+1) }}
                </div>

                {{-- Info + bar --}}
                <div style="flex:1;min-width:0;">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.5rem;">
                        <span style="font-size:0.84rem;font-weight:800;color:var(--text-primary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:150px;">{{ $d['name'] }}</span>
                        <span style="font-size:0.7rem;font-weight:700;color:var(--text-secondary);flex-shrink:0;margin-left:0.5rem;background:var(--glass-border);padding:0.15rem 0.45rem;border-radius:5px;">{{ $d['count'] }} {{ Str::plural('proj', $d['count']) }}</span>
                    </div>
                    <div style="height:7px;background:#e2eaf2;border-radius:99px;overflow:hidden;box-shadow:inset 0 1px 2px rgba(0,0,0,0.06);">
                        <div style="height:100%;width:{{ $d['percentage'] }}%;background:linear-gradient(90deg,#1a5f8a,var(--brand-blue),var(--brand-green));border-radius:99px;filter:drop-shadow(0 0 4px rgba(0,168,88,0.5));transition:width 1.5s cubic-bezier(0.16,1,0.3,1);"></div>
                    </div>
                </div>

                {{-- Percent --}}
                <div style="font-size:1.3rem;font-weight:950;color:var(--brand-green);letter-spacing:-0.03em;flex-shrink:0;min-width:44px;text-align:right;">{{ $d['percentage'] }}<span style="font-size:0.65rem;opacity:0.65;">%</span></div>
            </div>
            @empty
            <div style="text-align:center;padding:3rem;color:var(--text-muted);">
                <svg width="44" height="44" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin:0 auto 0.75rem;opacity:0.3;display:block;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                <p style="font-weight:800;font-size:0.9rem;color:var(--text-secondary);margin:0;">No directorate data yet</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

{{-- ═══ ANNUAL EVALUATION BANNER ══════════════════════════════════════════════ --}}
<div style="background:linear-gradient(135deg,#003B5C,#004f75);border-radius:18px;padding:1.4rem 2rem;margin-bottom:1.75rem;display:flex;align-items:center;justify-content:space-between;gap:1.5rem;flex-wrap:wrap;box-shadow:0 4px 20px rgba(0,59,92,0.18);">
    <div style="display:flex;align-items:center;gap:1.1rem;">
        <div style="width:46px;height:46px;background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.16);border-radius:13px;display:flex;align-items:center;justify-content:center;color:white;flex-shrink:0;">
            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
        </div>
        <div>
            <div style="font-size:0.62rem;font-weight:900;color:rgba(255,255,255,0.45);text-transform:uppercase;letter-spacing:0.15em;margin-bottom:3px;">Annual Evaluation Cycle</div>
            <div style="font-size:1rem;font-weight:950;color:white;letter-spacing:-0.02em;">{{ now()->year }} Research Evaluation Period</div>
            <div style="font-size:0.78rem;color:rgba(255,255,255,0.5);font-weight:600;margin-top:2px;">Once-yearly peer review across all 10 directorates &amp; 2 research centers</div>
        </div>
    </div>
    <div style="display:flex;gap:0.65rem;flex-shrink:0;">
        <a href="{{ route('evaluations.index') }}" style="display:inline-flex;align-items:center;gap:0.45rem;padding:0.65rem 1.25rem;background:var(--brand-green);color:white;border-radius:10px;font-size:0.85rem;font-weight:800;text-decoration:none;box-shadow:0 2px 8px rgba(0,139,75,0.4);transition:all 0.15s;" onmouseover="this.style.background='#00a858'" onmouseout="this.style.background='var(--brand-green)'">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            Open Evaluations
        </a>
        <a href="{{ route('evaluations.summary') }}" style="display:inline-flex;align-items:center;gap:0.45rem;padding:0.65rem 1.25rem;background:rgba(255,255,255,0.1);color:white;border:1px solid rgba(255,255,255,0.2);border-radius:10px;font-size:0.85rem;font-weight:700;text-decoration:none;transition:all 0.15s;" onmouseover="this.style.background='rgba(255,255,255,0.18)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">
            View Summary
        </a>
    </div>
</div>

{{-- ═══ PRIORITY RESEARCH REGISTRY ════════════════════════════════════════════ --}}
<div style="background:white;border:1px solid var(--glass-border);border-radius:18px;box-shadow:0 2px 4px rgba(0,0,0,0.04),0 12px 36px rgba(0,59,92,0.09);overflow:hidden;margin-bottom:0.5rem;position:relative;">
    <div style="position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,#8b5cf6,#6d28d9,var(--brand-blue));border-radius:18px 18px 0 0;"></div>

    {{-- Table header --}}
    <div style="padding:1.4rem 1.75rem;border-bottom:1px solid var(--glass-border);display:flex;align-items:center;justify-content:space-between;background:linear-gradient(135deg,#fafcfe,#f5f8fc);margin-top:3px;">
        <div style="display:flex;align-items:center;gap:0.75rem;">
            <div style="background:rgba(0,139,75,0.08);border:1px solid rgba(0,139,75,0.15);border-radius:9px;padding:0.5rem;color:var(--brand-green);">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
            <div>
                <h3 style="font-size:1.05rem;font-weight:900;color:var(--text-primary);margin:0;letter-spacing:-0.02em;">Priority Research Registry</h3>
                <p style="font-size:0.72rem;color:var(--text-secondary);font-weight:600;margin:1px 0 0;">Latest {{ $recentProjects->count() }} research initiatives</p>
            </div>
        </div>
        <a href="{{ route('projects.index') }}" style="display:inline-flex;align-items:center;gap:0.4rem;font-size:0.82rem;font-weight:800;color:var(--brand-green);text-decoration:none;padding:0.5rem 1rem;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:9px;transition:all 0.15s;" onmouseover="this.style.background='#dcfce7'" onmouseout="this.style.background='#f0fdf4'">
            View all projects
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>

    <div style="overflow-x:auto;padding:0 0.75rem 1rem;">
        <table style="width:100%;border-collapse:separate;border-spacing:0 3px;margin-top:0.5rem;">
            <thead>
                <tr>
                    <th style="text-align:left;padding:0.5rem 1rem;font-size:0.66rem;font-weight:900;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.1em;">Initiative</th>
                    <th style="text-align:left;padding:0.5rem 1rem;font-size:0.66rem;font-weight:900;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.1em;">Lead Investigator</th>
                    <th style="text-align:left;padding:0.5rem 1rem;font-size:0.66rem;font-weight:900;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.1em;">Directorate</th>
                    <th style="text-align:right;padding:0.5rem 1rem;font-size:0.66rem;font-weight:900;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.1em;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentProjects as $project)
                @php
                    $avatarBgs = ['linear-gradient(135deg,#3b82f6,#2563eb)','linear-gradient(135deg,#8b5cf6,#7c3aed)','linear-gradient(135deg,#06b6d4,#0891b2)','linear-gradient(135deg,#f59e0b,#d97706)','linear-gradient(135deg,#10b981,#059669)'];
                    $avatarBg = $avatarBgs[$loop->index % 5];
                @endphp
                <tr style="background:white;transition:all 0.15s;" onmouseover="this.style.background='var(--bg-surface)';this.style.transform='translateY(-1px)';this.querySelectorAll('td').forEach(t=>{t.style.borderColor='rgba(0,139,75,0.15)'})" onmouseout="this.style.background='white';this.style.transform='';this.querySelectorAll('td').forEach(t=>{t.style.borderColor='#f1f5f9'})">
                    <td style="padding:1rem;border-top:1px solid #f1f5f9;border-bottom:1px solid #f1f5f9;border-left:1px solid #f1f5f9;border-radius:10px 0 0 10px;transition:border-color 0.15s;">
                        <div style="font-weight:800;color:var(--text-primary);font-size:0.9rem;margin-bottom:0.4rem;line-height:1.35;">{{ $project->research_title }}</div>
                        <div style="display:flex;align-items:center;gap:0.6rem;">
                            <span style="font-size:0.68rem;font-weight:900;color:var(--blue-bright);background:#e8f4fd;border:1px solid #bfdbfe;padding:0.2rem 0.6rem;border-radius:5px;letter-spacing:0.04em;">{{ $project->project_code ?? 'TBD' }}</span>
                            <span style="font-size:0.72rem;font-weight:600;color:var(--text-muted);">{{ $project->start_year }}</span>
                        </div>
                    </td>
                    <td style="padding:1rem;border-top:1px solid #f1f5f9;border-bottom:1px solid #f1f5f9;transition:border-color 0.15s;">
                        <div style="display:flex;align-items:center;gap:0.7rem;">
                            <div style="width:36px;height:36px;background:{{ $avatarBg }};border-radius:10px;display:flex;align-items:center;justify-content:center;color:white;font-weight:950;font-size:0.95rem;flex-shrink:0;">{{ substr($project->pi->full_name,0,1) }}</div>
                            <div>
                                <div style="font-weight:800;font-size:0.87rem;color:var(--text-primary);">{{ $project->pi->full_name }}</div>
                                <div style="font-size:0.7rem;color:var(--text-muted);font-weight:600;">Principal Investigator</div>
                            </div>
                        </div>
                    </td>
                    <td style="padding:1rem;border-top:1px solid #f1f5f9;border-bottom:1px solid #f1f5f9;transition:border-color 0.15s;">
                        <div style="display:inline-flex;align-items:center;gap:0.45rem;padding:0.3rem 0.8rem;background:#f0f5fa;border:1px solid #dce6f0;border-radius:8px;">
                            <div style="width:6px;height:6px;background:var(--brand-blue);border-radius:50%;opacity:0.5;"></div>
                            <span style="font-size:0.8rem;font-weight:700;color:var(--text-secondary);">{{ $project->directorate->name }}</span>
                        </div>
                    </td>
                    <td style="text-align:right;padding:1rem;border-top:1px solid #f1f5f9;border-bottom:1px solid #f1f5f9;border-right:1px solid #f1f5f9;border-radius:0 10px 10px 0;transition:border-color 0.15s;">
                        <x-status-badge :status="$project->status" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center;padding:4rem;">
                        <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin:0 auto 1rem;color:var(--text-muted);opacity:0.3;display:block;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        <div style="font-size:1rem;font-weight:800;color:var(--text-secondary);">No research initiatives yet</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
@keyframes pulse { 0%,100%{opacity:1}50%{opacity:0.4} }
@keyframes heroGradient {
    0%   { background-position: 0%   50%; }
    50%  { background-position: 100% 50%; }
    100% { background-position: 0%   50%; }
}
@keyframes accentSlide {
    0%   { background-position: 0%   50%; }
    100% { background-position: 200% 50%; }
}
</style>
@endsection
