@extends('layouts.main')


@section('content')
    <div class="card-body">
        <p class="card-text">{{ $item['name'] }}</p>

            <p class="card-text">{{ $item['detail'] }}</p>
        </div>
    <div class="d-flex justify-content-between align-items-center">
        <small class="text-muted">{{ $item['price'] }}</small>
    </div>
    </div>
@endsection