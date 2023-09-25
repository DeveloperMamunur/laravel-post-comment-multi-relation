@extends('welcome')
@section('body')
        <div class="main-cards">
            <div class="main-title">
                <p class="font-weight-bold">All Posts</p>
             </div>
            @foreach ($posts as $post)
                <div class="cards">
                    <div class="card-inner">
                        <img src="{{ asset('storage/images/'.$post->image) }}" alt="">
                        <a href="{{route('post.show',$post->slug)}}"><h3>{{ $post->title }}</h3></a>
                        <p class="text-primari">{{ $post->body }}</p>
                        <a href="{{ route('post.show',$post->slug )  }}">See More</a>
                    </div>
                </div>

            @endforeach

          {{-- <div class="card">
            <div class="card-inner">
              <p class="text-primary">PURCHASE ORDERS</p>
              <span class="material-icons-outlined text-orange">add_shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold">83</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">SALES ORDERS</p>
              <span class="material-icons-outlined text-green">shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold">79</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">INVENTORY ALERTS</p>
              <span class="material-icons-outlined text-red">notification_important</span>
            </div>
            <span class="text-primary font-weight-bold">56</span>
          </div> --}}

        </div>

@endsection
