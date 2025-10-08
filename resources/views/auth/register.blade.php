<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-black via-indigo-900 to-gray-950 p-6">
        <div class="backdrop-blur-lg bg-white/10 dark:bg-gray-800/40 border border-white/20 rounded-2xl shadow-2xl w-full max-w-md p-10 text-gray-100">
            <!-- Judul -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Create Account</h1>
                <p class="text-gray-300 text-sm">Isi detailmu untuk memulai perjalanan AI</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-gray-200" />
                    <x-text-input id="name" placeholder="Your full name"
                        class="block mt-1 w-full rounded-lg border-gray-600 bg-gray-900/50 text-gray-100 placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-400/30"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-200" />
                    <x-text-input id="email" placeholder="Your email address"
                        class="block mt-1 w-full rounded-lg border-gray-600 bg-gray-900/50 text-gray-100 placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-400/30"
                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-200" />
                    <x-text-input id="password" placeholder="Choose a password"
                        class="block mt-1 w-full rounded-lg border-gray-600 bg-gray-900/50 text-gray-100 placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-400/30"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-200" />
                    <x-text-input id="password_confirmation" placeholder="Confirm your password"
                        class="block mt-1 w-full rounded-lg border-gray-600 bg-gray-900/50 text-gray-100 placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-400/30"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
                </div>

                <!-- Submit Button -->
                <x-primary-button
                    class="w-full justify-center bg-blue-600 hover:bg-blue-700 rounded-lg py-3 text-lg transition transform hover:scale-[1.02]">
                    {{ __('Register') }}
                </x-primary-button>

                <!-- Login Link -->
                <p class="mt-8 text-center text-sm text-gray-400">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-medium">
                        Log in
                    </a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
