<x-filament-panels::auth-page action="login">
    <x-slot name="form">
        <x-filament::input name="email" label="Email Address" type="email" required autofocus />
        <x-filament::input name="password" label="Password" type="password" required />

        {{-- Add custom fields here if needed --}}
        {{-- <x-filament::input name="clinic_code" label="Clinic Code" required /> --}}
    </x-slot>
</x-filament-panels::auth-page>
