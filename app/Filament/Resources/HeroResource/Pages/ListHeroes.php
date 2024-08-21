<?php

namespace App\Filament\Resources\HeroResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use App\Filament\Resources\HeroResource;
use Filament\Resources\Pages\ListRecords;

class ListHeroes extends ListRecords
{
    protected static string $resource = HeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('downloadQrCode')
                ->label('Download QR Code')
                ->url(route('downloadQrCode'))
                ->openUrlInNewTab(),
        ];
    }
}
