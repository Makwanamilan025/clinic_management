<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClinicResource\Pages;
use App\Filament\Resources\ClinicResource\RelationManagers;
use App\Models\Clinic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClinicResource extends Resource
{
    protected static ?string $model = Clinic::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $modelLabel = 'Clinic';

    protected static ?string $navigationLabel = 'Clinics';

    // protected static ?string $navigationGroup = 'Healthcare';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Clinic Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('address_1')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('address_2')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Operating Hours')
                    ->schema([
                        Forms\Components\TimePicker::make('opening_time')
                            ->required()
                            ->seconds(false)
                            ->displayFormat('h:i A'),

                        Forms\Components\TimePicker::make('closing_time')
                            ->after('opening_time')
                        ->helperText('Must be after opening time')
                            ->required()
                            ->seconds(false)
                            ->displayFormat('h:i A')
                            ->rules(['after:opening_time']),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('address_1')
                    ->searchable()
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->address_1),

                Tables\Columns\TextColumn::make('opening_time')
                    ->time('h:i A')
                    ->sortable(),

                Tables\Columns\TextColumn::make('closing_time')
                    ->time('h:i A')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
          ->filters([
    // Filter by operating status
    Tables\Filters\Filter::make('open_now')
        ->label('Currently Open Clinics')
        ->query(fn (Builder $query): Builder => $query
            ->whereTime('opening_time', '<=', now()->format('H:i:s'))
            ->whereTime('closing_time', '>=', now()->format('H:i:s'))
        ),

    // Filter by opening time range
    Tables\Filters\Filter::make('opening_hours')
        ->form([
            Forms\Components\TimePicker::make('from')
                ->label('Opens After')
                ->seconds(false),
            Forms\Components\TimePicker::make('until')
                ->label('Opens Before')
                ->seconds(false),
        ])
        ->query(function (Builder $query, array $data): Builder {
            return $query
                ->when($data['from'] ?? null,
                    fn (Builder $query, $time) => $query->where('opening_time', '>=', $time))
                ->when($data['until'] ?? null,
                    fn (Builder $query, $time) => $query->where('opening_time', '<=', $time));
        }),

    // Filter for clinics with secondary address
    Tables\Filters\TernaryFilter::make('has_secondary_address')
        ->label('Secondary Address')
        ->placeholder('All Clinics')
        ->trueLabel('With Secondary Address')
        ->falseLabel('Without Secondary Address')
        ->queries(
            true: fn (Builder $query) => $query->whereNotNull('address_2'),
            false: fn (Builder $query) => $query->whereNull('address_2'),
        ),

    // Corrected SelectFilter with proper array handling
    Tables\Filters\SelectFilter::make('opening_period')
        ->label('Opening Period')
        ->options([
            'morning' => 'Morning (6AM-12PM)',
            'afternoon' => 'Afternoon (12PM-5PM)',
            'evening' => 'Evening (5PM-12AM)',
        ])
        ->query(function (Builder $query, array $state): Builder {
            if (empty($state['value'])) {
                return $query;
            }

            $ranges = [
                'morning' => ['06:00:00', '12:00:00'],
                'afternoon' => ['12:00:00', '17:00:00'],
                'evening' => ['17:00:00', '23:59:59'],
            ];

            $value = $state['value'];

            if (!array_key_exists($value, $ranges)) {
                return $query;
            }

            return $query->whereBetween('opening_time', $ranges[$value]);
        }),
])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add relation managers here if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClinics::route('/'),
            'create' => Pages\CreateClinic::route('/create'),
            'edit' => Pages\EditClinic::route('/{record}/edit'),
        ];
    }
}