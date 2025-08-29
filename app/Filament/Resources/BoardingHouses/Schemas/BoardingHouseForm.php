<?php

namespace App\Filament\Resources\BoardingHouses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Illuminate\Support\Str;
use Filament\Forms\Components\Repeater;

class BoardingHouseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('BoardingHouseTabs')
                    ->tabs([
                        Tab::make('Informasi Umum')
                            ->schema([
                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->directory('boarding_houses')
                                    ->required(),
                                TextInput::make('name')
                                    ->required()
                                    ->live(debounce: 500)
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('slug', Str::slug($state));
                                    }),
                                TextInput::make('slug')
                                    ->required(),
                                Select::make('city_id')
                                    ->relationship('city', 'name')
                                    ->required(),
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required(),
                                RichEditor::make('description')
                                    ->required(),
                                TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->prefix('IDR'),
                                Textarea::make('address')
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('Bonus Kos')
                            ->schema([
                                Repeater::make('bonuses')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->image()
                                            ->directory('bonuses')
                                            ->required(),
                                        TextInput::make('name')
                                            ->required(),
                                        TextInput::make('description')
                                            ->required(),
                                    ]),
                            ]),
                    ])
            ]);
    }
}
