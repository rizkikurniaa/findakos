<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('boarding_house_id')
                    ->required()
                    ->numeric(),
                TextInput::make('photo')
                    ->required(),
                TextInput::make('content')
                    ->required(),
                TextInput::make('rating')
                    ->required()
                    ->numeric(),
            ]);
    }
}
