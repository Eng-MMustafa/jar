@extends('admin.layouts.app')

@section('title', 'Categories')
@section('page-title', 'Categories')

@section('page-actions')
    <a href="{{ route('admin.categories.create') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200">
        <i class="fas fa-plus mr-2"></i>
        Add Category
    </a>
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    @if(session('success'))
        <div x-data x-init="setTimeout(() => $el.remove(), 3500)" class="mb-4 bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <form method="GET" action="{{ route('admin.categories.index') }}" class="flex items-center gap-2 w-full max-w-lg">
            <div class="relative w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search categories..." class="w-full border rounded-lg px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-teal-200">
                <div class="absolute left-3 top-2.5 text-gray-400"><i class="fas fa-search"></i></div>
            </div>
            <button class="bg-gray-600 text-white px-4 py-2 rounded-lg">Search</button>
        </form>

        <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 bg-teal-600 text-white px-4 py-2 rounded-lg shadow hover:opacity-95">
            <i class="fas fa-plus"></i>
            Add Category
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="text-sm text-right text-gray-600">
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Products</th>
                    <th class="px-4 py-3">Sort</th>
                    <th class="px-4 py-3">الحالة</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4 flex items-center gap-3">
                            <div class="w-12 h-12 rounded-md bg-gray-100 flex items-center justify-center overflow-hidden">
                                @if($category->image_url)
                                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-xl text-teal-600"><i class="fas fa-folder"></i></div>
                                @endif
                            </div>
                            <div class="text-right">
                                <div class="font-semibold text-gray-800">{{ $category->name }}</div>
                                @if($category->slug)
                                    <div class="text-xs text-gray-400">{{ $category->slug }}</div>
                                @endif
                            </div>
                        </td> 

                        <td class="px-4 py-4 text-sm text-gray-700">{{ $category->products()->count() }}</td>
                        <td class="px-4 py-4 text-sm text-gray-700">{{ $category->sort_order }}</td>
                        <td class="px-4 py-4">
                            <form method="POST" action="{{ route('admin.categories.toggle', $category) }}" class="inline">
                                @csrf
                                <button type="button" onclick="toggleCategory(event, this)" class="inline-flex items-center px-3 py-1 rounded text-sm {{ $category->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    <span>{{ $category->is_active ? 'مفعل' : 'معطل' }}</span>
                                </button>
                            </form>
                        </td>

                        <td class="px-4 py-4 text-sm">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="inline-flex items-center gap-2 text-blue-600 hover:bg-blue-50 px-3 py-1 rounded">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>

                            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="inline" x-data x-ref="delForm" @submit.prevent="showConfirm = true; targetForm = $el">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-2 text-red-600 hover:bg-red-50 px-3 py-1 rounded">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-gray-500">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $categories->links() }}
    </div>

    <!-- Delete confirmation modal -->
    <div x-data="{ showConfirm: false, targetForm: null }" x-cloak>
        <template x-if="showConfirm">
            <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
                <div class="bg-white rounded-lg p-6 w-96">
                    <h3 class="text-lg font-semibold mb-2">Confirm Deletion</h3>
                    <p class="text-sm text-gray-600 mb-4">Are you sure you want to delete this category? This action cannot be undone.</p>
                    <div class="flex justify-end gap-2">
                        <button @click="showConfirm=false" class="px-4 py-2 border rounded">Cancel</button>
                        <button @click="if(targetForm){ targetForm.submit() }" class="px-4 py-2 bg-red-600 text-white rounded">Delete</button>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>

<script>
    function toggleCategory(e, btn){
        e.preventDefault();
        const form = btn.closest('form');
        const url = form.action;
        const tokenEl = document.querySelector('meta[name="csrf-token"]');
        if (!tokenEl) { btn.disabled = false; return alert('CSRF token missing — reload the page.'); }
        const token = tokenEl.getAttribute('content');
        btn.disabled = true;
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            }
        }).then(r => r.json()).then(data => {
            if (data.is_active) {
                btn.classList.remove('bg-red-100','text-red-700');
                btn.classList.add('bg-green-100','text-green-700');
                btn.querySelector('span').textContent = 'Active';
            } else {
                btn.classList.remove('bg-green-100','text-green-700');
                btn.classList.add('bg-red-100','text-red-700');
                btn.querySelector('span').textContent = 'Inactive';
            }
        }).catch(()=>{ alert('Error updating status'); }).finally(()=> btn.disabled=false);
    }
</script>
@endsection
