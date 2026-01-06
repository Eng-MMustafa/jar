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
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
    <div class="mb-4">
        <form method="GET" action="{{ route('admin.categories.index') }}" class="flex items-center gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="border rounded px-3 py-2">
            <button class="bg-gray-600 text-white px-3 py-2 rounded">Search</button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="text-left text-sm text-gray-600">
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Sort</th>
                    <th class="px-4 py-2">Active</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse($categories as $category)
                    <tr>
                        <td class="px-4 py-2">{{ $category->name }}</td>
                        <td class="px-4 py-2">{{ $category->sort_order }}</td>
                        <td class="px-4 py-2">{{ $category->is_active ? 'Yes' : 'No' }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-indigo-600 mr-2">Edit</a>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600" onclick="return confirm('Delete category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>
@endsection
