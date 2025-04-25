<x-filament::page>
    <div class="space-y-6">
        <x-filament::card>
            <h2 class="text-xl font-semibold">Patient Details</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Full Name</p>
                    <p>{{ $record->first_name }} {{ $record->last_name }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-500">Email</p>
                    <p>{{ $record->email }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-500">Date of Birth</p>
                    <p>{{ $record->date_of_birth->format('d/m/Y') }} ({{ $record->date_of_birth->age }} years)</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-500">Gender</p>
                    <p>{{ ucfirst($record->gender) }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-500">Phone</p>
                    <p>{{ $record->phone ?? 'Not provided' }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-500">Blood Type</p>
                    <p>{{ $record->blood_type ?? 'Unknown' }}</p>
                </div>

                <div class="md:col-span-2">
                    <p class="text-sm font-medium text-gray-500">Address</p>
                    <p>{{ $record->address ?? 'Not provided' }}</p>
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
    </div>
</x-filament::page>