<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;


class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $modelLabel = 'událost';
    protected static ?string $pluralModelLabel = 'události';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Název'),
                TextInput::make('description')->required()->label('Popis'),
                DateTimePicker::make('start')->required()->label('Začátek'),
                DateTimePicker::make('end')->required()->label('Konec'),
                TextInput::make('invitation_letter')->required()->label('Pozvánka'),
                TextInput::make('location')->required()->label('Místo'),
                TextInput::make('lat')->required()->label('Zeměpisná šířka'),
                TextInput::make('lng')->required()->label('Zeměpisná délka'),
                ColorPicker::make('color')->required()->label('Barva'),
                Checkbox::make('is_active')->label('Aktivní'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()
                    ->description(fn(Event $event) => $event->description)
                    ->label('Název'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //TODO: fix audits
            //AuditsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
