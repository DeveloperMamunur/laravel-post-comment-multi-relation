@extends('welcome')
@section('body')
        <div class="main-cards">
            <div class="main-title">
                <p class="font-weight-bold">All Posts</p>
             </div>
             {{-- @foreach ($post as $item) --}}

            <div class="cards">
                <div class="card-inner">
                    <img src="{{ asset('storage/images/'.$post->image) }}" alt="">
                    <h3>{{ $post->title }}</h3>
                    <p class="text-primari">{{ $post->body }}</p>
                </div>
            </div>
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        <form action="{{ route('post.store')}}" method="POST" class="mb-5">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user() ? Auth::user()->id : '' }}">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            {{-- <input type="hidden" name="comment_id"> --}}
                            <textarea class="form-control" name="comment" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                            <button class="btn btn-primary mt-2 float-end" type="submit">Comment</button>
                        </form>
                        <!-- Comment with nested comments-->
                        @include('posts.comment',['comments'=>$post->comments])


                    </div>
                </div>
            </section>

        </div>
@endsection
