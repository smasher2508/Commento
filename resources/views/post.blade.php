@extends('layouts.blog-post')
@section('content')
<br>
@if(Session::has('success_message'))
<div class="alert alert-success">
   <p><i class="fa fa-info-circle"></i>&ensp;{{session('success_message')}}</p>
</div>
   @endif
<!-- Title -->
<h1 class="mt-4">{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
  by
  {{$post->user->name}}
</p>

<hr>

<!-- Date/Time -->
<p>Posted  {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-fluid rounded" src="{{url('/images/'.$post->photo->file)}}" alt="">

<hr>

<!-- Post Content -->
<p>{!!$post->body!!}</p>
<hr>

<!-- Comments Form -->
<div class="card my-4">
        @if(Auth::check())
  <h5 class="card-header">Leave a Comment:</h5>
  <div class="card-body">
        {!! Form::open(['method' =>'POST','action' =>'PostCommentsController@store'])!!}
        @csrf
        <input type="hidden" name="post_id" value="{{$post->id}}" >
          <div class="form-group">
            {!! Form::label('body', 'Comment') !!}
            {!! Form::textarea('body','', ['class' => 'form-control','rows'=>'3']) !!}
          </div>
          <button class="btn btn-success" type="submit">Submit</button>
      
        {!! Form::close() !!} 
  </div>
  @endif
</div>

@if(count($comments)>0)
@foreach($comments as $comment)
<!-- Comment with nested comments -->
<div class="media mb-4">
  
  <img class="d-flex mr-3 rounded-circle" height="50" src="{{Auth::user()->gravatar}}" alt="">
  <div class="media-body">
    
    
    <h5 class="mt-0">{{$comment->author}}
    <small>{{$comment->created_at->diffForHumans()}}</small>
  </h5>
        
  
    {{$comment->body}}

     @if(count($comment->replies)>0)
     @foreach($comment->replies as $reply)
     @if($reply->is_active=='1')
    <div class="media mt-4">
      <img class="d-flex mr-3 rounded-circle" height="50" src="{{url('/images/'.$reply->photo)}}" alt="">
      <div class="media-body">
          
        <h5 class="mt-0">
          {{$reply->author}}
          <small>{{$reply->created_at->diffForHumans()}}</small>
        </h5>
       {{$reply->body}}
      </div>
    </div>
    @endif
    
    @endforeach
    @endif
    <div class="comment-reply-container">
        <button class="toggle-reply btn btn-primary pull-right" style="margin-left:600px;">Reply</button>
    
    <div class="comment-reply" style="display:none;" > 
    {!! Form::open(['method' =>'POST','action' =>'CommentRepliesController@createReply'])!!}
        @csrf
        <input type="hidden" name="comment_id" value="{{$comment->id}}" >
          <div class="form-group">
            {!! Form::label('body', 'Reply') !!}
            {!! Form::textarea('body','', ['class' => 'form-control','rows'=>'2']) !!}
          </div>
          <button class="btn btn-success" type="submit">Submit Reply</button>
      
        {!! Form::close() !!} 
    </div>
  </div>
  </div>
</div>
@endforeach
@endif

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
      <div class="col-lg-12">
        <ul class="list-unstyled mb-0">
            @if($categories)
              @foreach($categories as $category)
          <li>
            <a href="{{url('/post/category/'.$category->id)}}">{{$category->name}}</a>
          </li>
             @endforeach
             
          @endif
        </ul>
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

@section('scripts')
   
<script>
    $(".comment-reply-container .toggle-reply").click(function(){

       $(this).next().slideToggle("slow");
    });
 </script>

@endsection
