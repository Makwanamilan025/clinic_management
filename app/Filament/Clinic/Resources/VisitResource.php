<?php

namespace App\Filament\Clinic\Resources;

use App\Filament\Clinic\Resources\VisitResource\Pages;
use App\Filament\Clinic\Resources\VisitResource\RelationManagers;
use App\Models\Visit;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Patient;

class VisitResource extends Resource
{
    protected static ?string $model = Visit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('patient_info')
                ->label('Patient')
                ->sortable()
                ->searchable()
                ->searchable(query: function (Builder $query, string $search): Builder {
                    return $query->whereHas('patient', function (Builder $subQuery) use ($search) {
                        $subQuery->where('first_name', 'like', "%{$search}%")
                                 ->orWhere('phone', 'like', "%{$search}%");
                    });
                }),
                TextColumn::make('visit_date')->date()->sortable(),
                TextColumn::make('notes')->limit(50)->tooltip(fn ($record) => $record->notes),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

        public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('patient_id')
                ->label('Patient')
                ->relationship('patient', titleAttribute: 'first_name' )
                ->searchable()
                ->preload()
                ->default(request('patient_id'))
                ->disabled(fn () => request()->has('patient_id'))
                ->getOptionLabelFromRecordUsing(fn (Patient $record) => "{$record->first_name} {$record->last_name} ({$record->phone})")
                ->relationship('patient', 'first_name')
                ->placeholder('Select a patient')
                ->required(),

                DatePicker::make('visit_date')
                    ->required(),

                Textarea::make('notes')
                    ->label('Visit Notes'),
            ]);
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisits::route('/'),
            'create' => Pages\CreateVisit::route('/create'),
            'edit' => Pages\EditVisit::route('/{record}/edit'),
        ];
    }

        public static function mutateFormDataBeforeCreate(array $data): array
    {
        if (request()->has('patient_id')) {
            $data['patient_id'] = request('patient_id');
        }

        return $data;
    }
}
