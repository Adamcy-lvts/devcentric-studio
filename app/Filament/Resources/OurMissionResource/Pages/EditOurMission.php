<?php

namespace App\Filament\Resources\OurMissionResource\Pages;

use App\Filament\Resources\OurMissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurMission extends EditRecord
{
    protected static string $resource = OurMissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
