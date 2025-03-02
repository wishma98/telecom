<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight text-center">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-image: url('{{ asset('image/BG-footer.jpg') }}');">
        <div class="absolute inset-0 mt-[11%] h-[135.4vh] bg-black bg-opacity-30 z-10"></div>
        <div class="relative z-30 container mx-auto px-4 sm:px-6 lg:px-8 mt-[10%]">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
                <!-- Update Profile Information Section -->
                <div class="p-6 sm:p-8 bg-white shadow-lg rounded-xl border border-gray-100">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password Section -->
                <div class="p-6 sm:p-8 bg-white shadow-lg rounded-xl border border-gray-100">
                    <div class="max-w-xl mx-auto">

                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account Section -->
                <div class="p-6 sm:p-8 bg-white shadow-lg rounded-xl border border-gray-100">
                    <div class="max-w-xl mx-auto">

                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>