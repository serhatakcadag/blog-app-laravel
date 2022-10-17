<x-layout>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Categories</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
             <tr>
            <th scope="row">{{ $post->id }}</th>
            <td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>
            <td>{{ $post->author }}</td>
            <td>{{ $post->categories }}</td>
            <td><a href="/admin/edit/{{ $post->id }}"><button class="btn btn-primary" type="submit">Edit</button></a></td>
            <td>
                <form action="/admin/delete/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
            </tr>
            @endforeach
        </tbody>
      </table>
</x-layout>
