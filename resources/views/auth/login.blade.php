<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-login-form />
</x-guest-layout>
