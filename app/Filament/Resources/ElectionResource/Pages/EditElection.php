<?php

namespace App\Filament\Resources\ElectionResource\Pages;

use App\Actions\GenerateVoters;
use App\Filament\Resources\ElectionResource;
use App\Models\Election;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditElection extends EditRecord
{
    protected static string $resource = ElectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Action::make('Generate Voters')
            ->form([
                TextInput::make('number_of_voters')
                    ->required()
                    ->numeric()
                    ->default(10)
                    ->rules(['min:1', 'max:1000']),
                TextInput::make('prefix')
                    ->required()
                    ->default('SAC')
                    ->rules(['min:1', 'max:10'])
            ])
            ->requiresConfirmation()
            ->action(function (array $data, Election $election) {
                GenerateVoters::handle($election, $data['number_of_voters'], $data['prefix']);
                Notification::make()
                ->title('Voters Generated Successfully')
                ->icon('heroicon-o-check-circle')
                ->iconColor('success')
                ->send();
                
            }),
        ];
    }
}
