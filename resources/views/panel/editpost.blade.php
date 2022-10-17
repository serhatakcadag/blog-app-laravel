<x-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit {{ $post->title }}</h1>
        </div>
        <form method="POST" action="/admin/edit/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-5">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title" value="{{ $post->title }}">
            @error('title')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            </div>
            <div class="form-group col-5">
              <label for="author">Author</label>
              <input value="{{ $post->author }}" type="text" class="form-control" id="author" name="author" placeholder="Author">
              @error('author')
              <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
                <div class="col-5">
                     <label for="keywords">Categories (comma seperated)</label>
                <input value="{{ $post->categories }}" type="text" class="form-control" id="categories" name="categories" placeholder="Categories">
                @error('categories')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>

              </div>
              <div class="form-group col-5">
                <label for="email">Email</label>
                <input value="{{ $post->mail }}" type="text" class="form-control" id="mail" name="mail" placeholder="Mail">
                @error('mail')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group col-5">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control form-control-lg" name="content" id="exampleFormControlTextarea1" rows="3">
                    {{ $post->content }}
                </textarea>
              </div>
              @error('content')
              <small class="form-text text-danger">{{ $message }}</small>
              @enderror
              <div class="form-group col-5">
                <label for="exampleFormControlFile1">Photo for your post</label>
                <input type="file" value="{{ asset('storage/'.$post['photo']) }}" name="photo" class="form-control-file" id="exampleFormControlFile1">
                <img class="card-img-top" src="{{ asset('storage/'.$post['photo']) }}" alt="..." />
              </div>
              <div class="ml-3"><button type="submit" class="btn btn-primary">Submit</button></div>
            @if (session('message'))
            <div class="form-text text-success">{{ session('message') }}</div>
            @endif
          </form>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</x-layout>
