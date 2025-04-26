<?php

namespace App\Filament\Admin\Resources\ClinicResource\Pages;

use App\Filament\Admin\Resources\ClinicResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClinic extends CreateRecord
{
    protected static string $resource = ClinicResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Clinic successfully created';
    }
}
