<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationGroup = 'Finance';

    protected static ?int $navigationSort = 10;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', '!=', 'paid')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', 'overdue')->count() > 0
            ? 'danger'
            : 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Client Information')
                    ->schema([
                        Forms\Components\TextInput::make('client_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('client_email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('client_phone')
                            ->tel()
                            ->maxLength(20),
                        Forms\Components\Textarea::make('client_address')
                            ->rows(3)
                            ->maxLength(500),
                    ])
                    ->columns(2),

                Fieldset::make('Invoice Details')
                    ->schema([
                        Forms\Components\TextInput::make('invoice_number')
                            ->required()
                            ->maxLength(191)
                            ->disabled(fn ($record) => $record !== null)
                            ->dehydrated(fn ($record) => $record === null),
                        Forms\Components\DatePicker::make('date')
                            ->label('Invoice Date')
                            ->required()
                            ->default(now()),
                        Forms\Components\DatePicker::make('due_date')
                            ->required()
                            ->default(now()->addDays(30)),
                        Select::make('status')
                            ->options(array_combine(
                                array_keys(Invoice::STATUSES),
                                array_values(Invoice::STATUSES)
                            ))
                            ->default('draft')
                            ->required(),
                        Select::make('payment_method')
                            ->options(array_combine(
                                array_keys(Invoice::PAYMENT_METHODS),
                                array_values(Invoice::PAYMENT_METHODS)
                            ))
                            ->default('bank_transfer'),
                        Forms\Components\TextInput::make('payment_terms')
                            ->numeric()
                            ->default(30)
                            ->suffix('days')
                            ->required(),
                    ])
                    ->columns(2),

                Fieldset::make('Invoice Items')
                    ->schema([
                        Repeater::make('items')
                            ->relationship('items')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->columnSpan(3),
                                Forms\Components\Textarea::make('description')
                                    ->rows(2)
                                    ->columnSpan(3),
                                Forms\Components\TextInput::make('quantity')
                                    ->numeric()
                                    ->default(1)
                                    ->minValue(0.01)
                                    ->required()
                                    ->columnSpan(1)
                                    ->live()
                                    ->afterStateUpdated(function (Set $set, Get $get, $state) {
                                        $unitPrice = floatval($get('unit_price') ?? 0);
                                        $quantity = floatval($state ?? 0);
                                        $set('subtotal', $unitPrice * $quantity);
                                    }),
                                Forms\Components\TextInput::make('unit_price')
                                    ->required()
                                    ->mask(RawJs::make('$money($input)'))
                                    ->prefix('₦')
                                    ->numeric()
                                    ->columnSpan(1)
                                    ->live()
                                    ->stripCharacters(',')
                                    ->afterStateUpdated(function (Set $set, Get $get, $state) {
                                        $unitPrice = floatval($state ?? 0);
                                        $quantity = floatval($get('quantity') ?? 0);
                                        $set('subtotal', $unitPrice * $quantity);
                                    }),
                                Forms\Components\TextInput::make('subtotal')
                                    ->disabled()
                                    ->prefix('₦')
                                    ->mask(RawJs::make('$money($input)'))
                                    ->numeric()
                                    ->columnSpan(1)
                                    ->dehydrated(false),
                            ])
                            ->columns(3)
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                            ->collapsible()
                            ->defaultItems(1)
                            ->reorderable(false)
                            ->required()
                            ->live(),
                    ]),

                Fieldset::make('Payment Details')
                    ->schema([
                        Forms\Components\TextInput::make('subtotal')
                            ->prefix('₦')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->disabled()
                            ->dehydrated(true)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('discount')
                            ->prefix('₦')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->default(0)
                            ->stripCharacters(',')
                            ->columnSpan(1)
                            ->live()
                            ->afterStateUpdated(function (Set $set, Get $get) {
                                $subtotal = floatval($get('subtotal') ?? 0);
                                $discount = floatval($get('discount') ?? 0);
                                $taxRate = floatval($get('tax_rate') ?? 0);
                                
                                $taxableAmount = $subtotal - $discount;
                                $taxAmount = $taxableAmount * ($taxRate / 100);
                                $totalAmount = $taxableAmount + $taxAmount;
                                
                                $set('tax_amount', $taxAmount);
                                $set('total_amount', $totalAmount);
                                
                                // Update balance due
                                $deposit = floatval($get('deposit') ?? 0);
                                $set('balance_due', $totalAmount - $deposit);
                            }),
                        Forms\Components\TextInput::make('tax_rate')
                            ->suffix('%')
                            ->numeric()
                            ->default(0)
                            ->columnSpan(1)
                            ->live()
                            ->afterStateUpdated(function (Set $set, Get $get) {
                                $subtotal = floatval($get('subtotal') ?? 0);
                                $discount = floatval($get('discount') ?? 0);
                                $taxRate = floatval($get('tax_rate') ?? 0);
                                
                                $taxableAmount = $subtotal - $discount;
                                $taxAmount = $taxableAmount * ($taxRate / 100);
                                
                                $set('tax_amount', $taxAmount);
                                $set('total_amount', $taxableAmount + $taxAmount);
                                
                                // Update balance due
                                $deposit = floatval($get('deposit') ?? 0);
                                $set('balance_due', ($taxableAmount + $taxAmount) - $deposit);
                            }),
                        Forms\Components\TextInput::make('tax_amount')
                            ->prefix('₦')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->disabled()
                            ->dehydrated(true)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('total_amount')
                            ->prefix('₦')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->disabled()
                            ->dehydrated(true)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('deposit')
                            ->prefix('₦')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->default(0)
                            ->stripCharacters(',')
                            ->columnSpan(1)
                            ->live()
                            ->afterStateUpdated(function (Set $set, Get $get) {
                                $totalAmount = floatval($get('total_amount') ?? 0);
                                $deposit = floatval($get('deposit') ?? 0);
                                $set('balance_due', $totalAmount - $deposit);
                            }),
                        Forms\Components\TextInput::make('balance_due')
                            ->prefix('₦')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->disabled()
                            ->dehydrated(true)
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Fieldset::make('Banking Information')
                    ->schema([
                        Forms\Components\TextInput::make('bank_name')
                            ->default('Access Bank')
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('account_name')
                            ->default('Devcentric Studio Ltd.')
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('account_number')
                            ->columnSpan(1),
                    ])
                    ->columns(3),

                Fieldset::make('Notes & Additional Information')
                    ->schema([
                        RichEditor::make('notes')
                            ->columnSpan(1),
                        RichEditor::make('payment_instructions')
                            ->columnSpan(1),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('invoice_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('client_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('client_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('client_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subtotal')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tax_rate')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tax_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deposit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('balance_due')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_terms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('bank_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('account_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('account_number')
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'view' => Pages\ViewInvoice::route('/{record}'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
