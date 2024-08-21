<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurMissionResource\Pages;
use App\Filament\Resources\OurMissionResource\RelationManagers;
use App\Models\OurMission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OurMissionResource extends Resource
{
    protected static ?string $model = OurMission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Textarea::make('content')->autosize()
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('mission_points')->autosize()
                    ->required(),
                Forms\Components\TextInput::make('ceo_name')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('ceo_title')
                    ->required()
                    ->maxLength(191),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ceo_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ceo_title')
                    ->searchable(),
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
            'index' => Pages\ListOurMissions::route('/'),
            'create' => Pages\CreateOurMission::route('/create'),
            'edit' => Pages\EditOurMission::route('/{record}/edit'),
        ];
    }
}
