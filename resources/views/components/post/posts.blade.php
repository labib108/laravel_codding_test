<h1 class="text-center mt-5 mb-5 text-primary ">All Posts</h1>

    <ul>
        @foreach ($posts as $post)
            <li>
                <h3>{{ $post->title }}</h3>
                <p>{{$post->content}}</p>
            </li>
        @endforeach
    </ul>
    <button class="btn btn-primary"><a href="{{ route('post_create') }}">Create Post</a></button>