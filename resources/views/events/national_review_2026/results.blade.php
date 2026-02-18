@extends('layouts.app')

@section('title', '8th National Review | Production Registry')
@section('header_title', '8th National Review')

@section('content')
<div style="max-width: 1600px; margin: 0 auto; padding-bottom: 5rem; animation: fadeIn 0.8s ease-out;">
    <!-- Elite Header & Analytics -->
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 3rem;">
        <div>
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.5rem;">
                <div style="width: 12px; height: 12px; background: var(--brand-green); border-radius: 50%; box-shadow: 0 0 15px var(--brand-green); animation: pulse 2s infinite;"></div>
                <span style="font-size: 0.75rem; font-weight: 900; color: var(--brand-blue); text-transform: uppercase; letter-spacing: 0.15em;">Strategic Registry LIVE</span>
            </div>
            <h2 style="font-size: 3rem; font-weight: 950; color: var(--brand-blue); letter-spacing: -0.06em; margin: 0; line-height: 1;">
                8th National <span style="color: var(--brand-green);">Review</span>
            </h2>
            <p style="color: #64748b; font-weight: 600; font-size: 1.1rem; margin-top: 0.75rem;">March 11 - 13, 2026 | Official Participant Intelligence</p>
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <div class="glass-stat">
                <div class="stat-label">Total Valid Registry</div>
                <div class="stat-value">{{ $registrations->count() }}</div>
            </div>
            <button onclick="window.print()" class="btn-print">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2-2v4h10z"/></svg>
                Generate Dossiers
            </button>
        </div>
    </div>

    <!-- Live Power Search -->
    <div style="margin-bottom: 3rem; background: white; padding: 2rem; border-radius: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.02);">
        <div style="display: flex; gap: 2rem; align-items: center;">
            <div style="flex: 1; position: relative;">
                <input type="text" id="attendeeSearch" placeholder="Search Registrants by Identity, Organization, or Email..." 
                       style="width: 100%; padding: 1.25rem 1.5rem 1.25rem 3.5rem; border-radius: 20px; border: 2px solid #f1f5f9; background: #f8fafc; font-family: 'Outfit'; font-weight: 600; transition: all 0.3s ease;">
                <svg style="position: absolute; left: 1.25rem; top: 1.15rem; color: #94a3b8;" width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <select id="qualificationFilter" style="padding: 1.25rem 1.5rem; border-radius: 20px; border: 2px solid #f1f5f9; background: #f8fafc; font-family: 'Outfit'; font-weight: 750; color: #475569; width: 250px;">
                <option value="all">All Qualifications</option>
                <option value="PhD">Doctor of Philosophy (PhD)</option>
                <option value="MSc">Master of Science (MSc)</option>
                <option value="BSc">Bachelor of Science (BSc)</option>
            </select>
        </div>
    </div>

    <!-- Results Table: Industrial Grade -->
    <div class="glass-card">
        <div style="overflow-x: auto;">
            <table class="elite-table" id="attendeesTable">
                <thead>
                    <tr>
                        <th>Participant Profile</th>
                        <th>Institution & Qualification</th>
                        <th style="width: 400px;">Scientific Contribution</th>
                        <th>Evidence / Documentation</th>
                        <th style="text-align: right;">Registry Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registrations as $reg)
                        <tr class="attendee-row" data-qualification="{{ $reg->qualification }}">
                            <!-- Identity -->
                            <td>
                                <div style="display: flex; align-items: center; gap: 1.25rem;">
                                    <div class="avatar-box">{{ substr($reg->full_name, 0, 1) }}</div>
                                    <div>
                                        <div class="searchable-name" style="font-weight: 900; color: #0f172a; font-size: 1.1rem; letter-spacing: -0.01em;">{{ $reg->full_name }}</div>
                                        <div class="searchable-email" style="font-size: 0.85rem; color: #64748b; font-weight: 600;">{{ $reg->email }}</div>
                                        <div style="margin-top: 4px; display: flex; gap: 0.5rem; align-items: center;">
                                            <span style="font-size: 0.65rem; font-weight: 900; background: #f1f5f9; color: var(--brand-blue); padding: 0.15rem 0.5rem; border-radius: 4px;">{{ $reg->reference_code }}</span>
                                            <span style="font-size: 0.65rem; font-weight: 900; color: {{ $reg->gender == 'Male' ? '#2563eb' : '#db2777' }};">{{ $reg->gender }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Academic -->
                            <td>
                                <div class="searchable-org" style="font-weight: 800; color: #1e293b; font-size: 0.95rem;">{{ $reg->organization }}</div>
                                <div style="display: flex; align-items: center; gap: 0.5rem; margin-top: 0.5rem;">
                                    <div style="width: 8px; height: 8px; background: var(--brand-green); border-radius: 50%;"></div>
                                    <span style="font-size: 0.8rem; font-weight: 750; color: #64748b;">{{ $reg->qualification }} &bull; {{ $reg->specialization }}</span>
                                </div>
                            </td>

                            <!-- Presentation -->
                            <td>
                                <div style="font-weight: 900; color: #0f172a; font-size: 0.95rem; line-height: 1.4; margin-bottom: 0.5rem;">{{ $reg->presentation_title }}</div>
                                <div style="font-size: 0.8rem; color: #64748b; line-height: 1.5; font-weight: 500;">
                                    {{ Str::limit($reg->abstract_text, 150) }}
                                </div>
                            </td>

                            <!-- Documents -->
                            <td>
                                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                                    @if($reg->abstract_file_path)
                                        <a href="{{ asset('storage/' . $reg->abstract_file_path) }}" target="_blank" class="cyber-link blue">
                                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2.5"/></svg>
                                            Research File
                                        </a>
                                    @endif
                                    @if($reg->support_letter_path)
                                        <a href="{{ asset('storage/' . $reg->support_letter_path) }}" target="_blank" class="cyber-link green">
                                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2.5"/></svg>
                                            Support Letter
                                        </a>
                                    @endif
                                </div>
                            </td>

                            <!-- Date -->
                            <td style="text-align: right;">
                                <div style="font-size: 0.9rem; font-weight: 900; color: #0f172a;">{{ $reg->created_at->format('M d, Y') }}</div>
                                <div style="font-size: 0.7rem; font-weight: 800; color: #94a3b8; text-transform: uppercase;">{{ $reg->created_at->format('h:i A') }}</div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 10rem 0;">
                                <div style="color: #cbd5e1; font-weight: 900; text-transform: uppercase; letter-spacing: 0.2em; font-size: 1.2rem;">Registry Initialized & Waiting</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    :root {
        --brand-blue: #003B5C;
        --brand-green: #008B4B;
    }

    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

    .glass-stat {
        background: white;
        padding: 1rem 2rem;
        border-radius: 20px;
        border: 1px solid rgba(0,0,0,0.05);
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
        text-align: right;
    }

    .stat-label { font-size: 0.7rem; font-weight: 950; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; }
    .stat-value { font-size: 2rem; font-weight: 950; color: var(--brand-blue); line-height: 1; margin-top: 0.25rem; }

    .btn-print {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        background: var(--brand-blue);
        color: white;
        padding: 0 2rem;
        border-radius: 20px;
        font-weight: 900;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .btn-print:hover { transform: translateY(-4px); box-shadow: 0 15px 40px rgba(0, 59, 92, 0.3); }

    .glass-card {
        background: white;
        border-radius: 40px;
        box-shadow: 0 40px 100px -20px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,0,0,0.03);
        padding: 1.5rem;
    }

    .elite-table { width: 100%; border-collapse: collapse; }
    .elite-table th { 
        padding: 2rem 1.5rem;
        text-align: left;
        font-size: 0.75rem;
        font-weight: 950;
        text-transform: uppercase;
        color: #94a3b8;
        letter-spacing: 0.15em;
        border-bottom: 2px solid #f8fafc;
    }

    .elite-table td { padding: 2rem 1.5rem; border-bottom: 1px solid #f1f5f9; vertical-align: top; }
    .attendee-row { transition: all 0.3s ease; }
    .attendee-row:hover { background: #fafafa; }
    .attendee-row:hover td { border-color: transparent; }

    .avatar-box {
        width: 55px;
        height: 55px;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 950;
        color: var(--brand-blue);
        font-size: 1.3rem;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 20px rgba(0,0,0,0.02);
    }

    .cyber-link {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.6rem 1.25rem;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 900;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1.5px solid transparent;
    }

    .cyber-link.blue { background: rgba(0, 59, 92, 0.05); color: var(--brand-blue); }
    .cyber-link.green { background: rgba(0, 139, 75, 0.05); color: var(--brand-green); }
    
    .cyber-link:hover { 
        background: white; 
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        border-color: currentColor;
    }

    @media print {
        .sidebar, .institutional-header, .topbar, #attendeeSearch, #qualificationFilter, .stat-label, .STAT-VALUE, .stat-value, .glass-stat, .btn-print { display: none !important; }
        .main-content { margin: 0 !important; padding: 0 !important; }
        .glass-card { background: white !important; box-shadow: none !important; border: 1px solid #efefef !important; border-radius: 0 !important; padding: 0 !important; }
        .elite-table td { padding: 1rem !important; }
        .avatar-box { background: white !important; border: 1px solid #ddd !important; }
        h2 { color: black !important; font-size: 2rem !important; }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('attendeeSearch');
        const qualFilter = document.getElementById('qualificationFilter');
        const rows = document.querySelectorAll('.attendee-row');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const qualTerm = qualFilter.value;

            rows.forEach(row => {
                const name = row.querySelector('.searchable-name').textContent.toLowerCase();
                const email = row.querySelector('.searchable-email').textContent.toLowerCase();
                const org = row.querySelector('.searchable-org').textContent.toLowerCase();
                const qual = row.dataset.qualification;

                const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm) || org.includes(searchTerm);
                const matchesQual = qualTerm === 'all' || qual === qualTerm;

                row.style.display = (matchesSearch && matchesQual) ? '' : 'none';
                
                if (matchesSearch && matchesQual) {
                    row.style.animation = 'fadeIn 0.4s ease-out';
                }
            });
        }

        searchInput.addEventListener('input', filterTable);
        qualFilter.addEventListener('change', filterTable);
    });
</script>
@endsection
