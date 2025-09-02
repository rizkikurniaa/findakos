<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required(),
                TextInput::make('boarding_house_id')
                    ->required()
                    ->numeric(),
                TextInput::make('room_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone_nummber')
                    ->tel()
                    ->required(),
                Select::make('payment_method')
                    ->options(['down_payment' => 'Down payment', 'full_payment' => 'Full payment']),
                TextInput::make('payment_status'),
                DatePicker::make('start_date')
                    ->required(),
                TextInput::make('duration')
                    ->required()
                    ->numeric(),
                TextInput::make('total_amount')
                    ->numeric(),
                DatePicker::make('transaction_date'),
            ]);
    }
}
