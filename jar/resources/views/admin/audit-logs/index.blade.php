@extends('admin.layouts.app')

@section('title', 'Audit Logs')
@section('page-title', 'Audit Logs')
@section('page-description', 'View admin activity and audit logs')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
    <form method="GET" class="mb-4 flex gap-3 items-end">
        <div>
            <label class="text-sm text-gray-600">Admin</label>
            <select name="admin_id" class="border rounded px-2 py-1">
                <option value="">All</option>
                @foreach(\\App\\Models\\Admin::all() as $a)
                    <option value="{{ $a->id }}" {{ request('admin_id') == $a->id ? 'selected' : '' }}>{{ $a->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm text-gray-600">Action</label>
            <select name="action" class="border rounded px-2 py-1">
                <option value="">Any</option>
                <option value="created" {{ request('action') == 'created' ? 'selected' : '' }}>Created</option>
                <option value="updated" {{ request('action') == 'updated' ? 'selected' : '' }}>Updated</option>
                <option value="deleted" {{ request('action') == 'deleted' ? 'selected' : '' }}>Deleted</option>
            </select>
        </div>
        <div>
            <label class="text-sm text-gray-600">Model</label>
            <input type="text" name="model_type" value="{{ request('model_type') }}" placeholder="Model class" class="border rounded px-2 py-1">
        </div>
        <div>
            <label class="text-sm text-gray-600">Since</label>
            <input type="date" name="since" value="{{ request('since') }}" class="border rounded px-2 py-1">
        </div>
        <div>
            <button type="submit" class="bg-primary-600 text-white px-3 py-1 rounded">Filter</button>
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="border-b">
                    <th class="py-2 text-sm text-left">Time</th>
                    <th class="py-2 text-sm text-left">Admin</th>
                    <th class="py-2 text-sm text-left">Action</th>
                    <th class="py-2 text-sm text-left">Model</th>
                    <th class="py-2 text-sm text-left">Changes</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($logs as $log)
                    <tr>
                        <td class="py-2 text-sm">{{ $log->created_at->format('Y-m-d H:i') }}</td>
                        <td class="py-2 text-sm">{{ $log->admin?->name ?? '—' }}</td>
                        <td class="py-2 text-sm">{{ ucfirst($log->action) }}</td>
                        <td class="py-2 text-sm">{{ class_basename($log->model_type) }}#{{ $log->model_id }}</td>
                        <td class="py-2 text-sm">
                            <details>
                                <summary class="text-xs text-gray-600">View</summary>
                                <pre class="text-xs mt-2 bg-gray-50 p-2 rounded">Old: {{ json_encode($log->old_values, JSON_PRETTY_PRINT) }}\nNew: {{ json_encode($log->new_values, JSON_PRETTY_PRINT) }}</pre>
                            </details>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-6 text-center text-gray-500">No logs found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $logs->withQueryString()->links() }}
    </div>
</div>
@endsection
