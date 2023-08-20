<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Post';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // TextInput::make('title'),
                TextInput::make('title')
                ->reactive()
                ->afterStateUpdated(function (Closure $set, $state) {
                    $set('slug', Str::slug($state));
                })->required(),
                TextInput::make('slug')->required(),
                TextInput::make('description'),
                Select::make('category_id')->relationship('category', 'name'),
                Select::make('user_id')->relationship('user', 'name'),
                Toggle::make('is_visible'),
                FileUpload::make('cover_image')->columnSpan(2)->label('Cover Image')->preserveFilenames()->disk('public')->directory('post_images')->required(),
                RichEditor::make('content')->columnSpan(2),
                Textarea::make('keywords')->columnSpan(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image'),
                TextColumn::make('title'),
                TextColumn::make('categroy_id.name'),
                TextColumn::make('user.name'),
                ToggleColumn::make('is_visible'),
                TextColumn::make('created_at'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
