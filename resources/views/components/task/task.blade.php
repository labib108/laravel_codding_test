<div class="container">
    <h1 class="text-center mt-5 mb-5 text-primary">Task Management</h1>

    <!-- Display Success Message -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Form to Add New Task -->
    <div class="row mb-4">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center text-secondary">Create a New Task</h3>
            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label text-primary" style="font-size: 1.2rem;">Task Title:</label>
                    <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}" required>
                </div>
                <button type="submit" class="btn btn-info text-dark mt-3">Create Task</button>
            </form>
        </div>
    </div>

    <!-- Pending Tasks Table -->
    <h3 class="text-center text-secondary">Pending Tasks</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingTasks as $task)
                <tr>
                    <td><strong>{{ $task->title }}</strong></td>
                    <td>
                        <form action="{{ route('task.complete', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-dark">
                                Mark as Completed
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <hr class="mt-5 mb-5">
        <!-- Completed Tasks Table -->
        <h3 class="text-center text-secondary">Completed Tasks</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Completed At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($completedTasks as $task)
                    <tr>
                        <td><strong>{{ $task->title }}</strong></td>
                        <td>{{ $task->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    <!-- No tasks message -->
    @if ($pendingTasks->isEmpty())
        <p class="text-center mt-4 text-muted">No pending tasks available.</p>
    @endif
</div>