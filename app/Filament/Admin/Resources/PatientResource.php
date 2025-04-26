<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PatientResource\Pages;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $modelLabel = 'Patient';

    protected static ?string $navigationLabel = 'Patients';

    // protected static ?string $navigationGroup = 'Healthcare';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal Information')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('John')
                            ->autofocus()
                            ->validationMessages([
                                'required' => 'First name is required',
                                'max' => 'Maximum 255 characters allowed',
                            ]),

                        Forms\Components\TextInput::make('last_name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Doe')
                            ->validationMessages([
                                'required' => 'Last name is required',
                                'max' => 'Maximum 255 characters allowed',
                            ]),

                        Forms\Components\DatePicker::make('date_of_birth')
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->maxDate(now())
                            ->placeholder('DD/MM/YYYY')
                            ->validationMessages([
                                'required' => 'Date of birth is required',
                                'max' => 'Date cannot be in the future',
                            ]),

                        Forms\Components\Select::make('gender')
                            ->required()
                            ->placeholder('Select gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other',
                            ])
                            ->validationMessages([
                                'required' => 'Please select a gender',
                            ]),
                    ])->columns(2),

                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->placeholder('patient@example.com')
                            ->unique(ignoreRecord: true, table: Patient::class, column: 'email', ignorable: fn ($record) => $record)
                            ->validationMessages([
                                'email' => 'Invalid email format',
                                'max' => 'Maximum 255 characters allowed',
                                'unique' => 'Email already exists',
                            ]),

                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(20)
                            ->placeholder('+1234567890')
                            ->validationMessages([
                                'tel' => 'Invalid phone number format',
                                'max' => 'Maximum 20 characters allowed',
                            ]),

                        Forms\Components\Textarea::make('address')
                            ->maxLength(65535)
                            ->placeholder('123 Main St, City, Country')
                            ->columnSpanFull()
                            ->validationMessages([
                                'max' => 'Address is too long',
                            ]),
                    ])->columns(2),

                Forms\Components\Section::make('Medical Information')
                    ->schema([
                        Forms\Components\Select::make('blood_type')
                            ->placeholder('Select blood type')
                            ->options([
                                'A+' => 'A+',
                                'A-' => 'A-',
                                'B+' => 'B+',
                                'B-' => 'B-',
                                'AB+' => 'AB+',
                                'AB-' => 'AB-',
                                'O+' => 'O+',
                                'O-' => 'O-',
                            ])
                            ->validationMessages([
                                'in' => 'Invalid blood type selected',
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Patient Name')
                    ->formatStateUsing(fn (Patient $record) => "{$record->first_name} {$record->last_name}")
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(query: function (Builder $query, string $direction) {
                        $query->orderBy('first_name', $direction)
                              ->orderBy('last_name', $direction);
                    }),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('age')
                    ->label('Age')
                    ->state(fn (Patient $record) => $record->date_of_birth->age)
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created Date')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('gender')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'male' => 'primary',
                        'female' => 'pink',
                        default => 'gray',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->placeholder('Not provided'),

                Tables\Columns\TextColumn::make('blood_type')
                    ->badge()
                    ->placeholder('Unknown')
                    ->color(fn (?string $state): string => match ($state) {
                        'A+', 'A-' => 'danger',
                        'B+', 'B-' => 'warning',
                        'AB+', 'AB-' => 'success',
                        'O+', 'O-' => 'info',
                        default => 'gray',
                    })
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('gender')
                    ->label('Filter by Gender')
                    ->placeholder('All Genders')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                        'other' => 'Other',
                    ]),

                Tables\Filters\SelectFilter::make('blood_type')
                    ->label('Filter by Blood Type')
                    ->placeholder('All Blood Types')
                    ->options([
                        'A+' => 'A+',
                        'A-' => 'A-',
                        'B+' => 'B+',
                        'B-' => 'B-',
                        'AB+' => 'AB+',
                        'AB-' => 'AB-',
                        'O+' => 'O+',
                        'O-' => 'O-',
                    ]),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->placeholder('From date'),
                        Forms\Components\DatePicker::make('created_until')
                            ->placeholder('Until date'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['created_from'],
                                fn (Builder $query, $date) => $query->whereDate('created_at', '>=', $date))
                            ->when($data['created_until'],
                                fn (Builder $query, $date) => $query->whereDate('created_at', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn (Patient $record): string => Pages\ViewPatient::getUrl(['record' => $record])),

                Tables\Actions\EditAction::make()
                    ->tooltip('Edit patient'),

                Tables\Actions\DeleteAction::make()
                    ->tooltip('Delete patient'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Delete selected'),
                ]),
            ])
            ->emptyStateHeading('No patients found')
            ->emptyStateDescription('Click the "Create patient" button to add a new patient')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Create patient'),
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'view' => Pages\ViewPatient::route('/{record}/view'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}