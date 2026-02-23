@extends('layouts.app')

@section('title', '8th National Research Review | Production Registry')
@section('header_title', '8th National Research Review')

@section('content')
<div style="max-width: 1600px; margin: 0 auto; padding-bottom: 5rem; animation: fadeIn 0.8s ease-out;">

    {{-- Elite Header & Analytics --}}
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 3rem;">
        <div>
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.5rem;">
                <div style="width: 12px; height: 12px; background: var(--brand-green); border-radius: 50%; box-shadow: 0 0 15px var(--brand-green); animation: pulse 2s infinite;"></div>
                <span style="font-size: 0.75rem; font-weight: 900; color: var(--brand-blue); text-transform: uppercase; letter-spacing: 0.15em;">Strategic Registry LIVE</span>
            </div>
            <h2 style="font-size: 3rem; font-weight: 950; color: var(--brand-blue); letter-spacing: -0.06em; margin: 0; line-height: 1;">
                8<sup>th</sup> Annual <span style="color: var(--brand-green);">Research Review</span>
            </h2>
            <p style="color: #64748b; font-weight: 600; font-size: 1.1rem; margin-top: 0.75rem;">March 11 - 13, 2026 | Official Participant Intelligence for National Research Review</p>
        </div>

        <div style="display: flex; gap: 1rem; align-items: center;">
            <a href="{{ route('event.dashboard') }}" style="display:flex; align-items:center; gap:0.6rem; padding:0.75rem 1.5rem; background:var(--brand-green); color:white; border-radius:16px; font-weight:900; font-size:0.9rem; text-decoration:none; box-shadow:0 8px 20px rgba(0,139,75,0.2); transition:all 0.3s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 12px 28px rgba(0,139,75,0.35)'" onmouseout="this.style.transform='';this.style.boxShadow='0 8px 20px rgba(0,139,75,0.2)'">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                Analytics Dashboard
            </a>
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

    {{-- Live Power Search --}}
    <div style="margin-bottom: 3rem; background: white; padding: 2rem; border-radius: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.02);">
        <div style="display: flex; gap: 2rem; align-items: center;">
            <div style="flex: 1; position: relative;">
                <input type="text" id="attendeeSearch" placeholder="Search registrants by name, organization, email, or thematic area..."
                       style="width: 100%; padding: 1.25rem 1.5rem 1.25rem 3.5rem; border-radius: 20px; border: 2px solid #f1f5f9; background: #f8fafc; font-family: 'Outfit'; font-weight: 600; transition: all 0.3s ease;">
                <svg style="position: absolute; left: 1.25rem; top: 1.15rem; color: #94a3b8;" width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <select id="qualificationFilter" style="padding: 1.25rem 1.5rem; border-radius: 20px; border: 2px solid #f1f5f9; background: #f8fafc; font-family: 'Outfit'; font-weight: 750; color: #475569; width: 250px;">
                <option value="all">All Qualifications</option>
                <option value="PhD">Doctor of Philosophy (PhD)</option>
                <option value="MSc">Master of Science (MSc)</option>
                <option value="BSc">Bachelor of Science (BSc)</option>
            </select>
            <select id="statusFilter" style="padding: 1.25rem 1.5rem; border-radius: 20px; border: 2px solid #f1f5f9; background: #f8fafc; font-family: 'Outfit'; font-weight: 750; color: #475569; width: 200px;">
                <option value="all">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
            </select>
        </div>
    </div>

    {{-- Results Table --}}
    <div class="glass-card">
        <div style="overflow-x: auto;">
            <table class="elite-table" id="attendeesTable">
                <thead>
                    <tr>
                        <th style="width: 32px;"></th>{{-- Expand toggle --}}
                        <th>Registrant Identity</th>
                        <th>Institutional Affiliation & Academic Standing</th>
                        <th style="width: 380px;">Research Contribution</th>
                        <th>Submitted Documentation</th>
                        <th style="text-align: right;">Date of Registration</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registrations as $reg)
                        {{-- ── Main Summary Row ── --}}
                        <tr class="attendee-row" data-qualification="{{ $reg->qualification }}" data-status="{{ $reg->status }}" onclick="toggleDetails({{ $reg->id }})" style="cursor: pointer;">

                            {{-- Expand Icon --}}
                            <td style="padding: 2rem 0.5rem 2rem 1.5rem;">
                                <div class="expand-icon" id="icon-{{ $reg->id }}">
                                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </td>

                            {{-- Identity --}}
                            <td>
                                <div style="display: flex; align-items: center; gap: 1.25rem;">
                                    <div class="avatar-box">{{ substr($reg->full_name, 0, 1) }}</div>
                                    <div>
                                        <div class="searchable-name" style="font-weight: 900; color: #0f172a; font-size: 1.1rem; letter-spacing: -0.01em;">{{ $reg->full_name }}</div>
                                        <div class="searchable-email" style="font-size: 0.85rem; color: #64748b; font-weight: 600;">{{ $reg->email }}</div>
                                        <div style="margin-top: 4px; display: flex; gap: 0.5rem; align-items: center; flex-wrap: wrap;">
                                            <span style="font-size: 0.65rem; font-weight: 900; background: #f1f5f9; color: var(--brand-blue); padding: 0.15rem 0.5rem; border-radius: 4px;">{{ $reg->reference_code }}</span>
                                            <span style="font-size: 0.65rem; font-weight: 900; color: {{ $reg->gender == 'Male' ? '#2563eb' : '#db2777' }};">{{ $reg->gender }}</span>
                                            <span class="status-badge {{ $reg->status }}">{{ ucfirst($reg->status) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- Affiliation --}}
                            <td>
                                <div class="searchable-org" style="font-weight: 800; color: #1e293b; font-size: 0.95rem;">{{ $reg->organization }}</div>
                                <div style="font-size: 0.82rem; color: #64748b; font-weight: 600; margin-top: 0.25rem;">{{ $reg->job_title }} · {{ $reg->department }}</div>
                                <div style="display: flex; align-items: center; gap: 0.5rem; margin-top: 0.5rem;">
                                    <div style="width: 8px; height: 8px; background: var(--brand-green); border-radius: 50%;"></div>
                                    <span style="font-size: 0.8rem; font-weight: 750; color: #64748b;">{{ $reg->qualification }} · {{ $reg->expertise ?? $reg->specialization ?? '—' }}</span>
                                </div>
                            </td>

                            {{-- Research --}}
                            <td>
                                <div style="font-weight: 900; color: #0f172a; font-size: 0.95rem; line-height: 1.4; margin-bottom: 0.5rem;">{{ $reg->presentation_title }}</div>
                                <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 0.5rem;">
                                    <span class="tag-chip blue">{{ $reg->thematic_area }}</span>
                                    <span class="tag-chip grey">{{ $reg->project_status }}</span>
                                </div>
                                <div class="searchable-thematic" style="display:none;">{{ $reg->thematic_area }}</div>
                                <div style="font-size: 0.8rem; color: #64748b; line-height: 1.5; font-weight: 500;">
                                    {{ Str::limit($reg->abstract_text, 120) }}
                                </div>
                            </td>

                            {{-- Documentation --}}
                            <td>
                                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                                    @if($reg->abstract_file_path)
                                        <a href="{{ asset('storage/' . $reg->abstract_file_path) }}" target="_blank" class="cyber-link blue" onclick="event.stopPropagation()">
                                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2.5"/></svg>
                                            Abstract File
                                        </a>
                                    @endif
                                    @if($reg->support_letter_path)
                                        <a href="{{ asset('storage/' . $reg->support_letter_path) }}" target="_blank" class="cyber-link green" onclick="event.stopPropagation()">
                                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2.5"/></svg>
                                            Support Letter
                                        </a>
                                    @endif
                                    @if($reg->presentation_ppt_path)
                                        <a href="{{ asset('storage/' . $reg->presentation_ppt_path) }}" target="_blank" class="cyber-link orange" onclick="event.stopPropagation()">
                                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2.5"/></svg>
                                            PPT Slides
                                        </a>
                                    @endif
                                    @if(!$reg->abstract_file_path && !$reg->support_letter_path && !$reg->presentation_ppt_path)
                                        <span style="font-size: 0.78rem; color: #cbd5e1; font-weight: 700;">No files uploaded</span>
                                    @endif
                                </div>
                            </td>

                            {{-- Date --}}
                            <td style="text-align: right;">
                                <div style="font-size: 0.9rem; font-weight: 900; color: #0f172a;">{{ $reg->created_at->format('M d, Y') }}</div>
                                <div style="font-size: 0.7rem; font-weight: 800; color: #94a3b8; text-transform: uppercase;">{{ $reg->created_at->format('h:i A') }}</div>
                            </td>
                        </tr>

                        {{-- ── Expandable Detail Panel ── --}}
                        <tr class="detail-row" id="details-{{ $reg->id }}" style="display: none;">
                            <td colspan="6" style="padding: 0; border-bottom: 2px solid #f1f5f9;">
                                <div class="detail-panel">

                                    {{-- Panel Header --}}
                                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
                                        <div style="display: flex; align-items: center; gap: 1rem;">
                                            <div class="avatar-box" style="width: 48px; height: 48px; font-size: 1.1rem;">{{ substr($reg->full_name, 0, 1) }}</div>
                                            <div>
                                                <div style="font-weight: 900; font-size: 1.1rem; color: var(--brand-blue);">{{ $reg->full_name }}</div>
                                                <div style="font-size: 0.8rem; color: #64748b; font-weight: 600;">Full Participant Record — {{ $reg->reference_code }}</div>
                                            </div>
                                        </div>
                                        <a href="{{ url('/national-review-2026/registration/' . $reg->reference_code) }}" target="_blank"
                                           class="cyber-link blue" style="font-size: 0.75rem;" onclick="event.stopPropagation()">
                                            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                            Open Full Profile
                                        </a>
                                    </div>

                                    <div class="detail-grid">

                                        {{-- Personal Information --}}
                                        <div class="detail-section">
                                            <div class="section-label">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                                Personal Information
                                            </div>
                                            <div class="detail-items">
                                                <div class="detail-item"><span class="di-label">Full Name</span><span class="di-value">{{ $reg->full_name }}</span></div>
                                                <div class="detail-item"><span class="di-label">Gender</span><span class="di-value">{{ $reg->gender }}</span></div>
                                                <div class="detail-item"><span class="di-label">Email Address</span><span class="di-value">{{ $reg->email }}</span></div>
                                                <div class="detail-item"><span class="di-label">Phone Number</span><span class="di-value">{{ $reg->phone ?? '—' }}</span></div>
                                                <div class="detail-item"><span class="di-label">City</span><span class="di-value">{{ $reg->city ?? '—' }}</span></div>
                                                <div class="detail-item"><span class="di-label">Prior Attendance</span><span class="di-value">{{ $reg->previous_attendance ?? '—' }}</span></div>
                                            </div>
                                        </div>

                                        {{-- Professional & Academic --}}
                                        <div class="detail-section">
                                            <div class="section-label">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                                Professional & Academic
                                            </div>
                                            <div class="detail-items">
                                                <div class="detail-item"><span class="di-label">Organization</span><span class="di-value">{{ $reg->organization ?? '—' }}</span></div>
                                                <div class="detail-item"><span class="di-label">Job Title</span><span class="di-value">{{ $reg->job_title ?? '—' }}</span></div>
                                                <div class="detail-item"><span class="di-label">Department / Faculty</span><span class="di-value">{{ $reg->department ?? '—' }}</span></div>
                                                <div class="detail-item"><span class="di-label">Qualification</span><span class="di-value">{{ $reg->qualification ?? '—' }}</span></div>
                                                <div class="detail-item"><span class="di-label">Area of Expertise</span><span class="di-value">{{ $reg->expertise ?? $reg->specialization ?? '—' }}</span></div>
                                            </div>
                                        </div>

                                        {{-- Research Submission --}}
                                        <div class="detail-section">
                                            <div class="section-label">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                                Research Submission
                                            </div>
                                            <div class="detail-items">
                                                <div class="detail-item"><span class="di-label">Presentation Title</span><span class="di-value">{{ $reg->presentation_title ?? '—' }}</span></div>
                                                <div class="detail-item"><span class="di-label">Thematic Area</span><span class="di-value">{{ $reg->thematic_area ?? '—' }}</span></div>
                                                <div class="detail-item"><span class="di-label">Project Status</span><span class="di-value">{{ $reg->project_status ?? '—' }}</span></div>
                                                <div class="detail-item"><span class="di-label">Fully Available</span><span class="di-value">{{ $reg->available_on_date ?? '—' }}</span></div>
                                            </div>
                                            @if($reg->abstract_text)
                                            <div style="margin-top: 1rem; padding: 1rem; background: #f8fafc; border-radius: 12px; border-left: 3px solid var(--brand-green);">
                                                <div style="font-size: 0.65rem; font-weight: 900; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Abstract</div>
                                                <div style="font-size: 0.85rem; line-height: 1.7; color: #475569; font-weight: 500;">{{ $reg->abstract_text }}</div>
                                            </div>
                                            @endif

                                            {{-- Additional Projects --}}
                                            @if($reg->extra_projects && count($reg->extra_projects) > 0)
                                            <div style="margin-top: 1rem;">
                                                <div style="font-size: 0.65rem; font-weight: 900; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.75rem;">Additional Presentations ({{ count($reg->extra_projects) }})</div>
                                                @foreach($reg->extra_projects as $i => $proj)
                                                <div style="padding: 0.75rem 1rem; background: white; border-radius: 10px; border: 1px solid #e2e8f0; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 1rem;">
                                                    <span style="font-size: 0.65rem; font-weight: 900; background: rgba(0,59,92,0.07); color: var(--brand-blue); padding: 0.2rem 0.5rem; border-radius: 6px;">#0{{ $i + 1 }}</span>
                                                    <div>
                                                        <div style="font-weight: 800; font-size: 0.85rem; color: #1e293b;">{{ $proj['title'] }}</div>
                                                        <div style="font-size: 0.75rem; color: #64748b; font-weight: 600;">{{ $proj['status'] }}</div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>

                                        {{-- Logistics & Discovery --}}
                                        <div class="detail-section">
                                            <div class="section-label">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                                                Logistics & Discovery
                                            </div>
                                            <div class="detail-items">
                                                <div class="detail-item"><span class="di-label">Travel Option</span><span class="di-value">{{ $reg->travel_option ?? '—' }}</span></div>
                                                <div class="detail-item"><span class="di-label">Accommodation Required</span><span class="di-value">{{ $reg->needs_hotel ?? '—' }}</span></div>
                                                <div class="detail-item"><span class="di-label">Discovery Source</span><span class="di-value">{{ $reg->discovery_source ?? '—' }}</span></div>
                                                @if($reg->inviter_name)
                                                <div class="detail-item"><span class="di-label">Invited By</span><span class="di-value">{{ $reg->inviter_name }}</span></div>
                                                @endif
                                                @if($reg->questions)
                                                <div class="detail-item" style="flex-direction: column; align-items: flex-start; gap: 0.35rem;">
                                                    <span class="di-label">Additional Remarks</span>
                                                    <span class="di-value" style="font-style: italic; color: #64748b;">{{ $reg->questions }}</span>
                                                </div>
                                                @endif
                                            </div>

                                            {{-- Submitted Files --}}
                                            <div style="margin-top: 1.25rem; display: flex; flex-direction: column; gap: 0.6rem;">
                                                <div style="font-size: 0.65rem; font-weight: 900; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.25rem;">Submitted Files</div>
                                                @if($reg->abstract_file_path)
                                                    <a href="{{ asset('storage/' . $reg->abstract_file_path) }}" target="_blank" class="cyber-link blue" onclick="event.stopPropagation()">
                                                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2.5"/></svg>
                                                        Abstract Document
                                                    </a>
                                                @endif
                                                @if($reg->support_letter_path)
                                                    <a href="{{ asset('storage/' . $reg->support_letter_path) }}" target="_blank" class="cyber-link green" onclick="event.stopPropagation()">
                                                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2.5"/></svg>
                                                        Institutional Support Letter
                                                    </a>
                                                @endif
                                                @if($reg->presentation_ppt_path)
                                                    <a href="{{ asset('storage/' . $reg->presentation_ppt_path) }}" target="_blank" class="cyber-link orange" onclick="event.stopPropagation()">
                                                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2.5"/></svg>
                                                        Presentation Slides (PPT)
                                                    </a>
                                                @endif
                                                @if(!$reg->abstract_file_path && !$reg->support_letter_path && !$reg->presentation_ppt_path)
                                                    <span style="font-size: 0.8rem; color: #cbd5e1; font-weight: 700;">No files submitted</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>{{-- end detail-grid --}}
                                </div>{{-- end detail-panel --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 10rem 0;">
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
    @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.4; } }
    @keyframes expandIn { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }

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
        font-size: 0.72rem;
        font-weight: 950;
        text-transform: uppercase;
        color: #94a3b8;
        letter-spacing: 0.15em;
        border-bottom: 2px solid #f8fafc;
    }
    .elite-table td { padding: 1.75rem 1.5rem; border-bottom: 1px solid #f1f5f9; vertical-align: top; }

    .attendee-row { transition: all 0.3s ease; }
    .attendee-row:hover { background: #f8fafc; }
    .attendee-row.expanded { background: #f0f9ff; }
    .attendee-row.expanded td { border-color: transparent; }

    .expand-icon {
        width: 28px; height: 28px;
        background: #f1f5f9;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        color: #94a3b8;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }
    .attendee-row:hover .expand-icon { background: #e2e8f0; color: var(--brand-blue); }
    .attendee-row.expanded .expand-icon { background: var(--brand-blue); color: white; transform: rotate(180deg); }

    /* Detail Panel */
    .detail-panel {
        padding: 2.5rem 5rem 2.5rem 4.5rem;
        background: linear-gradient(135deg, #f8fafc 0%, #f0f9ff 100%);
        border-top: 1px solid #e2e8f0;
        animation: expandIn 0.35s ease forwards;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }

    .detail-section {
        background: white;
        border-radius: 20px;
        padding: 1.75rem;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    }

    .section-label {
        display: flex; align-items: center; gap: 0.6rem;
        font-size: 0.68rem; font-weight: 900;
        text-transform: uppercase; letter-spacing: 0.15em;
        color: var(--brand-blue);
        margin-bottom: 1.25rem;
        padding-bottom: 0.75rem;
        border-bottom: 1.5px solid #f1f5f9;
    }

    .detail-items { display: flex; flex-direction: column; gap: 0.75rem; }

    .detail-item {
        display: flex; align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
    }

    .di-label {
        font-size: 0.75rem; font-weight: 700;
        color: #94a3b8; text-transform: uppercase;
        letter-spacing: 0.08em; white-space: nowrap;
        flex-shrink: 0;
    }

    .di-value {
        font-size: 0.88rem; font-weight: 700;
        color: #1e293b; text-align: right;
    }

    /* Avatars / Chips */
    .avatar-box {
        width: 55px; height: 55px;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 18px;
        display: flex; align-items: center; justify-content: center;
        font-weight: 950; color: var(--brand-blue);
        font-size: 1.3rem;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 20px rgba(0,0,0,0.02);
        flex-shrink: 0;
    }

    .status-badge {
        font-size: 0.62rem; font-weight: 900;
        padding: 0.15rem 0.5rem; border-radius: 4px;
        text-transform: uppercase; letter-spacing: 0.05em;
    }
    .status-badge.pending { background: #fef3c7; color: #92400e; }
    .status-badge.confirmed { background: #dcfce7; color: #14532d; }

    .tag-chip {
        font-size: 0.65rem; font-weight: 900;
        padding: 0.25rem 0.6rem; border-radius: 6px;
        text-transform: uppercase; letter-spacing: 0.05em;
    }
    .tag-chip.blue { background: rgba(0,59,92,0.07); color: var(--brand-blue); }
    .tag-chip.grey { background: #f1f5f9; color: #64748b; }

    /* Links */
    .cyber-link {
        display: inline-flex; align-items: center; gap: 0.75rem;
        padding: 0.55rem 1.1rem; border-radius: 10px;
        font-size: 0.78rem; font-weight: 900;
        text-transform: uppercase; text-decoration: none;
        transition: all 0.3s ease;
        border: 1.5px solid transparent;
    }
    .cyber-link.blue   { background: rgba(0,59,92,0.05); color: var(--brand-blue); }
    .cyber-link.green  { background: rgba(0,139,75,0.05); color: var(--brand-green); }
    .cyber-link.orange { background: rgba(234,88,12,0.05); color: #ea580c; }
    .cyber-link:hover  { background: white; transform: scale(1.04); box-shadow: 0 10px 25px rgba(0,0,0,0.07); border-color: currentColor; }

    @media print {
        .sidebar, .institutional-header, .topbar, #attendeeSearch, #qualificationFilter, #statusFilter, .stat-label, .stat-value, .glass-stat, .btn-print { display: none !important; }
        .main-content { margin: 0 !important; padding: 0 !important; }
        .glass-card { background: white !important; box-shadow: none !important; border: 1px solid #efefef !important; border-radius: 0 !important; padding: 0 !important; }
        .elite-table td { padding: 1rem !important; }
        .avatar-box { background: white !important; border: 1px solid #ddd !important; }
        h2 { color: black !important; font-size: 2rem !important; }
        .detail-row { display: table-row !important; }
        .detail-panel { background: white !important; border: 1px solid #e2e8f0 !important; }
        .expand-icon { display: none !important; }
    }
</style>

<script>
    // ── Expand / Collapse Row ──
    function toggleDetails(id) {
        const detailRow = document.getElementById('details-' + id);
        const icon = document.getElementById('icon-' + id);
        const mainRow = icon.closest('tr');
        const isOpen = detailRow.style.display !== 'none';

        detailRow.style.display = isOpen ? 'none' : 'table-row';
        mainRow.classList.toggle('expanded', !isOpen);
    }

    // ── Filtering ──
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput     = document.getElementById('attendeeSearch');
        const qualFilter      = document.getElementById('qualificationFilter');
        const statusFilter    = document.getElementById('statusFilter');
        const rows            = document.querySelectorAll('.attendee-row');

        function filterTable() {
            const searchTerm  = searchInput.value.toLowerCase();
            const qualTerm    = qualFilter.value;
            const statusTerm  = statusFilter.value;

            rows.forEach(row => {
                const name     = row.querySelector('.searchable-name')?.textContent.toLowerCase()   || '';
                const email    = row.querySelector('.searchable-email')?.textContent.toLowerCase()  || '';
                const org      = row.querySelector('.searchable-org')?.textContent.toLowerCase()    || '';
                const thematic = row.querySelector('.searchable-thematic')?.textContent.toLowerCase() || '';
                const qual     = row.dataset.qualification;
                const status   = row.dataset.status;

                const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm) || org.includes(searchTerm) || thematic.includes(searchTerm);
                const matchesQual   = qualTerm   === 'all' || qual   === qualTerm;
                const matchesStatus = statusTerm === 'all' || status === statusTerm;

                const visible = matchesSearch && matchesQual && matchesStatus;
                row.style.display = visible ? '' : 'none';

                // Also hide detail row if parent is hidden
                const detailRow = document.getElementById('details-' + row.querySelector('.expand-icon')?.id?.replace('icon-',''));
                if (detailRow) detailRow.style.display = visible && row.classList.contains('expanded') ? 'table-row' : 'none';
            });
        }

        searchInput.addEventListener('input', filterTable);
        qualFilter.addEventListener('change', filterTable);
        statusFilter.addEventListener('change', filterTable);
    });
</script>
@endsection
