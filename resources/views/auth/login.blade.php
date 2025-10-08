<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-black via-indigo-900 to-gray-950 p-6">
        <div class="backdrop-blur-lg bg-white/10 dark:bg-gray-800/40 border border-white/20 rounded-2xl shadow-2xl w-full max-w-md p-10 text-gray-100">
            <!-- Judul -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Welcome Back</h1>
                <p class="text-gray-300 text-sm">Masuk ke akunmu dan lanjutkan eksplorasi AI Kimia</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-200" />
                    <x-text-input id="email" placeholder="Enter your email"
                        class="block mt-1 w-full rounded-lg border-gray-600 bg-gray-900/50 text-gray-100 placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-400/30"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-200" />
                    <x-text-input id="password" placeholder="Enter your password"
                        class="block mt-1 w-full rounded-lg border-gray-600 bg-gray-900/50 text-gray-100 placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-400/30"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <!-- Remember Me + Forgot Password -->
                <div class="flex items-center justify-between text-sm">
                    <label for="remember_me" class="inline-flex items-center text-gray-300">
                        <input id="remember_me" type="checkbox"
                               class="rounded border-gray-500 bg-gray-700 text-blue-500 shadow-sm focus:ring-blue-400"
                               name="remember">
                        <span class="ml-2">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-blue-400 hover:text-blue-300 font-medium transition"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <x-primary-button
                    class="w-full justify-center bg-blue-600 hover:bg-blue-700 rounded-lg py-3 text-lg transition transform hover:scale-[1.02]">
                    {{ __('Log in') }}
                </x-primary-button>
            </form>

            <!-- Sign Up Link -->
            <p class="mt-8 text-center text-sm text-gray-400">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-medium">
                    Sign up
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
