@extends('layouts.app')

@section('title', 'Database Backups')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-5">
        <div class="col-12">
            <div style="background: linear-gradient(135deg, var(--brand-blue) 0%, #002d4a 100%); padding: 3rem; border-radius: 24px; color: white; position: relative; overflow: hidden; box-shadow: 0 20px 40px rgba(0, 59, 92, 0.2);">
                <div style="position: relative; z-index: 1;">
                    <h2 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">System Backups</h2>
                    <p style="font-size: 1.1rem; color: rgba(255,255,255,0.7); font-weight: 500; max-width: 600px;">
                        Manage your database snapshots. Generate new backups or download existing ones for off-site storage.
                    </p>
                </div>
                <!-- Decorative Elements -->
                <div style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: rgba(255,255,255,0.03); border-radius: 50%; pointer-events: none;"></div>
                <div style="position: absolute; bottom: -20px; right: 100px; width: 150px; height: 150px; background: rgba(0,184,75,0.1); border-radius: 50%; pointer-events: none;"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div style="background: white; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; border: 1px solid #f1f5f9;">
                <div style="padding: 2rem; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                    <h3 style="font-weight: 800; font-size: 1.25rem; color: var(--brand-blue); margin: 0;">Backup Registry</h3>
                    <form action="{{ route('backups.create') }}" method="POST">
                        @csrf
                        <button type="submit" style="background: var(--brand-green); color: white; border: none; padding: 0.8rem 1.5rem; border-radius: 12px; font-weight: 800; display: flex; align-items: center; gap: 0.75rem; transition: all 0.3s ease; box-shadow: 0 8px 15px rgba(0, 139, 75, 0.25); cursor: pointer;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 20px rgba(0, 139, 75, 0.3)';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 8px 15px rgba(0, 139, 75, 0.25)';">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                            Generate New Backup
                        </button>
                    </form>
                </div>

                <div style="padding: 1.5rem;">
                    @if(count($backups) > 0)
                        <div style="overflow-x: auto;">
                            <table style="width: 100%; border-collapse: separate; border-spacing: 0 10px;">
                                <thead>
                                    <tr>
                                        <th style="padding: 1rem; text-align: left; font-size: 0.75rem; font-weight: 950; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em;">Filename</th>
                                        <th style="padding: 1rem; text-align: left; font-size: 0.75rem; font-weight: 950; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em;">Size</th>
                                        <th style="padding: 1rem; text-align: left; font-size: 0.75rem; font-weight: 950; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em;">Created At</th>
                                        <th style="padding: 1rem; text-align: right; font-size: 0.75rem; font-weight: 950; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($backups as $backup)
                                        <tr style="transition: all 0.2s ease;">
                                            <td style="padding: 1.25rem 1rem; background: #f8fafc; border-radius: 16px 0 0 16px; border-top: 2px solid transparent; border-bottom: 2px solid transparent;">
                                                <div style="display: flex; align-items: center; gap: 1rem;">
                                                    <div style="width: 40px; height: 40px; background: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: var(--brand-blue); border: 1px solid #e2e8f0; box-shadow: 0 4px 10px rgba(0, 59, 92, 0.05);">
                                                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                                                    </div>
                                                    <span style="font-weight: 800; color: var(--brand-blue); font-size: 0.95rem;">{{ $backup['name'] }}</span>
                                                </div>
                                            </td>
                                            <td style="padding: 1.25rem 1rem; background: #f8fafc; font-weight: 700; color: #64748b; font-size: 0.9rem;">
                                                {{ $backup['size'] }}
                                            </td>
                                            <td style="padding: 1.25rem 1rem; background: #f8fafc; font-weight: 700; color: #64748b; font-size: 0.9rem;">
                                                {{ $backup['created_at'] }}
                                            </td>
                                            <td style="padding: 1.25rem 1.5rem; background: #f8fafc; border-radius: 0 16px 16px 0; text-align: right;">
                                                <div style="display: flex; gap: 0.75rem; justify-content: flex-end;">
                                                    <a href="{{ route('backups.download', $backup['name']) }}" style="display: flex; align-items: center; justify-content: center; width: 42px; height: 42px; background: white; border: 2px solid #e2e8f0; color: var(--brand-blue); border-radius: 12px; transition: all 0.2s ease;" onmouseover="this.style.borderColor='var(--brand-blue)'; this.style.transform='translateY(-2px)';" onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='none';" title="Download">
                                                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                    </a>
                                                    
                                                    <form action="{{ route('backups.destroy', $backup['name']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this backup? This action cannot be undone.')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="display: flex; align-items: center; justify-content: center; width: 42px; height: 42px; background: white; border: 2px solid #fee2e2; color: #ef4444; border-radius: 12px; transition: all 0.2s ease; cursor: pointer;" onmouseover="this.style.background='#ef4444'; this.style.color='white'; this.style.borderColor='#ef4444'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='white'; this.style.color='#ef4444'; this.style.borderColor='#fee2e2'; this.style.transform='none';">
                                                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div style="padding: 5rem 2rem; text-align: center; background: #f8fafc; border-radius: 20px; border: 2px dashed #e2e8f0;">
                            <div style="width: 80px; height: 80px; background: white; border-radius: 24px; display: flex; align-items: center; justify-content: center; color: #94a3b8; margin: 0 auto 1.5rem; border: 1px solid #e2e8f0; box-shadow: 0 10px 20px rgba(0,0,0,0.03);">
                                <svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                            </div>
                            <h4 style="font-weight: 800; color: var(--brand-blue); margin-bottom: 0.5rem; font-size: 1.2rem;">No backups found</h4>
                            <p style="color: #64748b; font-weight: 600; font-size: 0.95rem;">Start by generating your first system snapshot.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    tr:hover td {
        background: #f1f5f9 !important;
        transform: scale(1.002);
    }
</style>
@endsection
