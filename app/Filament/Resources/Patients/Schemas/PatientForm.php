<?php

namespace App\Filament\Resources\Patients\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PatientForm
{
     public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('date_of_birth')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Select::make('owner_id')
                    ->relationship('owner', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                        TextInput::make('email')
                        ->label('Email address')
                        ->required()
                        ->email()
                        ->maxLength(255),
                        
                        TextInput::make('phone')
                        ->label('Phone number')
                        ->tel()
                        ->required()


                    ])
                    ->required(),
                Select::make('type')
                    ->options([
                        'cat' => 'cat',
                        'dog' => 'dog',
                        'rabbit' => 'rabbit',
                    ])
                    ->required(),
            ]);
    }
}
