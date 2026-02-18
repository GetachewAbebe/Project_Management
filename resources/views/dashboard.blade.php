<x-app-layout>
    <div style="max-width: 1600px; margin: 0 auto; padding-bottom: 5rem;">
        
        <!-- Dashboard Header & Strategic Alerts -->
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2.5rem; margin-bottom: 3.5rem; align-items: start;">
            <div>
                <h2 style="font-size: 2.25rem; font-weight: 950; color: var(--brand-blue); letter-spacing: -0.05em; margin-bottom: 0.5rem;">
                    Systems <span style="color: var(--brand-green);">Intelligence</span>
                </h2>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <p style="color: #64748b; font-weight: 600; font-size: 1.1rem; margin: 0;">Institutional Overview & Research Metrics</p>
                    <div style="padding: 0.25rem 0.75rem; background: #f1f5f9; border-radius: 20px; font-size: 0.75rem; font-weight: 800; color: #64748b; border: 1px solid #e2e8f0;">
                         Live System Status: <span style="color: var(--brand-green);">Active</span>
                    </div>
                </div>
            </div>
            
            <!-- Strategic Clock -->
            <div style="background: white; padding: 1.25rem 2rem; border-radius: 20px; border: 1px solid #f1f5f9; box-shadow: 0 10px 30px rgba(0,0,0,0.03); display: flex; align-items: center; gap: 1.5rem; justify-content: flex-end;">
                <div style="text-align: right;">
                    <div id="commandDate" style="font-size: 0.75rem; font-weight: 900; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 2px;">{{ now()->format('D, M d, Y') }}</div>
                    <div id="commandTime" style="font-size: 1.5rem; font-weight: 950; color: var(--brand-blue); font-variant-numeric: tabular-nums;">{{ now()->format('H:i:s') }}</div>
                </div>
                <div style="width: 48px; height: 48px; background: rgba(0, 139, 75, 0.1); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: var(--brand-green);">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0114 0z"/></svg>
                </div>
            </div>
        </div>

        <!-- Strategic Alert & Status Banner -->
        @if($globalStats['awaiting_evaluation'] > 0)
        <div style="margin-bottom: 3rem; background: linear-gradient(135deg, #fff 0%, #fff7ed 100%); border-radius: 24px; padding: 1.5rem 2rem; border: 1px solid #fed7aa; box-shadow: 0 10px 40px rgba(245, 158, 11, 0.05); display: flex; align-items: center; gap: 2rem;">
            <div style="width: 60px; height: 60px; background: #fff7ed; border-radius: 18px; display: flex; align-items: center; justify-content: center; color: #f59e0b; flex-shrink: 0; box-shadow: 0 8px 20px rgba(245, 158, 11, 0.1);">
                <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
            <div style="flex: 1;">
                <h4 style="font-size: 1.1rem; font-weight: 950; color: #9a3412; margin: 0;">Priority Pipeline Alert</h4>
                <p style="font-size: 0.95rem; color: #c2410c; font-weight: 600; margin: 0.25rem 0 0 0;">There are <span style="font-weight: 900; background: #fef3c7; padding: 0.1rem 0.5rem; border-radius: 4px;">{{ $globalStats['awaiting_evaluation'] }} initiatives</span> currently in the registration registry awaiting formal scientific evaluation.</p>
            </div>
            <a href="{{ route('evaluations.index') }}" style="padding: 0.75rem 1.5rem; background: #9a3412; color: white; border-radius: 12px; font-weight: 900; font-size: 0.9rem; text-decoration: none; box-shadow: 0 10px 20px rgba(154, 52, 18, 0.2); transition: all 0.3s;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 12px 25px rgba(154, 52, 18, 0.3)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 10px 20px rgba(154, 52, 18, 0.2)'">
                Process Pipeline
            </a>
        </div>
        @endif

        <!-- Primary metrics Grid (Phase 1 Cards + Polish) -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
            <div class="stats-card glow-blue">
                <div class="stats-icon" style="background: rgba(0, 59, 92, 0.1); color: var(--brand-blue);">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <div>
                    <div class="stats-label">Research Portfolio</div>
                    <div class="stats-value">{{ $globalStats['projects'] }}</div>
                    <div class="stats-trend positive">+{{ $globalStats['awaiting_evaluation'] }} New</div>
                </div>
            </div>

            <div class="stats-card glow-green">
                <div class="stats-icon" style="background: rgba(0, 139, 75, 0.1); color: var(--brand-green);">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </div>
                <div>
                    <div class="stats-label">Personnel Core</div>
                    <div class="stats-value">{{ $globalStats['employees'] }}</div>
                    <div class="stats-trend">{{ $globalStats['directorates'] }} BU</div>
                </div>
            </div>

            <div class="stats-card glow-orange">
                <div class="stats-icon" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <div>
                    <div class="stats-label">Peer Reviews</div>
                    <div class="stats-value">{{ $globalStats['evaluations'] }}</div>
                    <div class="stats-trend warning">{{ $globalStats['awaiting_evaluation'] }} Pipeline</div>
                </div>
            </div>

            <div class="stats-card glow-indigo">
                <div class="stats-icon" style="background: rgba(99, 102, 241, 0.1); color: #6366f1;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div>
                    <div class="stats-label">Scientific Impact</div>
                    <div class="stats-value">
                        @if($globalStats['evaluations'] > 0)
                            {{ number_format(($globalStats['passed_evaluations'] / $globalStats['evaluations']) * 100, 0) }}%
                        @else
                            0%
                        @endif
                    </div>
                    <div class="stats-trend positive">Consensus</div>
                </div>
            </div>
        </div>

        <!-- Dashboard 2.0 Analytics Row -->
        <div style="display: grid; grid-template-columns: 3fr 2fr; gap: 2.5rem; margin-bottom: 3rem;">
            
            <!-- Directorate Performance -->
            <div class="dashboard-panel">
                <div class="panel-header">
                    <div>
                        <h3 class="panel-title">Directorate Resource Allocation</h3>
                        <p style="font-size: 0.8rem; color: #94a3b8; font-weight: 600; margin: 0;">Registry distribution across institutional units</p>
                    </div>
                </div>
                <div style="padding: 1.5rem;">
                    <div id="directorateChart" style="min-height: 350px;"></div>
                </div>
            </div>

            <!-- Strategic Status Mix -->
            <div class="dashboard-panel">
                <div class="panel-header">
                    <div>
                         <h3 class="panel-title">Strategic Project Mix</h3>
                         <p style="font-size: 0.8rem; color: #94a3b8; font-weight: 600; margin: 0;">Classification by lifecycle stage</p>
                    </div>
                </div>
                <div style="padding: 1.5rem; display: flex; align-items: center; justify-content: center;">
                    <div id="statusChart" style="min-height: 350px;"></div>
                </div>
            </div>
        </div>

        <!-- Dashboard 2.0 Registration Trend & Activity -->
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2.5rem;">
            
            <!-- Registration Trend -->
            <div class="dashboard-panel">
                <div class="panel-header" style="background: linear-gradient(to right, #f8fafc, white);">
                    <h3 class="panel-title">Initiative Registration Velocity</h3>
                </div>
                <div style="padding: 1.5rem;">
                    <div id="trendChart" style="min-height: 300px;"></div>
                </div>
            </div>

            <!-- Quick Command & Activity -->
            <div style="display: flex; flex-direction: column; gap: 2rem;">
                <!-- Shortcut Actions -->
                <div class="dashboard-panel" style="background: linear-gradient(135deg, var(--brand-blue), #002d4a);">
                    <div class="panel-header" style="border-bottom: 1px solid rgba(255,255,255,0.1); background: transparent;">
                        <h3 class="panel-title" style="color: white;">Command Shortcuts</h3>
                    </div>
                    <div style="padding: 1.5rem; display: flex; flex-direction: column; gap: 1rem;">
                        <a href="{{ route('projects.create') }}" class="command-link">
                            <div class="command-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg></div>
                            <span>Register New Initiative</span>
                        </a>
                        <a href="{{ route('employees.create') }}" class="command-link">
                            <div class="command-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>
                            <span>Institutional Enrollment</span>
                        </a>
                    </div>
                </div>

                <!-- Activity Feed -->
                <div class="dashboard-panel">
                    <div class="panel-header">
                        <h3 class="panel-title">Real-time Monitoring</h3>
                    </div>
                    <div class="activity-feed">
                        @php $recentProjects = \App\Models\Project::latest()->take(4)->get(); @endphp
                        @forelse($recentProjects as $project)
                            <div class="activity-item">
                                <div class="activity-dot"></div>
                                <div class="activity-content">
                                    <div class="activity-text">Entry: <strong>{{ $project->project_code ?? 'NEW' }}</strong></div>
                                    <div class="activity-time">{{ $project->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        @empty
                            <div style="text-align: center; color: #94a3b8; padding: 2rem;">No pending activity</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Engine -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Theme Colors
            const BRAND_BLUE = '#003B5C';
            const BRAND_GREEN = '#008B4B';
            const BRAND_INDIGO = '#6366f1';
            const BRAND_ORANGE = '#f59e0b';
            const BRAND_RED = '#ef4444';

            // 1. Directorate Bar Chart
            const dirData = @json($globalStats['projects_by_directorate']);
            new ApexCharts(document.querySelector("#directorateChart"), {
                series: [{ name: 'Initiatives', data: Object.values(dirData) }],
                chart: { type: 'bar', height: 350, toolbar: { show: false }, fontFamily: 'Outfit' },
                colors: [BRAND_BLUE],
                plotOptions: { bar: { borderRadius: 8, horizontal: true, barHeight: '50%' } },
                dataLabels: { enabled: false },
                xaxis: { categories: Object.keys(dirData) }
            }).render();

            // 2. Status Donut Chart
            const statusData = @json($globalStats['status_distribution']);
            new ApexCharts(document.querySelector("#statusChart"), {
                series: Object.values(statusData),
                labels: Object.keys(statusData).map(s => s.replace('_', ' ')),
                chart: { type: 'donut', height: 350, fontFamily: 'Outfit' },
                colors: [BRAND_BLUE, BRAND_GREEN, BRAND_INDIGO, BRAND_ORANGE, BRAND_RED],
                legend: { position: 'bottom' },
                stroke: { width: 0 },
                plotOptions: { pie: { donut: { size: '75%', labels: { show: true, total: { show: true, label: 'Portfolio' } } } } }
            }).render();

            // 3. Trend Line Chart
            const trendData = @json($globalStats['registration_trend']);
            new ApexCharts(document.querySelector("#trendChart"), {
                series: [{ name: 'Registrations', data: Object.values(trendData) }],
                chart: { type: 'area', height: 300, toolbar: { show: false }, fontFamily: 'Outfit' },
                colors: [BRAND_GREEN],
                stroke: { curve: 'smooth', width: 4 },
                fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.45, opacityTo: 0.05 } },
                xaxis: { categories: Object.keys(trendData) },
                dataLabels: { enabled: false }
            }).render();

            // Command Clock Update
            setInterval(() => {
                const now = new Date();
                document.getElementById('commandTime').textContent = now.toLocaleTimeString();
            }, 1000);
        });
    </script>

    <style>
        /* Card Glows */
        .stats-card {
            background: white; border-radius: 24px; padding: 1.75rem; display: flex; align-items: center; gap: 1.5rem;
            position: relative; overflow: hidden; border: 1px solid #f1f5f9; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .stats-card:hover { transform: translateY(-8px); box-shadow: 0 15px 45px rgba(0,0,0,0.06); }
        .glow-blue:hover { border-color: rgba(0, 59, 92, 0.3); }
        .glow-green:hover { border-color: rgba(0, 139, 75, 0.3); }
        
        .stats-icon { width: 64px; height: 64px; border-radius: 18px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .stats-label { font-size: 0.85rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 2px; }
        .stats-value { font-size: 2rem; font-weight: 950; color: var(--brand-blue); line-height: 1; }
        .stats-trend { font-size: 0.75rem; font-weight: 900; margin-top: 0.5rem; display: inline-block; padding: 2px 10px; border-radius: 8px; background: #f1f5f9; color: #64748b; }
        .stats-trend.positive { background: #dcfce7; color: #15803d; }
        .stats-trend.warning { background: #fef3c7; color: #b45309; }

        .dashboard-panel { background: white; border-radius: 28px; border: 1px solid #f1f5f9; box-shadow: 0 4px 20px rgba(0,0,0,0.02); overflow: hidden; }
        .panel-header { padding: 1.75rem 2rem; border-bottom: 1px solid #f8fafc; }
        .panel-title { font-size: 1.25rem; font-weight: 900; color: var(--brand-blue); margin: 0; letter-spacing: -0.02em; }

        .command-link {
            display: flex; align-items: center; gap: 1rem; padding: 1.15rem; background: rgba(255,255,255,0.05);
            border-radius: 16px; border: 1px solid rgba(255,255,255,0.1); color: white; text-decoration: none;
            font-weight: 700; font-size: 0.95rem; transition: all 0.3s;
        }
        .command-link:hover { background: rgba(255,255,255,0.15); transform: scale(1.02); }
        .command-icon { width: 40px; height: 40px; background: var(--brand-green); border-radius: 12px; display: flex; align-items: center; justify-content: center; }

        .activity-feed { padding: 1.5rem 2rem 2rem; }
        .activity-item { display: flex; gap: 1.25rem; padding: 1rem 0; position: relative; }
        .activity-dot { width: 10px; height: 10px; background: var(--brand-green); border-radius: 50%; margin-top: 0.4rem; z-index: 1; outline: 3px solid white; }
        .activity-item:not(:last-child)::after { content: ''; position: absolute; left: 4px; top: 1.5rem; bottom: -0.5rem; width: 2px; background: #f1f5f9; }
        .activity-text { font-size: 0.9rem; color: #334155; font-weight: 600; }
        .activity-time { font-size: 0.75rem; color: #94a3b8; font-weight: 900; text-transform: uppercase; margin-top: 2px; }
    </style>
</x-app-layout>
