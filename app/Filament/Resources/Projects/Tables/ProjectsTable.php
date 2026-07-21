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
                TextColumn::make('developer')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'residensial' => 'primary',
                        'commercial_area' => 'success',
                        'hotel_resort' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'residensial' => 'Residensial',
                        'commercial_area' => 'Commercial Area',
                        'hotel_resort' => 'Hotel & Resort',
                        default => $state,
                    })
                    ->default('belum ada kategori')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('informasi')
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

                            if ($pinnedCount >= 5) {
                                $record->update(['pin' => false]);

                                Notification::make()
                                    ->title('Gagal Mengaktifkan Pin')
                                    ->body('Maksimal hanya 5 project yang bisa di-pin.')
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
