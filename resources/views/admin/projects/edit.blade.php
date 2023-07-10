@extends('admin.layouts.base')

@section('contents')

    <h1>Edit Project</h1>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form method="POST" action="{{ route('admin.project.update', ['project' => $project->id]) }}" novalidate>
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                value="{{ old('title', $project->title) }}"
            >
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="creation_date" class="form-label">Creation Date</label>
            <input
                type="date"
                class="form-control @error('creation_date') is-invalid @enderror"
                id="creation_date"
                name="creation_date"
                value="{{ old('creation_date', $project->creation_date) }}"
            >
            @error('creation_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="last_update" class="form-label">Last Update</label>
            <input
                type="date"
                class="form-control @error('last_update') is-invalid @enderror"
                id="last_update"
                name="last_update"
                value="{{ old('last_update', $project->last_update) }}"
            >
            @error('last_update')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input
                type="text"
                class="form-control @error('author') is-invalid @enderror"
                id="author"
                name="author"
                value="{{ old('author', $project->author) }}"
            >
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="collaborators" class="form-label">Collaborators</label>
            <input
                type="text"
                class="form-control @error('collaborators') is-invalid @enderror"
                id="collaborators"
                name="collaborators"
                value="{{ old('collaborators', $project->collaborators) }}"
            >
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                class="form-control @error('description') is-invalid @enderror"
                id="description"
                rows="10"
                name="description">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="languages" class="form-label">Languages</label>
            <input
                type="text"
                class="form-control @error('languages') is-invalid @enderror"
                id="languages"
                name="languages"
                value="{{ old('languages', $project->languages) }}"
            >
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link_github" class="form-label">Link Github</label>
            <input
                type="url"
                class="form-control @error('link_github') is-invalid @enderror"
                id="link_github"
                name="link_github"
                value="{{ old('link_github', $project->link_github) }}"
            >
            @error('link_github')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

@endsection