<x-blog-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">{{$post->created_at->diffForHumans()}}</div>
                        <!-- Post categories-->
                        @php
                            $categories = explode(',', $post->categories);
                        @endphp
                        @foreach ($categories as $category)
                        <a class="badge bg-secondary text-decoration-none link-light" href="/?categories={{ trim($category) }}">{{ ucwords(trim($category)) }}</a>
                        @endforeach
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('storage/'.$post->photo) }}" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                       @php
                           echo($post->content);
                       @endphp
                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4" method="POST" action="/comment">
                                @csrf
                                <input type="text" name="author" class="form-control" placeholder="Enter your name">
                                <br>
                                <textarea name="content" class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                                <br>
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <!-- Comment with nested comments-->
                            @foreach($comments as $comment)
                            <div class="d-flex mb-4">
                                <!-- Parent comment-->
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">{{ $comment['author'] }}</div>
                                   {{ $comment['content'] }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <!-- Side widgets-->
           @include('partials._search')
        </div>
    </div>
</x-blog-layout>
