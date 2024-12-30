<?php

namespace App\Filament\Resources\IncriptionStudiantResource\Pages;

use App\Filament\Resources\IncriptionStudiantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIncriptionStudiants extends ListRecords
{
    protected static string $resource = IncriptionStudiantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
