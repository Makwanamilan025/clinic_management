<?php

namespace App\Filament\Clinic\Resources\PatientResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;


class VisitRelationManager extends RelationManager
{
    protected static string $relationship = 'visits';

    protected static ?string $recordTitleAttribute = 'visit_date';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('visit_date')
                    ->label('Visit Date')
                    ->date('d M Y'),

                Tables\Columns\TextColumn::make('notes')
                    ->limit(40)
                    ->wrap()
                    ->tooltip(fn ($record) => $record->notes),

                Tables\Columns\TextColumn::make('created_at')
                    ->since(),
            ])
            ->headerActions([
                Action::make('Create Visit')
                ->label('Create Visit')
                ->url(fn ($livewire) => route('filament.clinic.resources.visits.create', [
                    'patient_id' => $livewire->ownerRecord->getKey(), 
                ]))
                ->icon('heroicon-o-plus')
                ->color('primary'),
            ])
            ->actions([])
            ->bulkActions([]);
    }
}
