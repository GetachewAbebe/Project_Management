@extends('layouts.app')

@section('title', '8th National Research Review | Registration Dashboard')
@section('header_title', 'Registration Analytics')

@section('content')
<div style="max-width: 1600px; margin: 0 auto; padding-bottom: 6rem; animation: fadeInUp 0.6s ease-out;">

    {{-- ══════════ HEADER ══════════ --}}
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 3rem;">
        <div>
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.75rem;">
                <div style="width: 10px; height: 10px; background: var(--brand-green); border-radius: 50%; box-shadow: 0 0 14px var(--brand-green); animation: pulse 2s infinite;"></div>
                <span style="font-size: 0.72rem; font-weight: 900; color: var(--brand-green); text-transform: uppercase; letter-spacing: 0.16em;">Live Registry Intelligence</span>
            </div>
            <h1 style="font-size: 2.75rem; font-weight: 950; color: var(--brand-blue); letter-spacing: -0.05em; margin: 0; line-height: 1;">
                Registration <span style="color: var(--brand-green);">Analytics</span>
            </h1>
            <p style="color: #64748b; font-weight: 600; font-size: 1rem; margin-top: 0.75rem;">
                8<sup>th</sup> National Research Review 2026 · March 11–13
            </p>
        </div>
        <div style="display: flex; gap: 1rem; align-items: center;">
            <a href="{{ route('event.results') }}" class="dash-btn secondary">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                Participant List
            </a>
            <button type="button" onclick="dashExport()" class="dash-btn primary" style="cursor: pointer; border: none; font-family: 'Outfit', sans-serif; background: #16a34a; box-shadow: 0 8px 20px rgba(22,163,74,0.2);">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Export
            </button>
            <button onclick="window.print()" class="dash-btn primary" style="cursor: pointer; border: none; font-family: 'Outfit', sans-serif;">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2-2v4h10z"/></svg>
                Print PDF Report
            </button>
        </div>
    </div>

    {{-- ══════════ FILTER BAR ══════════ --}}
    <form method="GET" action="{{ route('event.dashboard') }}" id="dashFilterForm"
          class="filter-bar no-print" style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: flex-end; background: white; padding: 1.25rem 1.5rem; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid #f1f5f9; margin-bottom: 2rem;"
          data-export-url="{{ route('event.results.export') }}">
        <div style="display: flex; flex-direction: column; gap: 0.35rem; flex: 1; min-width: 150px;">
            <label style="font-size: 0.72rem; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">Status</label>
            <select name="status" class="filter-input" onchange="this.form.submit()">
                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All Statuses</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            </select>
        </div>

        <div style="display: flex; flex-direction: column; gap: 0.35rem; flex: 1.5; min-width: 180px;">
            <label style="font-size: 0.72rem; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">Thematic Area</label>
            <select name="thematic_area" class="filter-input" onchange="this.form.submit()">
                <option value="all" {{ request('thematic_area') == 'all' ? 'selected' : '' }}>All Areas</option>
                <option value="Health Biotechnology" {{ request('thematic_area') == 'Health Biotechnology' ? 'selected' : '' }}>Health Biotechnology</option>
                <option value="Plant Biotechnology" {{ request('thematic_area') == 'Plant Biotechnology' ? 'selected' : '' }}>Plant Biotechnology</option>
                <option value="Animal Biotechnology" {{ request('thematic_area') == 'Animal Biotechnology' ? 'selected' : '' }}>Animal Biotechnology</option>
                <option value="Environmental Biotechnology" {{ request('thematic_area') == 'Environmental Biotechnology' ? 'selected' : '' }}>Environmental Biotechnology</option>
                <option value="Industrial Biotechnology" {{ request('thematic_area') == 'Industrial Biotechnology' ? 'selected' : '' }}>Industrial Biotechnology</option>
                <option value="Nanotechnology" {{ request('thematic_area') == 'Nanotechnology' ? 'selected' : '' }}>Nanotechnology</option>
                <option value="Materials Science & Engineering" {{ request('thematic_area') == 'Materials Science & Engineering' ? 'selected' : '' }}>Materials Science & Engineering</option>
                <option value="Reverse Engineering" {{ request('thematic_area') == 'Reverse Engineering' ? 'selected' : '' }}>Reverse Engineering</option>
                <option value="Computational Science and Intelligent Systems" {{ request('thematic_area') == 'Computational Science and Intelligent Systems' ? 'selected' : '' }}>Computational Science and Intelligent Systems</option>
                <option value="Bioinformatics and Genomics" {{ request('thematic_area') == 'Bioinformatics and Genomics' ? 'selected' : '' }}>Bioinformatics and Genomics</option>
            </select>
        </div>

        <div style="display: flex; flex-direction: column; gap: 0.35rem; flex: 1; min-width: 130px;">
            <label style="font-size: 0.72rem; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">Date From</label>
            <input type="date" name="date_from" value="{{ request('date_from') }}" class="filter-input" onchange="this.form.submit()">
        </div>
        
        <div style="display: flex; flex-direction: column; gap: 0.35rem; flex: 1; min-width: 130px;">
            <label style="font-size: 0.72rem; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">Date To</label>
            <input type="date" name="date_to" value="{{ request('date_to') }}" class="filter-input" onchange="this.form.submit()">
        </div>

        <div style="display: flex; gap: 0.5rem;">
            @if(request()->anyFilled(['status', 'thematic_area', 'date_from', 'date_to']) && (request('status') !== 'all' || request('thematic_area') !== 'all'))
            <a href="{{ route('event.dashboard') }}" style="display: inline-flex; align-items: center; justify-content: center; height: 42px; padding: 0 1rem; border-radius: 10px; font-weight: 800; font-size: 0.85rem; color: #ef4444; background: rgba(239, 68, 68, 0.1); text-decoration: none; transition: all 0.2s;">
                Clear
            </a>
            @endif
        </div>
    </form>

    <div class="kpi-grid" style="margin-bottom: 3rem;">

        {{-- Total --}}
        <div class="kpi-card" style="border-top: 3px solid var(--brand-blue);">
            <div class="kpi-icon" style="background: rgba(0,59,92,0.08); color: var(--brand-blue);">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div class="kpi-label">Total Registered</div>
            <div class="kpi-value" style="color: var(--brand-blue);">{{ number_format($total) }}</div>
            <div class="kpi-sub" style="display: flex; align-items: center; gap: 4px;">
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Updated {{ now()->format('H:i') }}
            </div>
        </div>

        {{-- Today --}}
        <div class="kpi-card" style="border-top: 3px solid var(--brand-green);">
            <div class="kpi-icon" style="background: rgba(0,139,75,0.08); color: var(--brand-green);">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div class="kpi-label">Today</div>
            <div class="kpi-value" style="color: var(--brand-green);">{{ number_format($today) }}</div>
            <div class="kpi-sub">{{ now()->format('M d, Y') }}</div>
        </div>

        {{-- This Week --}}
        <div class="kpi-card" style="border-top: 3px solid #6366f1;">
            <div class="kpi-icon" style="background: rgba(99,102,241,0.08); color: #6366f1;">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <div class="kpi-label">This Week</div>
            <div class="kpi-value" style="color: #6366f1;">{{ number_format($thisWeek) }}</div>
            <div class="kpi-sub">{{ now()->startOfWeek()->format('M d') }} – {{ now()->endOfWeek()->format('M d') }}</div>
        </div>

        {{-- Male / Female --}}
        <div class="kpi-card" style="border-top: 3px solid #2563eb;">
            <div class="kpi-icon" style="background: rgba(37,99,235,0.08); color: #2563eb;">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div class="kpi-label">Male</div>
            <div class="kpi-value" style="color: #2563eb;">{{ number_format($male) }}</div>
            <div class="kpi-sub">{{ $total > 0 ? round(($male / $total) * 100) : 0 }}% of total</div>
        </div>

        <div class="kpi-card" style="border-top: 3px solid #db2777;">
            <div class="kpi-icon" style="background: rgba(219,39,119,0.08); color: #db2777;">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div class="kpi-label">Female</div>
            <div class="kpi-value" style="color: #db2777;">{{ number_format($female) }}</div>
            <div class="kpi-sub">{{ $total > 0 ? round(($female / $total) * 100) : 0 }}% of total</div>
        </div>

        {{-- Confirmed --}}
        <div class="kpi-card" style="border-top: 3px solid #f59e0b;">
            <div class="kpi-icon" style="background: rgba(245,158,11,0.08); color: #f59e0b;">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="kpi-label">Confirmed</div>
            <div class="kpi-value" style="color: #f59e0b;">{{ number_format($confirmed) }}</div>
            <div class="kpi-sub">{{ number_format($pending) }} pending</div>
        </div>

    </div>

    {{-- ══════════ ROW 2: Daily Trend + Thematic Areas ══════════ --}}
    <div class="chart-row-2">

        {{-- Daily Trend Chart --}}
        <div class="dash-panel">
            <div class="panel-head">
                <div>
                    <div class="panel-title">Registrations Per Day</div>
                    <div class="panel-sub">Intake velocity over the last 30 days</div>
                </div>
                <div class="panel-badge green">Last 30 Days</div>
            </div>
            <div style="padding: 1.25rem 1.5rem 1.5rem;">
                <div id="trendChart" style="min-height: 280px;"></div>
            </div>
        </div>

        {{-- Thematic Areas Chart --}}
        <div class="dash-panel">
            <div class="panel-head">
                <div>
                    <div class="panel-title">Thematic Areas</div>
                    <div class="panel-sub">Registrations by research focus</div>
                </div>
            </div>
            <div style="padding: 1.25rem 1.5rem 1.5rem;">
                @if(count($byThematicArea) > 0)
                    <div id="thematicChart" style="min-height: 280px;"></div>
                @else
                    <div class="empty-chart">No thematic area data yet</div>
                @endif
            </div>
        </div>

    </div>

    {{-- ══════════ ROW 3: Research Status + Qualification + Discovery ══════════ --}}
    <div class="chart-row-3">

        {{-- Research Status Donut --}}
        <div class="dash-panel">
            <div class="panel-head">
                <div>
                    <div class="panel-title">Research Status</div>
                    <div class="panel-sub">New · Ongoing · Completed</div>
                </div>
            </div>
            <div style="padding: 1rem 1.5rem 1.5rem; display: flex; flex-direction: column; gap: 1.5rem;">
                <div id="statusDonut" style="min-height: 230px;"></div>

                {{-- Manual Legend / Mini Stats --}}
                @php
                    $statusColors = ['New Research' => '#6366f1', 'Ongoing Research' => '#f59e0b', 'Completed Research' => '#008B4B'];
                    $statusIcons  = ['New Research' => '🌱', 'Ongoing Research' => '🔬', 'Completed Research' => '✅'];
                @endphp
                @foreach($statusBuckets as $label => $count)
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 1rem; background: #f8fafc; border-radius: 12px; border-left: 3px solid {{ $statusColors[$label] ?? '#94a3b8' }};">
                    <span style="font-size: 0.85rem; font-weight: 800; color: #334155;">{{ $statusIcons[$label] ?? '' }} {{ $label }}</span>
                    <div style="text-align: right;">
                        <span style="font-size: 1.2rem; font-weight: 950; color: {{ $statusColors[$label] ?? '#64748b' }};">{{ $count }}</span>
                        @if($total > 0)
                        <span style="font-size: 0.7rem; font-weight: 800; color: #94a3b8; margin-left: 4px;">{{ round(($count / $total) * 100) }}%</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Qualification Breakdown --}}
        <div class="dash-panel">
            <div class="panel-head">
                <div>
                    <div class="panel-title">Academic Qualifications</div>
                    <div class="panel-sub">PhD · MSc · BSc distribution</div>
                </div>
            </div>
            <div style="padding: 1.25rem 1.5rem 1.5rem;">
                @if(count($byQualification) > 0)
                    <div id="qualChart" style="min-height: 230px;"></div>
                    <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-top: 1rem;">
                        @php
                            $qualColors = ['PhD' => 'var(--brand-blue)', 'MSc' => 'var(--brand-green)', 'BSc' => '#f59e0b'];
                        @endphp
                        @foreach($byQualification as $qual => $cnt)
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.6rem 1rem; background: #f8fafc; border-radius: 10px;">
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <div style="width: 10px; height: 10px; border-radius: 50%; background: {{ $qualColors[$qual] ?? '#94a3b8' }};"></div>
                                <span style="font-size: 0.85rem; font-weight: 800; color: #334155;">{{ $qual }}</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <span style="font-size: 1rem; font-weight: 950; color: {{ $qualColors[$qual] ?? '#64748b' }};">{{ $cnt }}</span>
                                <span style="font-size: 0.7rem; color: #94a3b8; font-weight: 700;">{{ $total > 0 ? round(($cnt / $total) * 100) : 0 }}%</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-chart">No qualification data yet</div>
                @endif
            </div>
        </div>

        {{-- Discovery Source --}}
        <div class="dash-panel">
            <div class="panel-head">
                <div>
                    <div class="panel-title">Discovery Source</div>
                    <div class="panel-sub">How participants found the event</div>
                </div>
            </div>
            <div style="padding: 1.25rem 1.5rem 1.5rem;">
                @if(count($byDiscoverySource) > 0)
                    <div id="discoveryChart" style="min-height: 230px;"></div>
                @else
                    <div class="empty-chart">No discovery data yet</div>
                @endif
            </div>
        </div>

    </div>

    {{-- ══════════ ROW 4: City Map + Recent Registrants ══════════ --}}
    <div class="chart-row-2">

        {{-- City Distribution --}}
        <div class="dash-panel">
            <div class="panel-head">
                <div>
                    <div class="panel-title">Geographic Distribution</div>
                    <div class="panel-sub">Top cities by registration count</div>
                </div>
                <div class="panel-badge blue">Top 8</div>
            </div>
            <div style="padding: 1.25rem 1.5rem 1.5rem; display: flex; flex-direction: column; gap: 0.85rem;">
                @forelse($byCity as $city => $cnt)
                    @php $pct = $total > 0 ? round(($cnt / $total) * 100) : 0; @endphp
                    <div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.3rem;">
                            <span style="font-size: 0.85rem; font-weight: 800; color: #334155;">{{ $city }}</span>
                            <span style="font-size: 0.85rem; font-weight: 950; color: var(--brand-blue);">{{ $cnt }} <span style="color: #94a3b8; font-weight: 700; font-size: 0.75rem;">({{ $pct }}%)</span></span>
                        </div>
                        <div style="height: 7px; background: #f1f5f9; border-radius: 99px; overflow: hidden;">
                            <div style="width: {{ $pct }}%; height: 100%; background: linear-gradient(90deg, var(--brand-blue), var(--brand-green)); border-radius: 99px; transition: width 1.6s cubic-bezier(0.16,1,0.3,1);"></div>
                        </div>
                    </div>
                @empty
                    <div class="empty-chart">No city data yet</div>
                @endforelse
            </div>
        </div>

        {{-- Recent Registrations Feed --}}
        <div class="dash-panel">
            <div class="panel-head">
                <div>
                    <div class="panel-title">Recent Registrations</div>
                    <div class="panel-sub">Latest entries in the registry</div>
                </div>
                <a href="{{ route('event.results') }}" style="font-size: 0.78rem; font-weight: 900; color: var(--brand-green); text-decoration: none; display: flex; align-items: center; gap: 0.4rem;">
                    View All
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div style="padding: 0.5rem 1.5rem 1.5rem;">
                @forelse($recentRegistrations as $reg)
                <div class="recent-row">
                    <div class="r-avatar">{{ strtoupper(substr($reg->full_name, 0, 1)) }}</div>
                    <div style="flex: 1; min-width: 0;">
                        <div style="font-weight: 900; color: #0f172a; font-size: 0.95rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $reg->full_name }}</div>
                        <div style="font-size: 0.78rem; font-weight: 600; color: #64748b; margin-top: 1px;">{{ $reg->organization }}</div>
                    </div>
                    <div style="text-align: right; flex-shrink: 0;">
                        <div style="font-size: 0.72rem; font-weight: 900; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em;">{{ $reg->created_at->diffForHumans() }}</div>
                        <div style="margin-top: 3px;">
                            <span class="r-badge {{ $reg->status }}">{{ ucfirst($reg->status) }}</span>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="empty-chart" style="margin-top: 2rem;">No registrations yet</div>
                @endforelse
            </div>
        </div>

    </div>

