
@foreach ($comments as $comment)
    <div class="my-2 py-2 border rounded">
        <!-- Parent comment-->
        <div class="d-flex ms-2">
            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
            {{-- @foreach ($post as $pst) --}}
            <div class="ms-3">
                <div class="fw-bold">{{$comment->user->name}}</div>
                {{$comment->comment}}
                <div class="text-muted fst-italic mb-2">Comment by {{ $comment->created_at->diffForHumans() }} <span class="ms-5"><a href="#" class="me-1">Like</a>( 12 )</span></div>
                <form action="{{ route('post.store')}}" method="POST" class="mb-5 d-flex">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user() ? Auth::user()->id : '' }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="parent_id" value="{{ $comment->id}}">
                    <textarea class="form-control comment-reply me-2" name="comment" rows="1" placeholder="Join the discussion and leave a comment!" required></textarea>
                    <button class="btn btn-primary mt-2 float-end" type="submit">Reply</button>
                </form>
            </div>
        </div>



        <!-- Child comment 1-->

        @if (count($comment->replies)>0)
        <div class="mt-4 ms-5">
            {{-- <h5 class="ms-3 my-2">Reply</h5> --}}
            @foreach ($comment->replies as $reply)
                <div class="d-flex mt-2 ms-3">
                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                    <div class="ms-3">
                        <div class="fw-bold">{{$reply->user->name}}</div>
                        {{$reply->comment}}{{$reply->id}}
                        <div class="text-muted fst-italic mb-2">Reply by {{ $reply->created_at->diffForHumans() }} <span class="ms-5"><a href="#" class="me-1">Like</a>( 12 )</span></div>
                        <form action="{{ route('post.store')}}" method="POST" class="mb-5 d-flex">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user() ? Auth::user()->id : '' }}">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="hidden" name="parent_id" value="{{ $reply->id}}">
                            <textarea class="form-control comment-reply-reply me-2" name="comment" rows="1" placeholder="Join the discussion and leave a comment!" required></textarea>
                            <button class="btn btn-primary mt-2 float-end" type="submit">Reply</button>
                        </form>
                    </div>
                </div>
                @if (count($reply->replies)>0)
                <div class="mt-4 ms-5">
                    {{-- <h5 class="ms-3 my-2">Reply</h5> --}}
                    @foreach ($reply->replies as $repy)
                        <div class="d-flex mt-2 ms-3">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>

                            <div class="ms-3">
                                <div class="fw-bold">{{$repy->user->name}}</div>
                                {{$repy->comment}}
                                <div class="text-muted fst-italic mb-2">Reply by {{ $repy->created_at->diffForHumans() }} <span class="ms-5"><a href="#" class="me-1">Like</a>( 12 )</span></div>
                                <form action="{{ route('post.store')}}" method="POST" class="mb-5 d-flex">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user() ? Auth::user()->id : '' }}">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="hidden" name="parent_id" value="{{ $repy->id}}">
                                    <textarea class="form-control comment-reply-reply-reply me-2" name="comment" rows="1" placeholder="Join the discussion and leave a comment!" required></textarea>
                                    <button class="btn btn-primary mt-2 float-end" type="submit">Reply</button>
                                </form>
                            </div>

                        </div>
                        @if (count($repy->replies)>0)
                        <div class="mt-4 ms-5">
                            {{-- <h5 class="ms-3 my-2">Reply</h5> --}}
                            @foreach ($repy->replies as $rep)
                                <div class="d-flex mt-2 ms-3">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>

                                    <div class="ms-3">
                                        <div class="fw-bold">{{$rep->user->name}}</div>
                                        <p class="">
                                            {{$rep->comment}}
                                        </p>
                                        <div class="text-muted fst-italic mb-2">Reply by {{ $rep->created_at->diffForHumans() }} <span class="ms-5"><a href="#" class="me-1">Like</a>( 12 )</span></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            @endforeach
            @endif

        </div>
    @endforeach

</div>
