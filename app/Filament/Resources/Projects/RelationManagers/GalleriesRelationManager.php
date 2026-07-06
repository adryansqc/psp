<?php

namespace App\Filament\Resources\Projects\RelationManagers;

use App\Models\GalleriesProject;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GalleriesRelationManager extends RelationManager
{
    protected static string $relationship = 'galleries';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Toggle::make('is_video')
                    ->label('Video?')
                    ->live()
                    ->default(false)
                    ->columnSpanFull(),

                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('galeri')
                    ->visibility('public')
                    ->columnSpanFull()
                    ->visible(fn(Get $get) => ! $get('is_video'))
                    ->required(fn(Get $get) => ! $get('is_video')),

                TextInput::make('video_url')
                    ->label('Link Video (Google Drive / YouTube)')
                    ->url()
                    ->placeholder('https://drive.google.com/file/d/xxxxx/view?usp=sharing')
                    ->helperText('Paste link share Google Drive (akses "Anyone with the link") atau link YouTube.')
                    ->columnSpanFull()
                    ->visible(fn(Get $get) => (bool) $get('is_video'))
                    ->required(fn(Get $get) => (bool) $get('is_video')),

                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->minValue(1)
                    ->default(function ($get) {
                        $projectId = $get('project_uuid');
                        return GalleriesProject::where('project_uuid', $projectId)
                            ->max('order') + 1;
                    })
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('gambar')
            ->reorderable('order')
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->imageHeight(40)
                    ->square()
                    ->defaultImageUrl(asset('assets/images/image-thumbnail.jpg'))
                    ->disk('public')
                    ->visibility('public')
                    ->searchable(),
                IconColumn::make('is_video')
                    ->label('Video?')
                    ->boolean(),
                TextColumn::make('video_url')
                    ->label('Link Video')
                    ->limit(30)
                    ->url(fn($record) => $record->video_url, shouldOpenInNewTab: true)
                    ->placeholder('Bukan video')
                    ->toggleable(),
                TextColumn::make('order')
                    ->label('Urutan'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('order', 'asc')
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
