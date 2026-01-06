@extends('admin.layouts.app')

@section('title', 'Edit Category')
@section('page-title', 'Edit Category')

@section('page-actions')
    <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Categories
    </a>
@endsection

@section('content')
<div class="max-w-2xl mx-auto">
    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data" class="space-y-4 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        @csrf
        @method('PUT')

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
            @if($category->image_url)
                <div class="mb-2"><img src="{{ $category->image_url }}" alt="Category image" class="w-24 h-24 object-cover rounded-md"></div>
            @endif
            <input id="image" type="file" name="image" accept="image/*" class="w-full">
            @error('image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <h2 class="text-lg font-semibold mb-4">Edit Category</h2>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
            <input id="name" type="text" name="name" value="{{ old('name', $category->name ?? $category->name_en) }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-200">
            @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mt-3">
            <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
            <input id="slug" type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="w-full border border-gray-300 rounded-md px-3 py-2">
            @error('slug')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div> 

        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order ?? 0) }}" class="w-full border border-gray-300 rounded-md px-3 py-2">
                @error('sort_order')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" {{ old('is_active', $category->is_active) ? 'checked' : '' }} class="h-4 w-4">
                <label for="is_active" class="ml-2 text-sm text-gray-700">الحالة</label>

                <button type="button" id="toggleBtn" onclick="toggleCategoryEdit(event, this)" class="inline-flex items-center px-3 py-1 rounded text-sm {{ $category->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    <span>{{ $category->is_active ? 'مفعل' : 'معطل' }}</span>
                </button>
            </div>
        </div> 

        <div class="flex justify-end">
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mr-2">Cancel</a>
            <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded-md">Save</button>
        </div>
    </form>
</div>

<script>
    function toggleCategoryEdit(e, btn) {
        e.preventDefault();
        const url = "{{ route('admin.categories.toggle', $category) }}";
        const tokenEl = document.querySelector('meta[name="csrf-token"]');
        if (!tokenEl) { btn.disabled = false; return alert('رمز CSRF مفقود — أعد تحميل الصفحة.'); }
        const token = tokenEl.getAttribute('content');
        btn.disabled = true;
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            }
        }).then(r => r.json()).then(data => {
            document.getElementById('is_active').checked = data.is_active;
            if (data.is_active) {
                btn.classList.remove('bg-red-100','text-red-700');
                btn.classList.add('bg-green-100','text-green-700');
                btn.querySelector('span').textContent = 'مفعل';
            } else {
                btn.classList.remove('bg-green-100','text-green-700');
                btn.classList.add('bg-red-100','text-red-700');
                btn.querySelector('span').textContent = 'معطل';
            }
        }).catch(()=>{ alert('حدث خطأ أثناء تحديث الحالة'); }).finally(()=> btn.disabled=false);
    }
</script>

@endsection
