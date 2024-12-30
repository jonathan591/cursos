<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotificacionResource\Pages;
use App\Filament\Resources\NotificacionResource\RelationManagers;
use App\Models\Notificacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NotificacionResource extends Resource
{
    protected static ?string $model = Notificacion::class;

    protected static ?string $navigationIcon = 'heroicon-c-bell-alert';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationGroup = 'Cursos Incripcion';
    protected static ?string $modelLabel = 'Notificacion';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_id')
                    ->label('cursos')
                    ->relationship('course', 'titulo')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('incription_id')
                    ->label('Estudiantes')
                    ->relationship('incripciones', 'nombres')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course.titulo')
                 
                    ->sortable(),
                Tables\Columns\TextColumn::make('incripciones.nombres')
                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    
                ]),
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
            'index' => Pages\ListNotificacions::route('/'),
            'create' => Pages\CreateNotificacion::route('/create'),
            'edit' => Pages\EditNotificacion::route('/{record}/edit'),
        ];
    }
}
