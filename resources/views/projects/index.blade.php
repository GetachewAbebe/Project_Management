@extends('layouts.app')

@section('title', 'Project Portfolio')

@section('content')
<div style="max-width: 1400px; margin: 0 auto;">

    {{-- ═══ HERO BANNER ══════════════════════════════════════════════════════════ --}}
    <div style="background:linear-gradient(-45deg,#001520,#002540,#003556,#001e30,#00253e,#002f50);background-size:400% 400%;animation:heroGradient 16s ease infinite;border-radius:24px;padding:2.5rem 3rem;margin-bottom:1.75rem;position:relative;overflow:hidden;box-shadow:0 20px 60px rgba(0,15,40,0.45),0 4px 14px rgba(0,0,0,0.22);border:1px solid rgba(0,200,100,0.13);">

        {{-- Grid-line texture --}}
        <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,0.025) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.025) 1px,transparent 1px);background-size:52px 52px;border-radius:24px;pointer-events:none;"></div>

        {{-- Aurora spots --}}
        <div style="position:absolute;top:-100px;right:-100px;width:380px;height:380px;background:radial-gradient(circle,rgba(0,200,100,0.16) 0%,transparent 65%);border-radius:50%;pointer-events:none;"></div>
        <div style="position:absolute;bottom:-120px;left:60px;width:420px;height:420px;background:radial-gradient(circle,rgba(0,80,160,0.13) 0%,transparent 65%);border-radius:50%;pointer-events:none;"></div>

        <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:1.5rem;flex-wrap:wrap;margin-bottom:2rem;position:relative;z-index:1;">
            <div>
                <div style="display:flex;align-items:center;gap:0.6rem;margin-bottom:0.9rem;">
                    <div style="display:flex;align-items:center;gap:0.4rem;background:rgba(0,200,100,0.2);border:1px solid rgba(0,200,100,0.35);border-radius:8px;padding:0.28rem 0.8rem;">
                        <div style="width:6px;height:6px;background:#00d47a;border-radius:50%;animation:pulse 2s infinite;box-shadow:0 0 6px rgba(0,212,122,0.8);"></div>
                        <span style="font-size:0.63rem;font-weight:900;color:#00d47a;text-transform:uppercase;letter-spacing:0.15em;">Live Registry</span>
                    </div>
                    <div style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);border-radius:8px;padding:0.28rem 0.8rem;">
                        <span style="font-size:0.63rem;font-weight:800;color:rgba(255,255,255,0.45);letter-spacing:0.1em;">BETin · Est. 2016</span>
                    </div>
                </div>
                <h1 style="font-size:2.4rem;font-weight:950;letter-spacing:-0.045em;margin:0 0 0.45rem;line-height:1.05;">
                    <span style="color:white;">Research </span><span style="background:linear-gradient(135deg,#00d47a 0%,#4ade80 50%,#22d3ee 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Portfolio</span>
                </h1>
                <p style="color:rgba(255,255,255,0.42);font-size:0.88rem;font-weight:600;margin:0;">
                    Institutional registry across 2 research centers &amp; 10 directorates
                </p>
            </div>
            @can('create', App\Models\Project::class)
            <a href="{{ route('projects.create') }}"
               style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.8rem 1.6rem;background:linear-gradient(135deg,#00c96e,var(--brand-green));color:white;border:none;border-radius:12px;font-size:0.9rem;font-weight:800;text-decoration:none;box-shadow:0 6px 20px rgba(0,139,75,0.5);transition:all 0.18s;flex-shrink:0;position:relative;z-index:1;"
               onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 10px 28px rgba(0,139,75,0.6)'" onmouseout="this.style.transform='';this.style.boxShadow='0 6px 20px rgba(0,139,75,0.5)'">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
                Register Project
            </a>
            @endcan
        </div>

        {{-- Stat tiles --}}
        <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:0.85rem;position:relative;z-index:1;">
            @php
                $heroStats = [
                    ['label'=>'Total Projects',  'value'=>$portfolioSummary->total      ?? 0, 'bg'=>'rgba(255,255,255,0.08)', 'border'=>'rgba(255,255,255,0.13)', 'val'=>'white',    'top'=>'rgba(255,255,255,0.2)'],
                    ['label'=>'Active Research', 'value'=>$portfolioSummary->ongoing    ?? 0, 'bg'=>'rgba(0,168,88,0.22)',   'border'=>'rgba(0,212,122,0.3)',    'val'=>'#00d47a',  'top'=>'rgba(0,212,122,0.55)'],
                    ['label'=>'Completed',       'value'=>$portfolioSummary->completed  ?? 0, 'bg'=>'rgba(37,99,235,0.18)',  'border'=>'rgba(96,165,250,0.3)',   'val'=>'#93c5fd',  'top'=>'rgba(96,165,250,0.5)'],
                    ['label'=>'Evaluated',       'value'=>$portfolioSummary->evaluated  ?? 0, 'bg'=>'rgba(139,92,246,0.18)', 'border'=>'rgba(167,139,250,0.3)',  'val'=>'#c4b5fd',  'top'=>'rgba(167,139,250,0.5)'],
                    ['label'=>'Awaiting Review', 'value'=>$portfolioSummary->registered ?? 0, 'bg'=>'rgba(251,191,36,0.15)', 'border'=>'rgba(251,191,36,0.3)',   'val'=>'#fcd34d',  'top'=>'rgba(251,191,36,0.5)'],
                ];
            @endphp
            @foreach($heroStats as $s)
            <div style="background:{{ $s['bg'] }};border:1px solid {{ $s['border'] }};border-radius:16px;padding:1.1rem 1.25rem;backdrop-filter:blur(10px);position:relative;overflow:hidden;">
                <div style="position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,{{ $s['top'] }},transparent);"></div>
                <div style="font-size:2.4rem;font-weight:950;color:{{ $s['val'] }};line-height:1;letter-spacing:-0.05em;text-shadow:0 2px 12px {{ $s['val'] }}22;">{{ $s['value'] }}</div>
                <div style="font-size:0.65rem;color:rgba(255,255,255,0.38);font-weight:800;margin-top:0.4rem;text-transform:uppercase;letter-spacing:0.08em;">{{ $s['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <div style="background:white;border-radius:20px;border:1px solid var(--glass-border);box-shadow:0 2px 4px rgba(0,0,0,0.04),0 12px 40px rgba(0,59,92,0.09);overflow:hidden;position:relative;">
        <div style="position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--brand-green),#00d47a,#4ade80,#00d47a);border-radius:20px 20px 0 0;z-index:1;"></div>

        <!-- Filter Bar -->
        <form method="GET" action="{{ route('projects.index') }}" id="filter-form">
            <div style="padding:1.5rem 2rem;border-bottom:1px solid var(--glass-border);display:flex;gap:1rem;align-items:center;flex-wrap:wrap;background:linear-gradient(135deg,#fafcfe,#f5f8fc);margin-top:3px;">

                <!-- Search -->
                <div style="position: relative; flex: 1; min-width: 220px; max-width: 320px;">
                    <svg style="position: absolute; left: 0.85rem; top: 50%; transform: translateY(-50%); color: var(--text-muted); pointer-events: none;" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search title, code, staff…"
                           style="width: 100%; padding: 0.65rem 1rem 0.65rem 2.5rem; background: white; border: 1px solid var(--glass-border); border-radius: 10px; font-family: 'Outfit', sans-serif; font-weight: 600; font-size: 0.87rem; color: var(--text-primary); transition: all 0.2s; box-sizing: border-box;"
                           onfocus="this.style.borderColor='rgba(0,139,75,0.4)';this.style.boxShadow='0 0 0 3px rgba(0,139,75,0.07)'"
                           onblur="this.style.borderColor='var(--glass-border)';this.style.boxShadow='none'"
                           x-data x-on:input.debounce.400ms="$el.closest('form').submit()">
                </div>

                <!-- Status -->
                <select name="status" onchange="this.form.submit()"
                        style="padding: 0.65rem 1rem; background: white; border: 1px solid var(--glass-border); border-radius: 10px; font-family: 'Outfit', sans-serif; font-weight: 600; font-size: 0.87rem; color: var(--text-primary); cursor: pointer; min-width: 150px; transition: all 0.2s;"
                        onfocus="this.style.borderColor='rgba(0,139,75,0.4)'" onblur="this.style.borderColor='var(--glass-border)'">
                    <option value="">All Statuses</option>
                    @foreach(['REGISTERED' => 'New / Registered', 'ONGOING' => 'Ongoing', 'COMPLETED' => 'Completed', 'EVALUATED' => 'Evaluated', 'TERMINATED' => 'Terminated'] as $val => $label)
                        <option value="{{ $val }}" {{ request('status') === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>

                @if(auth()->user()->isAdmin())
                <select name="directorate_id" onchange="this.form.submit()"
                        style="padding: 0.65rem 1rem; background: white; border: 1px solid var(--glass-border); border-radius: 10px; font-family: 'Outfit', sans-serif; font-weight: 600; font-size: 0.87rem; color: var(--text-primary); cursor: pointer; max-width: 200px; transition: all 0.2s;"
                        onfocus="this.style.borderColor='rgba(0,139,75,0.4)'" onblur="this.style.borderColor='var(--glass-border)'">
                    <option value="">All Directorates</option>
                    @foreach($directorates as $dir)
                        <option value="{{ $dir->id }}" {{ request('directorate_id') == $dir->id ? 'selected' : '' }}>{{ $dir->name }}</option>
                    @endforeach
                </select>
                @endif

                <input type="number" name="year" value="{{ request('year') }}"
                       placeholder="Year"
                       style="padding: 0.65rem 1rem; background: white; border: 1px solid var(--glass-border); border-radius: 10px; font-family: 'Outfit', sans-serif; font-weight: 600; font-size: 0.87rem; color: var(--text-primary); width: 95px; transition: all 0.2s;"
                       onfocus="this.style.borderColor='rgba(0,139,75,0.4)'" onblur="this.style.borderColor='var(--glass-border)'"
                       onchange="this.form.submit()">

                <!-- Spacer -->
                <div style="flex: 1;"></div>

                @if(request()->hasAny(['search', 'status', 'directorate_id', 'year']))
                <a href="{{ route('projects.index') }}"
                   style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.65rem 1rem; background: white; border: 1px solid #e2e8f0; border-radius: 10px; color: var(--text-secondary); font-size: 0.85rem; font-weight: 700; text-decoration: none; transition: all 0.15s;"
                   onmouseover="this.style.background='#f8fafc';this.style.borderColor='#cbd5e1'" onmouseout="this.style.background='white';this.style.borderColor='#e2e8f0'">
                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    Clear filters
                </a>
                @endif
            </div>
        </form>

        {{-- Error flash --}}
        @if(session('error'))
        <div style="background: #fef2f2; color: #dc2626; padding: 0.9rem 2rem; font-size: 0.88rem; font-weight: 700; border-bottom: 1px solid #fecaca; display: flex; align-items: center; gap: 0.5rem;">
            <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('error') }}
        </div>
        @endif

        {{-- Table --}}
        <div style="overflow-x:auto;padding:0 1rem 1.5rem;">
            <table style="width:100%;border-collapse:separate;border-spacing:0 4px;margin-top:0.5rem;">
                <thead>
                    <tr style="background:linear-gradient(135deg,#f0f5fb,#e8f0f8);">
                        <th style="text-align:center;padding:0.75rem 0.75rem;font-size:0.65rem;font-weight:900;color:var(--brand-blue);text-transform:uppercase;letter-spacing:0.12em;width:4%;border-bottom:2px solid #dce6f0;">#</th>
                        <th style="text-align:left;padding:0.75rem 0.75rem;font-size:0.65rem;font-weight:900;color:var(--brand-blue);text-transform:uppercase;letter-spacing:0.12em;width:12%;border-bottom:2px solid #dce6f0;">Code</th>
                        <th style="text-align:left;padding:0.75rem 0.75rem;font-size:0.65rem;font-weight:900;color:var(--brand-blue);text-transform:uppercase;letter-spacing:0.12em;width:28%;border-bottom:2px solid #dce6f0;">Project Title</th>
                        <th style="text-align:left;padding:0.75rem 0.75rem;font-size:0.65rem;font-weight:900;color:var(--brand-blue);text-transform:uppercase;letter-spacing:0.12em;width:18%;border-bottom:2px solid #dce6f0;">Lead PI</th>
                        <th style="text-align:left;padding:0.75rem 0.75rem;font-size:0.65rem;font-weight:900;color:var(--brand-blue);text-transform:uppercase;letter-spacing:0.12em;width:14%;border-bottom:2px solid #dce6f0;">Directorate</th>
                        <th style="text-align:center;padding:0.75rem 0.75rem;font-size:0.65rem;font-weight:900;color:var(--brand-blue);text-transform:uppercase;letter-spacing:0.12em;width:10%;border-bottom:2px solid #dce6f0;">Rating</th>
                        <th style="text-align:left;padding:0.75rem 0.75rem;font-size:0.65rem;font-weight:900;color:var(--brand-blue);text-transform:uppercase;letter-spacing:0.12em;width:10%;border-bottom:2px solid #dce6f0;">Status</th>
                        <th style="text-align:right;padding:0.75rem 0.75rem;font-size:0.65rem;font-weight:900;color:var(--brand-blue);text-transform:uppercase;letter-spacing:0.12em;width:4%;border-bottom:2px solid #dce6f0;"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $proj)
                    @php
                        $rowAccent = match($proj->status) {
                            'ONGOING'    => '#16a34a',
                            'REGISTERED' => '#2563eb',
                            'EVALUATED'  => '#7c3aed',
                            'COMPLETED'  => '#0f766e',
                            default      => '#94a3b8',
                        };
                        $statusColor = match($proj->status) {
                            'ONGOING'    => 'green',
                            'REGISTERED' => 'blue',
                            'EVALUATED'  => 'purple',
                            'COMPLETED'  => 'teal',
                            default      => 'gray',
                        };
                        $statusLabel = $proj->status === 'REGISTERED' ? 'NEW' : str_replace('_', ' ', $proj->status);
                        $rawName = $proj->pi?->full_name ?? 'Staff';
                        $initial = strtoupper(substr(preg_replace('/^(Dr\.|Mr\.|Ms\.|Mrs\.)\s+/i', '', $rawName), 0, 1));
                        $avatarColors = ['135deg,#3b82f6,#2563eb','135deg,#8b5cf6,#7c3aed','135deg,#06b6d4,#0891b2','135deg,#f59e0b,#d97706','135deg,#10b981,#059669'];
                    @endphp
                    <tr style="background:white;transition:all 0.18s ease;box-shadow:0 1px 2px rgba(0,59,92,0.04);" onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 6px 18px rgba(0,59,92,0.1)'" onmouseout="this.style.transform='';this.style.boxShadow='0 1px 2px rgba(0,59,92,0.04)'">

                        {{-- Status accent + row number --}}
                        <td style="text-align:center;padding:1rem 0.75rem 1rem 0;border-top:1px solid #f0f4f8;border-bottom:1px solid #f0f4f8;border-left:3px solid {{ $rowAccent }};border-radius:10px 0 0 10px;font-size:0.76rem;font-weight:700;color:var(--text-muted);">
                            {{ $projects->firstItem() + $loop->index }}
                        </td>

                        <td style="padding:1rem 0.75rem;border-top:1px solid #f0f4f8;border-bottom:1px solid #f0f4f8;">
                            <span style="font-size:0.73rem;font-weight:900;color:var(--blue-bright);background:#e8f4fd;border:1px solid #bfdbfe;padding:0.25rem 0.65rem;border-radius:6px;letter-spacing:0.02em;white-space:nowrap;">{{ $proj->project_code ?? 'NEW' }}</span>
                        </td>

                        <td style="padding:1rem 0.75rem;border-top:1px solid #f0f4f8;border-bottom:1px solid #f0f4f8;">
                            <a href="{{ route('projects.show', $proj->id) }}" style="text-decoration:none;display:block;" onmouseover="this.querySelector('.pt').style.color='var(--brand-green)'" onmouseout="this.querySelector('.pt').style.color='var(--text-primary)'">
                                <div class="pt" style="font-weight:800;color:var(--text-primary);font-size:0.9rem;line-height:1.35;transition:color 0.15s;">{{ $proj->research_title }}</div>
                            </a>
                            <div style="font-size:0.72rem;color:var(--text-muted);font-weight:600;margin-top:2px;">{{ $proj->start_year }} &ndash; {{ $proj->end_year ?? 'Ongoing' }}</div>
                        </td>

                        <td style="padding:1rem 0.75rem;border-top:1px solid #f0f4f8;border-bottom:1px solid #f0f4f8;">
                            <div style="display:flex;align-items:center;gap:0.6rem;">
                                <div style="width:34px;height:34px;background:linear-gradient({{ $avatarColors[$loop->index % 5] }});border-radius:10px;display:flex;align-items:center;justify-content:center;color:white;font-weight:950;font-size:0.85rem;flex-shrink:0;box-shadow:0 2px 6px rgba(0,0,0,0.15);">{{ $initial }}</div>
                                <div style="font-weight:700;color:var(--text-primary);font-size:0.87rem;line-height:1.3;">{{ $rawName }}</div>
                            </div>
                        </td>

                        <td style="padding:1rem 0.75rem;border-top:1px solid #f0f4f8;border-bottom:1px solid #f0f4f8;">
                            <div style="display:inline-flex;align-items:center;gap:0.45rem;padding:0.3rem 0.75rem;background:#f0f5fa;border:1px solid #dce6f0;border-radius:8px;">
                                <div style="width:6px;height:6px;background:var(--brand-blue);border-radius:50%;opacity:0.45;"></div>
                                <span style="font-size:0.77rem;font-weight:700;color:var(--text-secondary);">{{ $proj->directorate?->name ?? 'N/A' }}</span>
                            </div>
                        </td>

                        <td style="text-align:center;padding:1rem 0.75rem;border-top:1px solid #f0f4f8;border-bottom:1px solid #f0f4f8;">
                            @if($proj->evaluations_count > 0)
                                <div style="font-size:1.1rem;font-weight:950;color:var(--brand-green);line-height:1;letter-spacing:-0.02em;">{{ number_format($proj->evaluations_avg_total_score, 1) }}<span style="font-size:0.7rem;opacity:0.7;">%</span></div>
                                <div style="font-size:0.6rem;font-weight:800;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.04em;margin-top:2px;">{{ $proj->evaluations_count === 1 ? 'Single eval' : 'Consensus' }}</div>
                            @else
                                <span style="font-size:0.7rem;font-weight:800;color:#94a3b8;background:#f1f5f9;padding:0.2rem 0.5rem;border-radius:5px;border:1px solid #e2e8f0;text-transform:uppercase;letter-spacing:0.04em;">Pending</span>
                            @endif
                        </td>

                        <td style="padding:1rem 0.75rem;border-top:1px solid #f0f4f8;border-bottom:1px solid #f0f4f8;">
                            <span class="status-badge {{ $statusColor }}">{{ $statusLabel }}</span>
                        </td>

                        <td style="text-align:right;padding:1rem 0.75rem;border-top:1px solid #f0f4f8;border-bottom:1px solid #f0f4f8;border-right:1px solid #f0f4f8;border-radius:0 10px 10px 0;">
                            <div style="display: flex; justify-content: flex-end; gap: 0.35rem;">
                                @can('update', $proj)
                                <a href="{{ route('projects.edit', $proj->id) }}"
                                   style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; border-radius: 8px; color: var(--text-secondary); text-decoration: none; transition: all 0.15s;"
                                   onmouseover="this.style.background='#f0f5fa';this.style.color='var(--brand-blue)'" onmouseout="this.style.background='transparent';this.style.color='var(--text-secondary)'"
                                   title="Edit">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                @endcan

                                @can('delete', $proj)
                                <form action="{{ route('projects.destroy', $proj->id) }}" method="POST" onsubmit="return confirm('Archive this project?')" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; border-radius: 8px; color: var(--text-secondary); background: none; border: none; cursor: pointer; transition: all 0.15s;"
                                            onmouseover="this.style.background='#fee2e2';this.style.color='#dc2626'" onmouseout="this.style.background='transparent';this.style.color='var(--text-secondary)'"
                                            title="Archive">
                                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                                @endcan

                                @can('create', App\Models\Evaluation::class)
                                    @if($proj->status === 'REGISTERED')
                                    <a href="{{ auth()->user()->isAdmin()
                                            ? route('evaluation-assignments.create', ['project_id' => $proj->id])
                                            : route('evaluations.create', ['project_id' => $proj->id]) }}"
                                       style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; border-radius: 8px; color: var(--blue-bright); background: #e8f4fd; border: 1px solid #bfdbfe; text-decoration: none; transition: all 0.15s;"
                                       onmouseover="this.style.background='#dbeafe'" onmouseout="this.style.background='#e8f4fd'"
                                       title="{{ auth()->user()->isAdmin() ? 'Assign Evaluator' : 'Evaluate' }}">
                                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                    </a>
                                    @endif
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 5rem 2rem;">
                            <div style="background: var(--bg-surface); border-radius: 16px; padding: 3rem; border: 1px dashed #dce6f0; display: inline-block;">
                                <svg width="52" height="52" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin: 0 auto 1rem; color: var(--text-muted); opacity: 0.5; display: block;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/></svg>
                                <div style="font-size: 1rem; font-weight: 800; color: var(--text-secondary);">
                                    {{ request()->hasAny(['search','status','directorate_id','year']) ? 'No projects match your filters.' : 'No research initiatives yet.' }}
                                </div>
                                <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600; margin: 0.4rem 0 0;">
                                    {{ request()->hasAny(['search','status','directorate_id','year']) ? 'Try adjusting or clearing your filters.' : 'Register the first project to get started.' }}
                                </p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($projects->hasPages())
        <div style="padding: 1.25rem 2rem; border-top: 1px solid var(--glass-border); background: #fafcfe; display: flex; justify-content: center;">
            {{ $projects->links() }}
        </div>
        @endif
    </div>
</div>

<style>
@keyframes pulse { 0%,100%{opacity:1}50%{opacity:0.4} }
@keyframes heroGradient {
    0%   { background-position: 0%   50%; }
    50%  { background-position: 100% 50%; }
    100% { background-position: 0%   50%; }
}
</style>
@endsection
