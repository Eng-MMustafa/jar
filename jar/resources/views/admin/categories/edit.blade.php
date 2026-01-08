@extends('admin.layouts.app')

@section('title', 'Edit Category')
@section('page-title', 'Edit Category')

@section('page-actions')
    <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Categories
    </a>
@push('scripts')
<script>
    function previewImage(input) {
        const previewDiv = document.getElementById('image-preview');
        const previewImg = document.getElementById('preview-img');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewDiv.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        }
        // If no file selected, keep the existing image if present (handled by blade logic)
    }
</script>
@endpush

@endsection

@section('content')
<div class="max-w-2xl mx-auto">
    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data" class="space-y-4 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-teal-500 transition-colors">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600 justify-center">
                        <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-teal-500">
                            <span>Upload a file</span>
                            <input id="image" name="image" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                </div>
            </div>

            <div id="image-preview" class="mt-4 {{ $category->image_url ? '' : 'hidden' }}">
                <span class="block text-sm font-medium text-gray-700 mb-1">Preview:</span>
                <img id="preview-img" src="{{ $category->image_url ?? '' }}" alt="Preview" class="h-40 w-auto rounded-lg shadow-md object-cover">
            </div>

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

            <div class="flex flex-col">
                <div class="flex items-center gap-3">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }} class="h-4 w-4">
                    <label for="is_active" class="ml-2 text-sm text-gray-700">الحالة</label>

                    <button type="button" id="toggleBtn" onclick="toggleCategoryEdit(event, this)" class="inline-flex items-center px-3 py-1 rounded text-sm {{ $category->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        <span>{{ $category->is_active ? 'مفعل' : 'معطل' }}</span>
                    </button>
                </div>
                @error('is_active')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-400 transition-colors">Cancel</a>
            <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 transition-colors shadow-sm">Save</button>
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
