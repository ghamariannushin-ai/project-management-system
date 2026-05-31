    <form action="{{ route('admin.projects.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">نام پروژه</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">عنوان</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">توضیحات</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">ذخیره</button>
</form>
