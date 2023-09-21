<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Tables;
use App\Models\Receipt;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\ReceiptResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ReceiptResource\RelationManagers;

class ReceiptResource extends Resource
{
    protected static ?string $model = Receipt::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('receipt_from')->required(),
                TextInput::make('payment_for')->required(),
                // TextInput::make('amount')->numeric(),
                TextInput::make('amount')->required()->mask(fn (Mask $mask) => $mask
                ->patternBlocks([
                    'money' => fn (Mask $mask) => $mask
                        ->numeric()
                        ->thousandsSeparator(',')
                        ->decimalSeparator('.'),
                ])
                ->pattern('₦money'),
            ),
                TextInput::make('deposit')->mask(fn (Mask $mask) => $mask
                ->patternBlocks([
                    'money' => fn (Mask $mask) => $mask
                        ->numeric()
                        ->thousandsSeparator(',')
                        ->decimalSeparator('.'),
                ])
                ->pattern('₦money'),
            ),
                TextInput::make('balance_due')->mask(fn (Mask $mask) => $mask
                ->patternBlocks([
                    'money' => fn (Mask $mask) => $mask
                        ->numeric()
                        ->thousandsSeparator(',')
                        ->decimalSeparator('.'),
                ])
                ->pattern('₦money'),
            ),
                DateTimePicker::make('date')->required(),
                Radio::make('payment_methods')
                ->options(Receipt::PAYMENT_METHODS)
                ->required(),
            ]);
    }





    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListReceipts::route('/'),
            'create' => Pages\CreateReceipt::route('/create'),
            'edit' => Pages\EditReceipt::route('/{record}/edit'),
        ];
    }
}
