<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('cover')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('project')
                    ->visibility('public')
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('nama_projek')
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('informasi')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('fasilitas')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('lokasi')
                    ->helperText('isilah lokasi dengan embed dari google maps dan width nya diubah menjadi 100%')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('pin')
                    ->label('Pin Project')
                    ->helperText('Aktifkan untuk menandai project ini sebagai pin pada halaman utama')
                    ->default(false)
                    ->columnSpanFull(),
            ]);
    }
}
