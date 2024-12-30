<?php

namespace App\Filament\Resources\IncriptionStudiantResource\Pages;

use App\Filament\Resources\IncriptionStudiantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIncriptionStudiant extends EditRecord
{
    protected static string $resource = IncriptionStudiantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
