<x-blog-layout>
      <!-- Page header with logo and tagline-->
      <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">Blog homepage with Bootstrap and Laravel</p>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">

                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                        <!-- Blog post-->
                        @if (count($posts))
                        @foreach ($posts as $post)
                        <div class="col-lg-6">
                              <div class="card mb-4">
                            <a href="/posts/{{ $post->id }}"><img class="card-img-top" src="{{ asset('storage/'.$post['photo']) }}" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">{{explode(" ",$post->created_at)[0]}}</div>
                                <h2 class="card-title h4">{{ $post->title }}</h2>
                                <a class="btn btn-primary" href="/posts/{{ $post->id }}">Read →</a>
                            </div>
                        </div>
                        </div>
                        @endforeach
                        @else
                        <h1>No listings found.</h1>
                        @endif

                        <!-- Blog post-->
                </div>
                <!-- Pagination-->
               <div>
                {{ $posts->links() }}
               </div>
            </div>
            <!-- Side widgets-->
         @include('partials._search', ['old' => $search])
        </div>
    </div>
</x-blog-layout>
