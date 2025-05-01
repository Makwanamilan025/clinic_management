<x-filament::widget>
    <x-filament::card class="p-6 space-y-6">
        {{-- Patient Profile Section --}}
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-8 ">
            <div class="flex-1">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Patient Profile</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-700">
                    <div class="space-y-2">
                        <div><strong>Name:</strong> {{ $patient->first_name }} {{ $patient->last_name }}</div>
                        <div><strong>Gender:</strong> {{ ucfirst($patient->gender) }}</div>
                        <div><strong>Date of Birth:</strong> {{ $patient->date_of_birth->format('d/m/Y') }}</div>
                        <div><strong>Age:</strong> {{ $patient->date_of_birth->age }} years</div>
                    </div>
                    <div class="space-y-2">
                        <div><strong>Email:</strong> {{ $patient->email ?? 'N/A' }}</div>
                        <div><strong>Phone:</strong> {{ $patient->phone ?? 'N/A' }}</div>
                        <div><strong>Blood Type:</strong> {{ $patient->blood_type ?? 'Unknown' }}</div>
                        <div><strong>Address:</strong> {{ $patient->address ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>

        </div>

    </x-filament::card>

    <x-filament::card>
        <h2 class="text-xl font-semibold">System Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <p class="text-sm font-medium text-gray-500">Created At</p>
                <p>{{ $record->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Last Updated</p>
                <p>{{ $record->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>

{{-- Include ApexCharts --}}
@once
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @endpush
@endonce
