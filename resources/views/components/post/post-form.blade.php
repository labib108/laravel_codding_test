<h1 class="text-center mt-5 mb-5 text-primary ">Create a New Post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('post_store') }}" method="POST">
        @csrf

        <div class="form-group mb-3 mt-3 "> 
            <label for="title" class="form-label text-primary" style="font-size: 1.5rem;">Title:</label>
            <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group mb-3 mt-3 ">
            <label for="content" class="form-label text-primary" style="font-size: 1.5rem;">Content:</label>
            <textarea class="form-control " id="content" name="content" rows="6" style="height: 200px;" required>{{ old('content') }}</textarea>
        </div>

        <div>
            <button type="submit" class="btn btn-info text-dark " onclick="SubmitPost()">Create Post</button>
        </div>
    </form>
 