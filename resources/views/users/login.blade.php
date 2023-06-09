<x-layout>
    <x-card class="rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Login
        </h2>
        <p class="mb-4">Log into your account to post gigs</p>
    </header>

    <form action="/users/authenticate" method="POST">
        @csrf
        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >Email</label
            >
            <input
                type="email"
                class="border border-gray-200 rounded p-2 w-full"
                name="email"
                value="{{ old('email') }}"
            />
            @error('email')
            <div class="p text-red-500 text-xs p-2">{{ $message }}</div>
            @enderror
            <!-- Error Example -->
        </div>
        <div class="mb-6">
            <label
                for="password"
                class="inline-block text-lg mb-2"
            >
                Password
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password"
            />
            @error('password')
            <div class="p text-red-500 text-xs p-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-6">
            <button
                type="submit"
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
                Login
            </button>
        </div>

        <div class="mt-8">
            <p>
                Don't have an account yet?
                <a href="/register" class="text-laravel"
                    >Register</a
                >
            </p>
        </div>
    </form>
    </x-card>
</x-layout>

