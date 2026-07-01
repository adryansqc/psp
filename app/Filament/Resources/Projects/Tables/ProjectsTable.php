<?php

namespace App\Filament\Resources\Projects\Tables;

use App\Models\Project;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover')
                    ->imageHeight(40)
                    ->square()
                    ->disk('public')
                    ->defaultImageUrl(asset('assets/images/image-thumbnail.jpg'))
                    ->visibility('public')
                    ->searchable(),
                TextColumn::make('nama_projek')
                    ->searchable(),
                TextColumn::make('informasi')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('fasilitas')
                    ->limit(50)
                    ->searchable(),
                ToggleColumn::make('pin')
                    ->label('Pin')
                    ->onColor('success')
                    ->offColor('danger')
                    ->sortable()
                    ->afterStateUpdated(function ($record, $state, $livewire) {
                        if ($state) {
                            $pinnedCount = Project::where('pin', true)
                                ->where('uuid', '!=', $record->uuid)
                                ->count();

                            if ($pinnedCount >= 3) {
                                $record->update(['pin' => false]);

                                Notification::make()
                                    ->title('Gagal Mengaktifkan Pin')
                                    ->body('Maksimal hanya 3 project yang bisa di-pin.')
                                    ->danger()
                                    ->send();
                                $livewire->dispatch('refresh');
                            }
                        }
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->poll('5s')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
