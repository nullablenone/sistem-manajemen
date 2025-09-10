<x-guest-layout>

    {{-- CATATAN LOGIN DITAMBAHKAN DI SINI --}}
    <div class="mb-4 rounded-md bg-blue-50 p-4 text-sm text-blue-800" role="alert">
        <p class="font-bold">Informasi Akun Demo:</p>
        <ul class="mt-2 list-inside list-disc">
            <li>
                <strong>Login sebagai Admin:</strong>
                <ul class="list-inside pl-4">
                    <li>Email: <code>admin@admin.test</code></li>
                    <li>Password: <code>admin@admin.test</code></li>
                </ul>
            </li>
            <li class="mt-2">
                Untuk login sebagai <strong>Super Admin</strong>, silakan hubungi developer.
            </li>
        </ul>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
