@extends('admin.layouts.app')

@section('title', 'Settings')
@section('page-title', 'System Settings')
@section('page-description', 'Configure system settings and preferences.')

@section('page-actions')
    <button class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200">
        <i class="fas fa-save mr-2"></i>
        Save Changes
    </button>
@endsection

@section('content')
<!-- Settings Tabs -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="border-b border-gray-200">
        <nav class="flex -mb-px">
            <button class="py-4 px-6 border-b-2 border-primary-500 text-primary-600 font-medium text-sm">
                General
            </button>
            <button class="py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium text-sm">
                Email
            </button>
            <button class="py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium text-sm">
                Payment
            </button>
            <button class="py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium text-sm">
                Security
            </button>
            <button class="py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium text-sm">
                Notifications
            </button>
        </nav>
    </div>

    <!-- General Settings -->
    <div class="p-6">
        <form class="space-y-6">
            <!-- Site Information -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Site Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Site Name</label>
                        <input type="text" value="Rental Platform" 
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Site Email</label>
                        <input type="email" value="info@rentalplatform.com" 
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contact Phone</label>
                        <input type="tel" value="+1 234 567 8900" 
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                        <input type="text" value="123 Main St, City, State 12345" 
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    </div>
                </div>
            </div>

            <!-- Site Configuration -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Site Configuration</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Default Language</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option>English</option>
                            <option>Spanish</option>
                            <option>French</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Timezone</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option>UTC</option>
                            <option>EST</option>
                            <option>PST</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Currency</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option>USD ($)</option>
                            <option>EUR (€)</option>
                            <option>GBP (£)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date Format</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option>MM/DD/YYYY</option>
                            <option>DD/MM/YYYY</option>
                            <option>YYYY-MM-DD</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Maintenance Mode -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Maintenance Mode</h3>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <input type="checkbox" id="maintenance" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                        <label for="maintenance" class="ml-2 block text-sm text-gray-900">
                            Enable Maintenance Mode
                        </label>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Maintenance Message</label>
                        <textarea rows="3" 
                                  class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                  placeholder="Enter maintenance message...">We are currently performing scheduled maintenance. We'll be back shortly.</textarea>
                    </div>
                </div>
            </div>

            <!-- Registration Settings -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">User Registration</h3>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <input type="checkbox" id="allow_registration" checked class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                        <label for="allow_registration" class="ml-2 block text-sm text-gray-900">
                            Allow New User Registration
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="email_verification" checked class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                        <label for="email_verification" class="ml-2 block text-sm text-gray-900">
                            Require Email Verification
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="admin_approval" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                        <label for="admin_approval" class="ml-2 block text-sm text-gray-900">
                            Require Admin Approval for New Users
                        </label>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="pt-6 border-t border-gray-200">
                <div class="flex justify-end">
                    <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 transition-colors duration-200 mr-3">
                        Cancel
                    </button>
                    <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded-md hover:bg-primary-700 transition-colors duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- System Information -->
<div class="mt-8 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-medium text-gray-900 mb-4">System Information</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div>
            <p class="text-sm text-gray-500">Laravel Version</p>
            <p class="text-lg font-medium text-gray-900">12.44.0</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">PHP Version</p>
            <p class="text-lg font-medium text-gray-900">8.4.6</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Database</p>
            <p class="text-lg font-medium text-gray-900">MySQL</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Environment</p>
            <p class="text-lg font-medium text-gray-900">Local</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('nav button');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active classes from all tabs
            tabs.forEach(t => {
                t.classList.remove('border-primary-500', 'text-primary-600');
                t.classList.add('border-transparent', 'text-gray-500');
            });

            // Add active classes to clicked tab
            this.classList.remove('border-transparent', 'text-gray-500');
            this.classList.add('border-primary-500', 'text-primary-600');

            // Show alert for demo
            const tabName = this.textContent.trim();
            alert(`${tabName} tab clicked - This would show ${tabName} settings`);
        });
    });
});
</script>
@endpush
