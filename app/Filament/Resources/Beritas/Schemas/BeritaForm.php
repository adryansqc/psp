<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Utama')
                    ->components([
                        TextInput::make('judul')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Select::make('tipe')
                            ->label('Tipe')
                            ->options([
                                'berita' => 'Berita',
                                'acara' => 'Acara',
                            ])
                            ->default('berita')
                            ->required()
                            ->columnSpanFull()
                            ->native(false),

                        FileUpload::make('cover')
                            ->label('Cover')
                            ->image()
                            ->disk('public')
                            ->directory('berita/cover')
                            ->imageEditor()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Konten')
                    ->components([
                        RichEditor::make('konten')
                            ->label('Konten')
                            ->required()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('berita/konten')
                            ->fileAttachmentsVisibility('public')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
