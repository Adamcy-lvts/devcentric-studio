<?php

namespace App\Filament\Resources\OurMissionResource\Pages;

use App\Filament\Resources\OurMissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOurMissions extends ListRecords
{
    protected static string $resource = OurMissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
