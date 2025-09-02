<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->directory('testimonials')
                    ->required()
                    ->columnSpan(2),
                Select::make('boarding_house_id')
                    ->relationship('boardingHouse', 'name')
                    ->columnSpan(2)
                    ->required(),
                Textarea::make('content')
                    ->columnSpan(2)
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5),
            ]);
    }
}