</div>

{{-- ══════════ SCRIPTS ══════════ --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const BLUE    = '#003B5C';
    const GREEN   = '#008B4B';
    const INDIGO  = '#6366f1';
    const AMBER   = '#f59e0b';
    const PINK    = '#db2777';
    const CYAN    = '#0891b2';
    const PALETTE = [BLUE, GREEN, INDIGO, AMBER, PINK, CYAN, '#84cc16', '#f97316', '#a855f7', '#14b8a6'];

    const defaults = {
        chart: { fontFamily: 'Outfit, sans-serif', toolbar: { show: false }, animations: { enabled: true, speed: 800 } },
        dataLabels: { enabled: false },
        stroke: { width: 0 },
        legend: { fontFamily: 'Outfit', fontWeight: 700, fontSize: '12px' },
        tooltip: { style: { fontFamily: 'Outfit', fontSize: '13px' } },
    };

    // 1. Daily Trend – area chart
    const trendData = @json($dailyTrend);
    const trendDays   = Object.keys(trendData).map(d => {
        const dt = new Date(d + 'T00:00:00');
        return dt.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
    });
    const trendValues = Object.values(trendData);

    new ApexCharts(document.querySelector('#trendChart'), {
        ...defaults,
        series: [{ name: 'Registrations', data: trendValues }],
        chart: { ...defaults.chart, type: 'area', height: 280 },
        colors: [GREEN],
        stroke: { curve: 'smooth', width: 3 },
        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.03, stops: [0, 90, 100] } },
        xaxis: {
            categories: trendDays,
            labels: { style: { fontFamily: 'Outfit', fontWeight: 700, fontSize: '11px', colors: '#94a3b8' }, rotate: -30, rotateAlways: true },
            axisBorder: { show: false }, axisTicks: { show: false },
            tickAmount: Math.min(trendDays.length, 15),
        },
        yaxis: {
            labels: { style: { fontFamily: 'Outfit', fontWeight: 700, colors: '#94a3b8' } },
            min: 0,
        },
        grid: { borderColor: '#f1f5f9', strokeDashArray: 4, yaxis: { lines: { show: true } }, xaxis: { lines: { show: false } } },
        markers: { size: 4, colors: [GREEN], strokeColors: '#fff', strokeWidth: 2, hover: { size: 6 } },
    }).render();

    @if(count($byThematicArea) > 0)
    // 2. Thematic Areas – horizontal bar
    const thematicData = @json($byThematicArea);
    new ApexCharts(document.querySelector('#thematicChart'), {
        ...defaults,
        series: [{ name: 'Registrations', data: Object.values(thematicData) }],
        chart: { ...defaults.chart, type: 'bar', height: 280 },
        colors: [BLUE],
        plotOptions: {
            bar: { horizontal: true, borderRadius: 6, barHeight: '55%',
                dataLabels: { position: 'top' }
            }
        },
        dataLabels: { enabled: true, offsetX: 18, style: { fontFamily: 'Outfit', fontWeight: 900, fontSize: '12px', colors: ['#334155'] } },
        xaxis: {
            categories: Object.keys(thematicData),
            labels: { style: { fontFamily: 'Outfit', fontWeight: 700, fontSize: '11px', colors: '#94a3b8' } },
            axisBorder: { show: false }, axisTicks: { show: false },
        },
        yaxis: { labels: { style: { fontFamily: 'Outfit', fontWeight: 800, fontSize: '12px', colors: '#334155' }, maxWidth: 200 } },
        grid: { borderColor: '#f1f5f9', xaxis: { lines: { show: true } }, yaxis: { lines: { show: false } } },
    }).render();
    @endif

    // 3. Research Status – donut
    const statusData = @json($statusBuckets);
    new ApexCharts(document.querySelector('#statusDonut'), {
        ...defaults,
        series: Object.values(statusData),
        labels: Object.keys(statusData),
        chart: { ...defaults.chart, type: 'donut', height: 230 },
        colors: [INDIGO, AMBER, GREEN],
        stroke: { width: 0 },
        plotOptions: {
            pie: {
                donut: {
                    size: '72%',
                    labels: {
                        show: true,
                        total: { show: true, label: 'Total', color: '#94a3b8', fontFamily: 'Outfit', fontWeight: 700, fontSize: '13px',
                            formatter: () => @json($total)
                        },
                        value: { fontFamily: 'Outfit', fontWeight: 950, fontSize: '20px', color: BLUE }
                    }
                }
            }
        },
        legend: { ...defaults.legend, position: 'bottom', horizontalAlign: 'center' },
    }).render();

    @if(count($byQualification) > 0)
    // 4. Qualification – simple column bar
    const qualData = @json($byQualification);
    new ApexCharts(document.querySelector('#qualChart'), {
        ...defaults,
        series: [{ name: 'Participants', data: Object.values(qualData) }],
        chart: { ...defaults.chart, type: 'bar', height: 230 },
        colors: [BLUE, GREEN, AMBER],
        plotOptions: { bar: { distributed: true, borderRadius: 8, columnWidth: '50%' } },
        xaxis: {
            categories: Object.keys(qualData),
            labels: { style: { fontFamily: 'Outfit', fontWeight: 900, fontSize: '13px', colors: '#334155' } },
            axisBorder: { show: false }, axisTicks: { show: false },
        },
        yaxis: { labels: { style: { fontFamily: 'Outfit', fontWeight: 700, colors: '#94a3b8' } } },
        grid: { borderColor: '#f1f5f9', strokeDashArray: 4 },
        legend: { show: false },
        dataLabels: { enabled: true, offsetY: -6, style: { fontFamily: 'Outfit', fontWeight: 900, fontSize: '14px', colors: ['#fff'] } },
    }).render();
    @endif

    @if(count($byDiscoverySource) > 0)
    // 5. Discovery Source – pie
    const discData = @json($byDiscoverySource);
    new ApexCharts(document.querySelector('#discoveryChart'), {
        ...defaults,
        series: Object.values(discData),
        labels: Object.keys(discData),
        chart: { ...defaults.chart, type: 'pie', height: 230 },
        colors: PALETTE,
        legend: { ...defaults.legend, position: 'bottom', horizontalAlign: 'center', fontSize: '11px' },
        plotOptions: { pie: { expandOnClick: true } },
    }).render();
    @endif

});

