<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum GuestStatus: string implements HasLabel, HasIcon, HasColor
{
    case accepted = 'accepted';
    case declined = 'declined';
    case invited = 'invited';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::accepted => 'success',
            self::declined => 'danger',
            self::invited => 'gray',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::accepted => 'tabler-circle-check',
            self::declined => 'tabler-circle-x',
            self::invited => 'tabler-circle-minus',
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
             self::accepted => 'Přijde',
             self::declined => 'Nepřijde',
             self::invited => 'Neodpověděl',
        };
    }
}
