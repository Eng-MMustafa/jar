@extends('admin.layouts.app')

@section('title', 'Sliders')
@section('page-title', 'Sliders')
@section('page-description', 'Manage homepage sliders')

@section('page-actions')
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-2 text-sm text-gray-600">Title</th>
                    <th class="text-left py-2 text-sm text-gray-600">Active</th>
                    <th class="text-left py-2 text-sm text-gray-600">Start</th>
                    <th class="text-left py-2 text-sm text-gray-600">End</th>
                    <th class="text-right py-2 text-sm text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($sliders as $slider)
                    <tr>
                        <td class="py-3 text-sm">{{ $slider->title }}</td>
                        <td class="py-3 text-sm">{{ $slider->is_active ? 'Yes' : 'No' }}</td>
                        <td class="py-3 text-sm">{{ $slider->start_date?->format('Y-m-d') ?? '—' }}</td>
                        <td class="py-3 text-sm">{{ $slider->end_date?->format('Y-m-d') ?? '—' }}</td>
                        <td class="py-3 text-sm text-right">
                            <a href="{{ route('admin.sliders.edit', $slider) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-6 text-center text-gray-500">No sliders found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $sliders->links() }}
    </div>
</div>
@endsection
