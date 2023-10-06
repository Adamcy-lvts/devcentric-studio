<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Receipt;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput\Mask;
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
                TextInput::make('received_from')->required(),
                TextInput::make('payment_for')->required(),
                // TextInput::make('amount')->numeric(),
                TextInput::make('amount')->required()->mask(
                    fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                                ->numeric()
                                ->thousandsSeparator(',')
                                ->decimalSeparator('.'),
                        ])
                        ->pattern('₦money'),
                ),
                TextInput::make('deposit')->mask(
                    fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                                ->numeric()
                                ->thousandsSeparator(',')
                                ->decimalSeparator('.'),
                        ])
                        ->pattern('₦money'),
                ),
                TextInput::make('balance_due')->mask(
                    fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                                ->numeric()
                                ->thousandsSeparator(',')
                                ->decimalSeparator('.'),
                        ])
                        ->pattern('₦money'),
                ),
                DateTimePicker::make('date')->required(),
                Radio::make('payment_method')
                    ->options(Receipt::PAYMENT_METHODS)
                    ->required(),
            ]);
    }





    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('received_from'),
                TextColumn::make('payment_for'),
                TextColumn::make('amount')->money('NGN', true),
                TextColumn::make('date')->date('d-M-y'),
                TextColumn::make('deposit')->money('NGN', true),
                TextColumn::make('balance_due')->money('NGN', true),

            ])
            ->filters([
                //
            ])
            ->actions([
            Action::make('view receipt')
                ->label('Receipt')
                ->url(fn (Receipt $record): string => route('filament.resources.receipts.view', $record)),
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
            'view' => Pages\ViewReceipt::route('/{record}/view-receipt')
        ];
    }
}
