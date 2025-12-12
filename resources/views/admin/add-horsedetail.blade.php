@extends('admin.layout.main')
@section('title', isset($horse) ? 'Edit Horse Detail' : 'Add Horse Detail')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">{{ isset($horse) ? 'Edit Horse Detail' : 'Add Horse Detail' }}</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Error Messages --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="@isset($horse) {{ route('horses.update', $horse->id) }} @else {{ route('horses.store') }} @endisset" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @isset($horse) @method('PUT') @endisset

        {{-- Subcategory --}}
        <div class="mb-3">
            <label>Subcategory</label>
            <select name="subcategory_id" class="form-select" required>
                <option value="">-- Select Subcategory --</option>
                @foreach($subcategories as $sub)
                    <option value="{{ $sub->id }}"
                        @isset($horse) {{ $horse->subcategory_id == $sub->id ? 'selected' : '' }} @endisset>
                        {{ $sub->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Horse Name --}}
        <div class="mb-3">
            <label>Horse Name</label>
            <input type="text" name="horse_name" class="form-control" value="{{ $horse->horse_name ?? old('horse_name') }}">
        </div>

        <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="4">{{ $horse->description ?? old('description') }}</textarea>
</div>
        {{-- Color --}}
        <div class="mb-3">
            <label>Color</label>
            <input type="text" name="color" class="form-control" value="{{ $horse->color ?? old('color') }}">
        </div>

        {{-- Age --}}
        <div class="mb-3">
            <label>Age</label>
            <input type="text" name="age" class="form-control" value="{{ $horse->age ?? old('age') }}">
        </div>

        {{-- Height --}}
        <div class="mb-3">
            <label>Height</label>
            <input type="text" name="height" class="form-control" value="{{ $horse->height ?? old('height') }}">
        </div>

        {{-- Images --}}
        <div class="mb-3">
            <label>Images</label>
            <input type="file" name="images[]" class="form-control" multiple>
            @isset($horse)
                @if($horse->images->count() > 0)
                    <div class="mt-2">
                        @foreach($horse->images as $img)
                            <div class="d-inline-block position-relative me-2 mb-2">
                                <img src="{{ asset($img->image_path) }}" width="100" class="rounded">
                                <form action="{{ route('horses.images.destroy', $img->id) }}" method="POST" 
                                      class="position-absolute top-0 end-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Delete this image?')">&times;</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endisset
        </div>

        {{-- Buttons --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn text-white" style="background-color: #152238;">
                @isset($horse) Update @else Save @endisset
            </button>
            <a href="{{ route('horses.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
