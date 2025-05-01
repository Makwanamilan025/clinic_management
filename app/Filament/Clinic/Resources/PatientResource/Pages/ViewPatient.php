<?php

namespace App\Filament\Clinic\Resources\PatientResource\Pages;

use App\Filament\Clinic\Resources\PatientResource;
use App\Models\Patient;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Visit;
use Filament\Support\Enums\MaxWidth;
class ViewPatient extends ViewRecord
{
    protected static string $resource = PatientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Clinic\Resources\PatientResource\Widgets\PatientProfileOverview::class,
        ];
    }


    public function table(Table $table): Table
    {
        $currentPatient = $this->getRecord();

        return $table
            ->query(Visit::query()->where('patient_id', $currentPatient->id))
            ->columns([
                Tables\Columns\TextColumn::make('visit_date')
                    ->date('d/m/Y')
                    ->label('Visit Date'),

                Tables\Columns\TextColumn::make('doctor_name')
                    ->label('Doctor'),

                Tables\Columns\TextColumn::make('notes')
                    ->limit(50)
                    ->label('Visit Notes'),
            ])
            ->heading('Visit History')
            ->emptyStateHeading('No visits found');
    }

}