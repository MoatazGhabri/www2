@extends('layouts.dashboard')
@section('pageTitle')
Tableau de bord - Aperçu
@endsection
@section('content')

<div class="dashboard-container">
    <!-- Header Section -->
    <div class="dashboard-header">
        <h1 class="dashboard-title">Tableau de bord</h1>
        <p class="dashboard-subtitle">Aperçu des statistiques principales</p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stats-section">
            <div class="section-header">
                <i class="fas fa-list section-icon"></i>
                <h2>Statistiques principales</h2>
            </div>
            <div class="stats-row">
                <!-- Admin Properties Card -->
                <div class="stat-card gradient-blue">
                    <div class="stat-content">
                        <h3>{{ $admin_property_count < 1000 ? $admin_property_count : number_format($admin_property_count / 1000, 1) . 'k' }}</h3>
                        <p>Annonces Admin</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
                <!-- Vedette (Premium) Card -->
                <div class="stat-card gradient-purple">
                    <div class="stat-content">
                        <h3>{{ $vedette_count < 1000 ? $vedette_count : number_format($vedette_count / 1000, 1) . 'k' }}</h3>
                        <p>Annonces Vedettes</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-crown"></i>
                    </div>
                </div>
                <!-- Latest Ads Card -->
                <div class="stat-card gradient-red">
                    <div class="stat-content">
                        <h3>{{ $latestCount < 1000 ? $latestCount : number_format($latestCount / 1000, 1) . 'k' }}</h3>
                        <p>Dernières annonces<br>cette semaine</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                </div>
                <!-- Service Web Card -->
                <div class="stat-card gradient-teal">
                    <div class="stat-content">
                        <h3>{{ $serviceWebCount < 1000 ? $serviceWebCount : number_format($serviceWebCount / 1000, 1) . 'k' }}</h3>
                        <p>Services Web</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                </div>
                <!-- Messages Received Card -->
                <div class="stat-card gradient-grey">
                    <div class="stat-content">
                        <h3>{{ $messagesReceived < 1000 ? $messagesReceived : number_format($messagesReceived / 1000, 1) . 'k' }}</h3>
                        <p>Messages reçus</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <!-- Messages Replied Card -->
                <div class="stat-card gradient-green">
                    <div class="stat-content">
                        <h3>{{ $messagesReplied < 1000 ? $messagesReplied : number_format($messagesReplied / 1000, 1) . 'k' }}</h3>
                        <p>Messages répondus</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-reply"></i>
                    </div>
                </div>
                <!-- Messages Read Card -->
                <div class="stat-card gradient-yellow">
                    <div class="stat-content">
                        <h3>{{ $messagesRead < 1000 ? $messagesRead : number_format($messagesRead / 1000, 1) . 'k' }}</h3>
                        <p>Messages lus</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                </div>
                <!-- Messages Received Today Card -->
                <div class="stat-card gradient-orange">
                    <div class="stat-content">
                        <h3>{{ $messagesReceivedToday < 1000 ? $messagesReceivedToday : number_format($messagesReceivedToday / 1000, 1) . 'k' }}</h3>
                        <p>Messages reçus<br>aujourd'hui</p>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Modern Dashboard Styles */
    .dashboard-container {
        padding: 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }
    
    .dashboard-header {
        margin-bottom: 2.5rem;
        text-align: center;
    }
    
    .dashboard-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }
    
    .dashboard-subtitle {
        font-size: 1.1rem;
        color: #7f8c8d;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .stats-section {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        transition: transform 0.3s ease;
    }
    
    .stats-section:hover {
        transform: translateY(-5px);
    }
    
    .section-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #f1f1f1;
    }
    
    .section-icon {
        font-size: 1.5rem;
        margin-right: 1rem;
        color: #3498db;
    }
    
    .stats-section h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
    }
    
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .stat-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem;
        border-radius: 10px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 200%;
        background: rgba(255, 255, 255, 0.1);
        transform: rotate(30deg);
    }
    
    .stat-content h3 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0 0 0.5rem 0;
    }
    
    .stat-content p {
        font-size: 1rem;
        margin: 0 0 0.75rem 0;
        opacity: 0.9;
    }
    
    .stat-trend {
        display: flex;
        align-items: center;
        font-size: 0.85rem;
        opacity: 0.9;
    }
    
    .stat-trend i {
        margin-right: 0.5rem;
    }
    
    .stat-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        margin-top: 0.5rem;
        background: rgba(255, 255, 255, 0.2);
    }
    
    .stat-badge.warning {
        background: rgba(255, 255, 255, 0.3);
        color: #ffeb3b;
    }
    
    .stat-badge i {
        margin-right: 0.3rem;
    }
    
    .stat-icon {
        font-size: 2.5rem;
        opacity: 0.2;
    }
    
    /* Gradient Colors */
    .gradient-purple {
        background: linear-gradient(135deg, #9c27b0, #673ab7);
    }
    
    .gradient-blue {
        background: linear-gradient(135deg, #2196f3, #3f51b5);
    }
    
    .gradient-orange {
        background: linear-gradient(135deg, #ff9800, #ff5722);
    }
    
    .gradient-teal {
        background: linear-gradient(135deg, #009688, #4caf50);
    }
    
    .gradient-pink {
        background: linear-gradient(135deg, #e91e63, #9c27b0);
    }
    
    .gradient-red {
        background: linear-gradient(135deg, #f44336, #e91e63);
    }
    
    .gradient-amber {
        background: linear-gradient(135deg, #ffc107, #ff9800);
    }
    
    .gradient-indigo {
        background: linear-gradient(135deg, #3f51b5, #673ab7);
    }
    
    .gradient-green {
        background: linear-gradient(135deg, #4caf50, #8bc34a);
    }
    
    .gradient-cyan {
        background: linear-gradient(135deg, #00bcd4, #009688);
    }
    
    .gradient-grey {
        background: linear-gradient(135deg, #607d8b, #9e9e9e);
    }
    
    .gradient-yellow {
        background: linear-gradient(135deg, #ffeb3b, #ffc107);
        color: #333;
    }
    
    .gradient-yellow .stat-content p,
    .gradient-yellow .stat-trend,
    .gradient-yellow .stat-badge {
        color: #333;
    }
    
    /* Quick Actions */
    .quick-actions {
        margin-top: 3rem;
    }
    
    .quick-actions h2 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        color: #2c3e50;
    }
    
    .action-buttons {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }
    
    .action-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1.5rem 1rem;
        background: white;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .action-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }
    
    .action-btn i {
        font-size: 1.8rem;
        margin-bottom: 0.8rem;
        color: #3498db;
    }
    
    .action-btn span {
        font-size: 1rem;
        font-weight: 500;
        color: #2c3e50;
    }
    
    @media (max-width: 768px) {
        .stats-row {
            grid-template-columns: 1fr;
        }
        
        .action-buttons {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>

@endsection