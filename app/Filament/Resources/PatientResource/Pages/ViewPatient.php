<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPatient extends ViewRecord
{
    protected static string $resource = PatientResource::class;

    // protected static string $view = 'Filament.Resources.PatientResource.Pages.view-patient';
    protected static string $view = 'patient.view-patient';


    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
    
}