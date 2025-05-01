<?php

namespace App\Filament\Clinic\Resources\PatientResource\Widgets;

use Filament\Widgets\Widget;

class PatientProfileOverview extends Widget
{
    protected static string $view = 'filament.clinic.widgets.patient-profile-overview';

    public $record;

    protected function getViewData(): array
    {
        $visits = $this->record->visits()
            ->orderBy('visit_date')
            ->get()
            ->groupBy(fn($visit) => \Carbon\Carbon::parse($visit->visit_date)->format('Y-m-d'));

        $visitDates = $visits->keys()->map(fn($date) => \Carbon\Carbon::parse($date)->format('d M'))->toArray();
        $visitCounts = $visits->map(fn($group) => $group->count())->values()->toArray();

        return [
            'patient' => $this->record,
            'visitDates' => $visitDates,
            'visitCounts' => $visitCounts,
        ];
    }

    public static function canView(): bool
    {
        return true;
    }
}
