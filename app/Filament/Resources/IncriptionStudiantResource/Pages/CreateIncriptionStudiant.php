<?php

namespace App\Filament\Resources\IncriptionStudiantResource\Pages;

use App\Filament\Resources\IncriptionStudiantResource;
use App\Models\Course;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIncriptionStudiant extends CreateRecord
{
    protected static string $resource = IncriptionStudiantResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $ticket = Course::find($data['course_id']);

        $ticket->cupos -= 1;
        $ticket->save();

        return $data;
    }
}
