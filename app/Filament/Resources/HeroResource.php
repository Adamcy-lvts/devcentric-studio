<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Hero;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\HeroResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HeroResource\RelationManagers;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('cta_text')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('cta_link')
                    ->required()
                    ->maxLength(191),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                // Forms\Components\TextInput::make('headlines')
                //     ->required(),
                Repeater::make('headlines')
                    ->schema([
                        TextInput::make('line1')
                            ->required(),
                        TextInput::make('line2')
                            ->required(),
                        TextInput::make('line3')
                            ->required(),
                    ])
                    ->columnSpan('full')
                    ->collapsible()
                    ->defaultItems(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cta_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cta_link')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
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
            'index' => Pages\ListHeroes::route('/'),
            'create' => Pages\CreateHero::route('/create'),
            'edit' => Pages\EditHero::route('/{record}/edit'),
        ];
    }
}
