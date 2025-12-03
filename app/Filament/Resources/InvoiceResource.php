<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
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
                            ->label('Client Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., John Doe or Acme Corp'),
                        Forms\Components\TextInput::make('client_email')
                            ->label('Email Address')
                            ->email()
                            ->maxLength(255)
                            ->placeholder('client@example.com'),
                        Forms\Components\TextInput::make('client_phone')
                            ->label('Phone Number')
                            ->tel()
                            ->maxLength(20)
                            ->placeholder('+234 XXX XXX XXXX'),
                        Forms\Components\Textarea::make('client_address')
                            ->label('Address')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Full address including city and state'),
                    ])
                    ->columns(2),

                Fieldset::make('Invoice Details')
                    ->schema([
                        Forms\Components\TextInput::make('invoice_number')
                            ->label('Invoice Number')
                            ->required()
                            ->maxLength(191)
                            ->disabled(fn ($record) => $record !== null)
                            ->dehydrated(fn ($record) => $record === null)
                            ->helperText('Auto-generated on creation'),
                        Forms\Components\DatePicker::make('date')
                            ->label('Invoice Date')
                            ->required()
                            ->default(now())
                            ->native(false),
                        Forms\Components\DatePicker::make('due_date')
                            ->label('Due Date')
                            ->required()
                            ->default(now()->addDays(30))
                            ->native(false)
                            ->minDate(now()),
                        Select::make('status')
                            ->label('Status')
                            ->options(Invoice::STATUSES)
                            ->default('draft')
                            ->required()
                            ->native(false),
                        Select::make('payment_method')
                            ->label('Payment Method')
                            ->options(Invoice::PAYMENT_METHODS)
                            ->default('bank_transfer')
                            ->native(false),
                        Forms\Components\TextInput::make('payment_terms')
                            ->label('Payment Terms')
                            ->numeric()
                            ->default(30)
                            ->suffix('days')
                            ->minValue(1)
                            ->required()
                            ->helperText('Number of days until payment is due'),
                    ])
                    ->columns(2),

                Repeater::make('items')
                    ->label('Invoice Items')
                    ->relationship('items')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Item Name')
                                    ->required()
                                    ->placeholder('e.g., Web Development')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('quantity')
                                    ->label('Qty')
                                    ->numeric()
                                    ->default(1)
                                    ->minValue(0.01)
                                    ->maxValue(99999999.99)
                                    ->required()
                                    ->columnSpan(1)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Set $set, Get $get, $state) {
                                        $unitPriceRaw = $get('unit_price') ?? '0';
                                        $unitPriceClean = preg_replace('/[^0-9.]/', '', strval($unitPriceRaw));
                                        $unitPrice = floatval($unitPriceClean);
                                        $quantity = floatval($state ?? 0);
                                        $set('subtotal', round($unitPrice * $quantity, 2));
                                    }),

                                Forms\Components\TextInput::make('unit_price')
                                    ->label('Unit Price')
                                    ->required()
                                    ->mask(RawJs::make('$money($input)'))
                                    ->prefix('₦')
                                    ->numeric()
                                    ->minValue(0)
                                    ->maxValue(9999999999.99)
                                    ->columnSpan(1)
                                    ->live(onBlur: true)
                                    ->stripCharacters([',', '₦', ' '])
                                    ->placeholder('0.00')
                                    ->afterStateUpdated(function (Set $set, Get $get, $state) {
                                        $unitPriceClean = preg_replace('/[^0-9.]/', '', strval($state ?? '0'));
                                        $unitPrice = floatval($unitPriceClean);
                                        $quantity = floatval($get('quantity') ?? 0);
                                        $set('subtotal', round($unitPrice * $quantity, 2));
                                    }),

                                Forms\Components\TextInput::make('subtotal')
                                    ->label('Subtotal')
                                    ->disabled()
                                    ->prefix('₦')
                                    ->mask(RawJs::make('$money($input)'))
                                    ->numeric()
                                    ->columnSpanFull()
                                    ->dehydrated(false)
                                    ->placeholder('0.00'),

                                Forms\Components\Textarea::make('description')
                                    ->label('Description')
                                    ->rows(2)
                                    ->placeholder('Optional details...')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->grid([
                        'sm' => 1,
                        'md' => 2,
                        'xl' => 3,
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'New Item')
                    ->collapsed()
                    ->collapsible()
                    ->cloneable()
                    ->defaultItems(1)
                    ->reorderable()
                    ->addActionLabel('Add Item')
                    ->deleteAction(
                        fn ($action) => $action->requiresConfirmation()
                    )
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (Set $set, Get $get) {
                        self::updateInvoiceTotals($set, $get);
                    })
                    ->columnSpanFull(),

                Fieldset::make('Payment Details')
                    ->schema([
                        Forms\Components\TextInput::make('subtotal')
                            ->label('Subtotal')
                            ->prefix('₦')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->disabled()
                            ->dehydrated(true)
                            ->stripCharacters([',', '₦', ' '])
                            ->helperText('Auto-calculated from items')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('discount')
                            ->label('Discount')
                            ->prefix('₦')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->maxValue(9999999999.99)
                            ->stripCharacters([',', '₦', ' '])
                            ->columnSpan(1)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, Get $get) {
                                self::updateInvoiceTotals($set, $get);
                            }),

                        Forms\Components\TextInput::make('tax_rate')
                            ->label('Tax Rate')
                            ->suffix('%')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->maxValue(100)
                            ->columnSpan(1)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, Get $get) {
                                self::updateInvoiceTotals($set, $get);
                            }),

                        Forms\Components\TextInput::make('tax_amount')
                            ->label('Tax Amount')
                            ->prefix('₦')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->disabled()
                            ->dehydrated(true)
                            ->stripCharacters([',', '₦', ' '])
                            ->helperText('Auto-calculated')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('total_amount')
                            ->label('Total Amount')
                            ->prefix('₦')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->disabled()
                            ->dehydrated(true)
                            ->stripCharacters([',', '₦', ' '])
                            ->helperText('Auto-calculated')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('deposit')
                            ->label('Deposit / Amount Paid')
                            ->prefix('₦')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->maxValue(9999999999.99)
                            ->stripCharacters([',', '₦', ' '])
                            ->columnSpan(1)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, Get $get) {
                                self::updateInvoiceTotals($set, $get);
                            }),

                        Forms\Components\TextInput::make('balance_due')
                            ->label('Balance Due')
                            ->prefix('₦')
                            ->mask(RawJs::make('$money($input)'))
                            ->numeric()
                            ->disabled()
                            ->dehydrated(true)
                            ->stripCharacters([',', '₦', ' '])
                            ->helperText('Auto-calculated')
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Fieldset::make('Banking Information')
                    ->schema([
                        Forms\Components\TextInput::make('bank_name')
                            ->label('Bank Name')
                            ->default('Access Bank')
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('account_name')
                            ->label('Account Name')
                            ->default('Devcentric Studio Ltd.')
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('account_number')
                            ->label('Account Number')
                            ->maxLength(20)
                            ->columnSpan(1),
                    ])
                    ->columns(3),

                Fieldset::make('Notes & Additional Information')
                    ->schema([
                        RichEditor::make('notes')
                            ->label('Internal Notes')
                            ->toolbarButtons([
                                'bold',
                                'bulletList',
                                'italic',
                                'orderedList',
                                'redo',
                                'undo',
                            ])
                            ->columnSpan(1),
                        RichEditor::make('payment_instructions')
                            ->label('Payment Instructions')
                            ->toolbarButtons([
                                'bold',
                                'bulletList',
                                'italic',
                                'orderedList',
                                'redo',
                                'undo',
                            ])
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
                    ->searchable()
                    ->copyable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('client_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->date()
                    ->sortable()
                    ->color(fn (Invoice $record): string => 
                        $record->isOverdue() ? 'danger' : 'success'
                    ),
                Tables\Columns\TextColumn::make('total_amount')
                    ->money('NGN')
                    ->sortable(),
                Tables\Columns\TextColumn::make('balance_due')
                    ->money('NGN')
                    ->sortable()
                    ->color(fn (Invoice $record): string => 
                        $record->balance_due > 0 ? 'danger' : 'success'
                    ),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'sent' => 'warning',
                        'paid' => 'success',
                        'overdue' => 'danger',
                        'partially_paid' => 'info',
                        'cancelled' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string =>
                        Invoice::STATUSES[$state] ?? ucfirst($state)
                    ),
                Tables\Columns\TextColumn::make('client_email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('client_phone')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('subtotal')
                    ->numeric()
                    ->money('NGN')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('discount')
                    ->numeric()
                    ->money('NGN')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tax_rate')
                    ->numeric()
                    ->suffix('%')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tax_amount')
                    ->numeric()
                    ->money('NGN')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deposit')
                    ->numeric()
                    ->money('NGN')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('payment_method')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('payment_terms')
                    ->numeric()
                    ->suffix(' days')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('bank_name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('account_name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('account_number')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

    protected static function updateInvoiceTotals(Set $set, Get $get): void
    {
        // Calculate subtotal from all items
        $items = $get('items') ?? [];
        $subtotal = 0;

        foreach ($items as $item) {
            $quantity = floatval($item['quantity'] ?? 0);
            // Strip formatting from unit_price
            $unitPriceRaw = $item['unit_price'] ?? '0';
            $unitPriceClean = preg_replace('/[^0-9.]/', '', strval($unitPriceRaw));
            $unitPrice = floatval($unitPriceClean);
            $subtotal += $quantity * $unitPrice;
        }

        // Get other values and strip formatting
        $discountRaw = $get('discount') ?? '0';
        $discountClean = preg_replace('/[^0-9.]/', '', strval($discountRaw));
        $discount = floatval($discountClean);

        $taxRate = floatval($get('tax_rate') ?? 0);

        $depositRaw = $get('deposit') ?? '0';
        $depositClean = preg_replace('/[^0-9.]/', '', strval($depositRaw));
        $deposit = floatval($depositClean);

        // Calculate tax and total
        $taxableAmount = $subtotal - $discount;
        $taxAmount = round($taxableAmount * ($taxRate / 100), 2);
        $totalAmount = round($taxableAmount + $taxAmount, 2);
        $balanceDue = round($totalAmount - $deposit, 2);

        // Update all calculated fields
        $set('subtotal', round($subtotal, 2));
        $set('tax_amount', $taxAmount);
        $set('total_amount', $totalAmount);
        $set('balance_due', $balanceDue);
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
