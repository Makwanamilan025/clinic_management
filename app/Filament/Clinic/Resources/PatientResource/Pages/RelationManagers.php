<?php

namespace App\Filament\Clinic\Resources\PatientResource\RelationManagers;

use App\Models\Patient;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\RelationManagers\RelationManager;

class SamePhonePatientsRelationManager extends RelationManager
{
    protected static string $relationship = 'samePhonePatients';

    protected static ?string $title = 'Patients with Same Mobile Number';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Patient Name')
                    ->formatStateUsing(fn (Patient $record) => "{$record->first_name} {$record->last_name}")
                    ->searchable(['first_name', 'last_name']),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('age')
                    ->label('Age')
                    ->state(fn (Patient $record) => $record->date_of_birth->age),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created Date')
                    ->dateTime('d/m/Y H:i'),

                Tables\Columns\TextColumn::make('gender')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'male' => 'primary',
                        'female' => 'pink',
                        default => 'gray',
                    }),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ]);
    }
}