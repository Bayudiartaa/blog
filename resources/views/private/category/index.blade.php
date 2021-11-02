@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('messsage'))
            <div class="alert alert-success">{!! session('messsage') !!}</div>
        @endif
        
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center my-2">
                    <h5 class="card-title">Your Categories</h5>
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Create a new category</a>
                </div>
                @forelse($categories as $category)
                <div class="d-flex justify-content-between align-items-center my-2">
                    <div class="d-flex align-items-center">
                        <div class="ml-3">
                            <p>{{ $category->name }}</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus postingan ini?')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="alert alert-danger mt-3 text-center" role="alert">
                    You don't have any posts
                </div>
                @endforelse
            </div>
        </div>
    </div>    
@endsection