// ── Export: submit dashboard filters to the export route ──
function dashExport() {
    const form = document.getElementById('dashFilterForm');
    const original = form.action;
    form.action = form.dataset.exportUrl;
    form.submit();
    setTimeout(() => { form.action = original; }, 500);
}
</script>

{{-- ══════════ STYLES ══════════ --}}
<style>
    :root { --brand-blue: #003B5C; --brand-green: #008B4B; }

    @keyframes fadeInUp { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.35; } }

    /* Button helpers */
    .dash-btn { display: inline-flex; align-items: center; gap: 0.6rem; padding: 0.75rem 1.5rem; border-radius: 14px; font-weight: 900; font-size: 0.9rem; text-decoration: none; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); }
    .dash-btn.primary { background: var(--brand-green); color: white; box-shadow: 0 8px 20px rgba(0,139,75,0.2); }
    .dash-btn.primary:hover { transform: translateY(-3px); box-shadow: 0 12px 28px rgba(0,139,75,0.35); }
    .dash-btn.secondary { background: white; color: var(--brand-blue); border: 2px solid #e2e8f0; }
    .dash-btn.secondary:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.08); border-color: var(--brand-blue); }

    /* KPI Cards */
    .kpi-card { background: white; border-radius: 20px; padding: 1.5rem; border: 1px solid #f1f5f9; box-shadow: 0 4px 20px rgba(0,0,0,0.03); transition: all 0.35s cubic-bezier(0.16,1,0.3,1); }
    .kpi-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(0,0,0,0.07); }
    .kpi-icon { width: 48px; height: 48px; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; }
    .kpi-label { font-size: 0.72rem; font-weight: 900; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.35rem; }
    .kpi-value { font-size: 2.2rem; font-weight: 950; line-height: 1; letter-spacing: -0.03em; }
    .kpi-sub { font-size: 0.72rem; font-weight: 700; color: #94a3b8; margin-top: 0.4rem; }

    /* Dashboard panels */
    .dash-panel { background: white; border-radius: 24px; border: 1px solid #f1f5f9; box-shadow: 0 4px 20px rgba(0,0,0,0.02); overflow: hidden; }
    .panel-head { padding: 1.5rem 1.75rem; border-bottom: 1px solid #f8fafc; display: flex; justify-content: space-between; align-items: center; }
    .panel-title { font-size: 1.1rem; font-weight: 950; color: var(--brand-blue); letter-spacing: -0.02em; }
    .panel-sub { font-size: 0.78rem; font-weight: 700; color: #94a3b8; margin-top: 2px; }
    .panel-badge { display: inline-block; padding: 0.25rem 0.8rem; border-radius: 99px; font-size: 0.68rem; font-weight: 900; letter-spacing: 0.07em; text-transform: uppercase; }
    .panel-badge.green { background: rgba(0,139,75,0.1); color: var(--brand-green); }
    .panel-badge.blue  { background: rgba(0,59,92,0.08); color: var(--brand-blue); }

    /* Recent feed */
    .recent-row { display: flex; align-items: center; gap: 1rem; padding: 0.9rem 0; border-bottom: 1px solid #f8fafc; }
    .recent-row:last-child { border-bottom: none; }
    .r-avatar { width: 44px; height: 44px; border-radius: 14px; background: linear-gradient(135deg, var(--brand-blue), #005a8e); color: white; font-weight: 950; font-size: 1.1rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .r-badge { font-size: 0.62rem; font-weight: 900; padding: 0.15rem 0.5rem; border-radius: 5px; text-transform: uppercase; }
    .r-badge.pending { background: #fef3c7; color: #92400e; }
    .r-badge.confirmed { background: #dcfce7; color: #14532d; }

    /* Empty state */
    .empty-chart { text-align: center; padding: 3rem 1rem; color: #cbd5e1; font-weight: 800; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.1em; }

    /* Filter Inputs */
    .filter-input { width: 100%; height: 42px; border-radius: 10px; border: 1.5px solid #e2e8f0; padding: 0 1rem; font-family: 'Outfit', sans-serif; font-size: 0.9rem; font-weight: 700; color: #0f172a; background: #f8fafc; transition: all 0.2s cubic-bezier(0.16,1,0.3,1); box-sizing: border-box; outline: none; -webkit-appearance: none; -moz-appearance: none; appearance: none; }
    select.filter-input { background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='none' stroke='%2364748b' viewBox='0 0 24 24'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 0.75rem center; background-size: 14px; padding-right: 2.5rem; }
    .filter-input:focus, .filter-input:hover { border-color: var(--brand-blue); background: white; box-shadow: 0 0 0 3px rgba(0,59,92,0.08); }

    /* Responsive Grid Architecture */
    .kpi-grid { display: grid; grid-template-columns: repeat(6, 1fr); gap: 1.5rem; }
    .chart-row-2 { display: grid; grid-template-columns: 1.6fr 1fr; gap: 2rem; margin-bottom: 2rem; }
    .chart-row-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; margin-bottom: 2rem; }

    @media (max-width: 1400px) {
        .kpi-grid { grid-template-columns: repeat(3, 1fr); }
    }
    
    @media (max-width: 1024px) {
        .chart-row-2 { grid-template-columns: 1fr; }
        .chart-row-3 { grid-template-columns: 1fr; }
        
        .dash-panel { overflow-x: auto; }
        .kpi-grid { gap: 1rem; margin-bottom: 2rem !important; }
    }

    @media (max-width: 640px) {
        .kpi-grid { grid-template-columns: repeat(2, 1fr); }
        h1 { font-size: 2.2rem !important; }
        
        /* Stack header actions */
        .dash-btn { padding: 0.6rem 1.2rem; font-size: 0.8rem; }
        .chart-row-2, .chart-row-3 { gap: 1rem; }
    }
    
    @media print {
        @page { size: landscape; margin: 10mm; }
        body { background: white; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        .dash-btn { display: none !important; }
        .kpi-card { box-shadow: none !important; border-color: #e2e8f0 !important; break-inside: avoid; }
        .dash-panel { box-shadow: none !important; border-color: #e2e8f0 !important; break-inside: avoid; margin-bottom: 1rem !important; }
        .kpi-grid { gap: 0.75rem !important; }
        
        /* Strip background on wrapper */
        div[style*="max-width: 1600px"] { padding-bottom: 0 !important; }
    }
</style>
@endsection
