<?php

namespace HintBoxWidget\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Modules\ShopBuilder\Contracts\ContentWidgetRepositoryContract;
use HintBoxWidget\Widgets\HintBoxWidget;

class HintBoxServiceProvider extends ServiceProvider
{
    public function register()
    {
        // nichts nötig
    }

    public function boot(ContentWidgetRepositoryContract $widgetRepository)
    {
        // Widget beim ShopBuilder registrieren
        $widgetRepository->registerWidget(HintBoxWidget::class);
    }
}
