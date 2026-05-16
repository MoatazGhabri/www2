@extends('layouts.dashboard')
@section('pageTitle')
    Statistiques Slider
@endsection
@section('sectionTitle')
    Statistiques Slider
@endsection
@section('content')
<style>
    .slider-stats-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(59,130,246,0.10);
        padding: 36px 32px 28px 32px;
        max-width: 700px;
        margin: 32px auto;
    }
    .slider-stats-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 24px;
        text-align: center;
    }
    .slider-stats-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 18px;
    }
    .slider-stats-table th, .slider-stats-table td {
        padding: 12px 10px;
        border-bottom: 1px solid #e5e7eb;
        font-size: 15px;
        text-align: left;
    }
    .slider-stats-table th {
        background: #f3f4f6;
        color: #3b82f6;
        font-weight: 700;
    }
    .slider-stats-table tr:last-child td {
        border-bottom: none;
    }
    .slider-stats-empty {
        text-align: center;
        color: #6b7280;
        font-size: 1.1rem;
        margin: 32px 0;
    }
</style>
@if ($errors->has('propertyError'))
    <div class="alert alert-danger">
        {{ $errors->first('propertyError') }}
    </div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="slider-stats-card">
    <div class="slider-stats-title">Statistiques Slider</div>
    @if (count($statistique) > 0)
        <div class="table-responsive">
            <table class="slider-stats-table">
                <thead>
                    <tr>
                        <th style="width: 40%;">Date</th>
                        <th>Adresse IP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statistique as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->ip }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {!! $statistique->appends(request()->query())->links('vendor.pagination.default') !!}
        </div>
    @else
        <div class="slider-stats-empty">Aucune statistique pour ce slider.</div>
    @endif
</div>
@endsection
