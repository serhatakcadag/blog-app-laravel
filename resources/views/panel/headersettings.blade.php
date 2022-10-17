<x-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blog Settings</h1>
        </div>
        <form method="POST" action="/admin/header">
            @csrf
            @method('PUT')
            <div class="form-group col-5">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $header[0]->title }}" aria-describedby="emailHelp" placeholder="Enter title">
            @error('title')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            </div>
            <div class="form-group col-5">
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description" name="description" value="{{ $header[0]->description }}" placeholder="Description">
              @error('description')
              <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
                <div class="col-5">
                     <label for="keywords">Keywords</label>
                <input type="text" class="form-control" id="keywords" name="keywords" value="{{ $header[0]->keywords }}" placeholder="Keywords">
                @error('keywords')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>

              </div>
              <div class="form-group col-5">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="mail" name="mail" value="{{ $header[0]->mail }}" placeholder="Mail">
                @error('mail')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
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
