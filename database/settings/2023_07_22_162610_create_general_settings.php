<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('app.site_name', 'Devcentric Studio');
        $this->migrator->add('app.site_active', true);
    }
};
