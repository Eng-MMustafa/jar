@extends('admin.layouts.app')

@section('title', 'Design System')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h3 class="text-gray-700 text-3xl font-medium">Design System</h3>

    <!-- Typography -->
    <div class="mt-8">
        <h4 class="text-gray-600 text-xl font-medium border-b pb-2 mb-4">Typography (IBM Plex Sans Arabic)</h4>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Element</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Regular (400)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Medium (500)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SemiBold (600)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bold (700)</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- H1 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">H1</td>
                        <td class="px-6 py-4"><span class="text-4xl font-normal">H1</span></td>
                        <td class="px-6 py-4"><span class="text-4xl font-medium">H1 Medium</span></td>
                        <td class="px-6 py-4"><span class="text-4xl font-semibold">H1 SemiBold</span></td>
                        <td class="px-6 py-4"><span class="text-4xl font-bold">H1 Bold</span></td>
                    </tr>
                    <!-- H2 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">H2</td>
                        <td class="px-6 py-4"><span class="text-3xl font-normal">H2</span></td>
                        <td class="px-6 py-4"><span class="text-3xl font-medium">H2 Medium</span></td>
                        <td class="px-6 py-4"><span class="text-3xl font-semibold">H2 SemiBold</span></td>
                        <td class="px-6 py-4"><span class="text-3xl font-bold">H2 Bold</span></td>
                    </tr>
                    <!-- H3 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">H3</td>
                        <td class="px-6 py-4"><span class="text-2xl font-normal">H3</span></td>
                        <td class="px-6 py-4"><span class="text-2xl font-medium">H3 Medium</span></td>
                        <td class="px-6 py-4"><span class="text-2xl font-semibold">H3 SemiBold</span></td>
                        <td class="px-6 py-4"><span class="text-2xl font-bold">H3 Bold</span></td>
                    </tr>
                    <!-- H4 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">H4</td>
                        <td class="px-6 py-4"><span class="text-xl font-normal">H4</span></td>
                        <td class="px-6 py-4"><span class="text-xl font-medium">H4 Medium</span></td>
                        <td class="px-6 py-4"><span class="text-xl font-semibold">H4 SemiBold</span></td>
                        <td class="px-6 py-4"><span class="text-xl font-bold">H4 Bold</span></td>
                    </tr>
                    <!-- H5 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">H5</td>
                        <td class="px-6 py-4"><span class="text-lg font-normal">H5</span></td>
                        <td class="px-6 py-4"><span class="text-lg font-medium">H5 Medium</span></td>
                        <td class="px-6 py-4"><span class="text-lg font-semibold">H5 SemiBold</span></td>
                        <td class="px-6 py-4"><span class="text-lg font-bold">H5 Bold</span></td>
                    </tr>
                    <!-- Title1 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Title 1</td>
                        <td class="px-6 py-4"><span class="text-lg font-normal">Title1</span></td>
                        <td class="px-6 py-4"><span class="text-lg font-medium">Title1 Medium</span></td>
                        <td class="px-6 py-4"><span class="text-lg font-semibold">Title1 SemiBold</span></td>
                        <td class="px-6 py-4"><span class="text-lg font-bold">Title1 Bold</span></td>
                    </tr>
                    <!-- Title2 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Title 2</td>
                        <td class="px-6 py-4"><span class="text-base font-normal">Title2</span></td>
                        <td class="px-6 py-4"><span class="text-base font-medium">Title2 Medium</span></td>
                        <td class="px-6 py-4"><span class="text-base font-semibold">Title2 SemiBold</span></td>
                        <td class="px-6 py-4"><span class="text-base font-bold">Title2 Bold</span></td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Body</td>
                        <td class="px-6 py-4"><span class="text-base font-normal">Body</span></td>
                        <td class="px-6 py-4"><span class="text-base font-medium">Body Medium</span></td>
                        <td class="px-6 py-4"><span class="text-base font-semibold">Body SemiBold</span></td>
                        <td class="px-6 py-4"><span class="text-base font-bold">Body Bold</span></td>
                    </tr>
                    <!-- Caption -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Caption</td>
                        <td class="px-6 py-4"><span class="text-sm font-normal">Caption</span></td>
                        <td class="px-6 py-4"><span class="text-sm font-medium">Caption Medium</span></td>
                        <td class="px-6 py-4"><span class="text-sm font-semibold">Caption SemiBold</span></td>
                        <td class="px-6 py-4"><span class="text-sm font-bold">Caption Bold</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Colors -->
    <div class="mt-8">
        <h4 class="text-gray-600 text-xl font-medium border-b pb-2 mb-4">Colors</h4>

        <!-- Primary -->
        <div class="mb-6">
            <h5 class="text-sm font-semibold text-gray-500 mb-2 uppercase tracking-wider">Primary</h5>
            <div class="flex flex-wrap gap-4">
                <div class="w-32">
                    <div class="h-20 w-full bg-primary rounded-lg shadow-md mb-2"></div>
                    <p class="text-xs text-center font-mono text-gray-600">Primary</p>
                    <p class="text-xs text-center font-mono text-gray-400">#0d9488</p>
                </div>
                <div class="w-32">
                    <div class="h-20 w-full bg-primary-hover rounded-lg shadow-md mb-2"></div>
                    <p class="text-xs text-center font-mono text-gray-600">Hover</p>
                    <p class="text-xs text-center font-mono text-gray-400">#009595</p>
                </div>
                <div class="w-32">
                    <div class="h-20 w-full bg-primary-active rounded-lg shadow-md mb-2"></div>
                    <p class="text-xs text-center font-mono text-gray-600">Active</p>
                    <p class="text-xs text-center font-mono text-gray-400">#008484</p>
                </div>
                <div class="w-32">
                    <div class="h-20 w-full bg-primary-dark rounded-lg shadow-md mb-2"></div>
                    <p class="text-xs text-center font-mono text-gray-600">Dark</p>
                    <p class="text-xs text-center font-mono text-gray-400">#0f766e</p>
                </div>
            </div>
        </div>

        <!-- Secondary -->
        <div class="mb-6">
            <h5 class="text-sm font-semibold text-gray-500 mb-2 uppercase tracking-wider">Secondary</h5>
            <div class="flex flex-wrap gap-4">
                <div class="w-32">
                    <div class="h-20 w-full bg-secondary rounded-lg shadow-md mb-2"></div>
                    <p class="text-xs text-center font-mono text-gray-600">Secondary</p>
                    <p class="text-xs text-center font-mono text-gray-400">#00ce67</p>
                </div>
                <div class="w-32">
                    <div class="h-20 w-full bg-secondary-hover rounded-lg shadow-md mb-2"></div>
                    <p class="text-xs text-center font-mono text-gray-600">Hover</p>
                    <p class="text-xs text-center font-mono text-gray-400">#00b95d</p>
                </div>
                <div class="w-32">
                    <div class="h-20 w-full bg-secondary-active rounded-lg shadow-md mb-2"></div>
                    <p class="text-xs text-center font-mono text-gray-600">Active</p>
                    <p class="text-xs text-center font-mono text-gray-400">#00a552</p>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="mb-6">
            <h5 class="text-sm font-semibold text-gray-500 mb-2 uppercase tracking-wider">Status</h5>
            <div class="flex flex-wrap gap-4">
                <div class="w-32">
                    <div class="h-20 w-full bg-status-success rounded-lg shadow-md mb-2"></div>
                    <p class="text-xs text-center font-mono text-gray-600">Success</p>
                    <p class="text-xs text-center font-mono text-gray-400">#2fd36f</p>
                </div>
                <div class="w-32">
                    <div class="h-20 w-full bg-status-warning rounded-lg shadow-md mb-2"></div>
                    <p class="text-xs text-center font-mono text-gray-600">Warning</p>
                    <p class="text-xs text-center font-mono text-gray-400">#ed8a0a</p>
                </div>
                <div class="w-32">
                    <div class="h-20 w-full bg-status-error rounded-lg shadow-md mb-2"></div>
                    <p class="text-xs text-center font-mono text-gray-600">Error</p>
                    <p class="text-xs text-center font-mono text-gray-400">#f54141</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Components -->
    <div class="mt-8">
        <h4 class="text-gray-600 text-xl font-medium border-b pb-2 mb-4">Vue Components</h4>

        <div class="mb-6">
            <h5 class="text-sm font-semibold text-gray-500 mb-4 uppercase tracking-wider">Buttons (AppButton.vue)</h5>

            <div class="flex flex-wrap items-center gap-4 p-6 bg-white rounded-lg shadow">
                <!-- Primary -->
                <div class="text-center">
                    <app-button type="primary">Primary Button</app-button>
                    <p class="mt-2 text-xs text-gray-500 font-mono">type="primary"</p>
                </div>

                <!-- Secondary -->
                <div class="text-center">
                    <app-button type="secondary">Secondary Button</app-button>
                    <p class="mt-2 text-xs text-gray-500 font-mono">type="secondary"</p>
                </div>

                <!-- Success -->
                <div class="text-center">
                    <app-button type="success">Success Button</app-button>
                    <p class="mt-2 text-xs text-gray-500 font-mono">type="success"</p>
                </div>

                <!-- Warning -->
                <div class="text-center">
                    <app-button type="warning">Warning Button</app-button>
                    <p class="mt-2 text-xs text-gray-500 font-mono">type="warning"</p>
                </div>

                <!-- Error -->
                <div class="text-center">
                    <app-button type="error">Error Button</app-button>
                    <p class="mt-2 text-xs text-gray-500 font-mono">type="error"</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
