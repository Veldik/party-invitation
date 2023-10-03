<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestResource\Pages;
use App\Filament\Resources\GuestResource\RelationManagers;
use App\Models\Event;
use App\Models\Guest;
use Faker\Provider\Text;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $modelLabel = 'host';
    protected static ?string $pluralModelLabel = 'hosté';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Jméno')
                    ->placeholder('Jiří Folta')
                    ->required(),

                TextInput::make('addressing')
                    ->label('Oslovení')
                    ->placeholder('Vážený pane profesore')
                    ->required(),

                TextInput::make('email')
                    ->label('E-mail')
                    ->placeholder('folta@ghrabuvka.cz')
                    ->required(),

                Select::make('event_id')
                    ->label('Událost')
                    ->options(Event::all()->pluck('name', 'id'))
                    ->searchable()

                /*
                Placeholder::make('created_at')
                    ->label('Čas vytvoření')
                    ->hiddenOn('create')
                    ->content(fn(?Guest $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Čas poslední úpravy')
                    ->hiddenOn('create')
                    ->content(fn(?Guest $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                */
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Jméno')
                    ->searchable()
                    ->sortable()
                ->description(fn(Guest $record) => $record->addressing),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->url(fn(Guest $record) => "mailto:{$record->email}"),

                TextColumn::make('event.name')->label('Událost'),
                TextColumn::make('status')->label('Status')->badge(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('event_id')
                    ->label('Událost')
                    ->options(Event::all()->pluck('name', 'id'))
                    ->default(Event::active()->first()?->id)
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\Action::make('invite')
                    ->label('Poslat pozvánku')
                    ->hidden(fn(Guest $record) => $record->invitation_sent_at !== null)
                    ->icon('heroicon-o-envelope')
                    ->color('success')
                    ->requiresConfirmation()
                ->action(fn(Guest $record) => $record->sendInvitation()),


                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // TODO: fix it to work
            //AuditsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGuests::route('/'),
            'create' => Pages\CreateGuest::route('/create'),
            'edit' => Pages\EditGuest::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
