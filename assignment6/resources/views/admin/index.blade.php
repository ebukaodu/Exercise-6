@extends('layouts.admin')
@section('content')
    @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.create') }}" class="btn btn-success">New Post</a>
        </div>
    </div>
    <hr>
    @foreach($items as $item)
        <div class="row">
            <div class="col-md-12">
                <p><strong>{{ $item['name'] }}</strong> <a href="{{ route('admin.edit', ['id' => array_search($item, $items)]) }}">Edit</a></p>
            </div>
        </div>
    @endforeach

@endsection