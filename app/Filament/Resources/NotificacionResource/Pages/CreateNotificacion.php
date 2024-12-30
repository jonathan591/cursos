<?php

namespace App\Filament\Resources\NotificacionResource\Pages;

use App\Filament\Resources\NotificacionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;
use App\Mail\mail as MailNotification;
use App\Models\Course;
use App\Models\IncriptionStudiant;
use Filament\Notifications\Notification;

class CreateNotificacion extends CreateRecord
{
    protected static string $resource = NotificacionResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
      
       $accion= $data['course_id'];

       $curso = Course::find($accion);
       $mensage= $curso->titulo."  ".$curso->descripcion." Fecha de inicioa :".$curso->fecha_inicio
       ."  cupos diponibles : ".$curso->cupos;
        $userAdmin = IncriptionStudiant::find($data['incription_id']);
        $dataToSend = array(
            'message' => $mensage,
            // 'name' => User::find($data['user_id'])->name,
           
        );
        Mail::to($userAdmin->correo)->send(new MailNotification($dataToSend));
        Notification::make()
            ->title('Notificacion envia')
            ->body($mensage)
            ->info()
            ->send();
    
      
        return $data;
    
    }

}
