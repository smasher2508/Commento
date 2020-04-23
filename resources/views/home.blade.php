{{-- @extends('layouts.app') --}}
@extends('layouts.blog-home')

@section('content')

<h1 class="my-4">Page Heading
        <small>Secondary Text</small>
    </h1>
    @if($posts)
    @foreach($posts as $post)
    
      <!-- Blog Post -->
      <div class="card mb-4">
        <img class="card-img-top" src="{{url('/images/'.$post->photo->file)}}" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">{{$post->title}}</h2>
          <p class="card-text">{!!str_limit($post->body,20)!!}</p>
          <a href="{{url('/post/'.$post->slug)}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on {{$post->created_at->diffForHumans()}} by
          {{$post->user->name}}
        </div>
      </div>
    @endforeach
    @else
    <div>
        No posts in this category 
    </div>
    @endif
    
     
    
      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          {{-- <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a> --}}
          {{$posts->render()}}
        </li>
      </ul>
    
    </div>
    
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
    
      <!-- Search Widget -->
      <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    
      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                  @if($categories)
                  @foreach($categories as $category)
                <li>
                  <a href="{{url('/post/category/'.$category->id)}}">{{$category->name}}</a>
                </li>
                @endforeach
              </ul>
              @endif
            </div>
          </div>
        </div>
      </div>
    
      <!-- Side Widget -->
      <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
          You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
      </div>
    
@endsection

