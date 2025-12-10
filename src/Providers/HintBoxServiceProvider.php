<?php

namespace HintBoxWidget\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Modules\ShopBuilder\Contracts\ContentWidgetRepositoryContract;
use HintBoxWidget\Widgets\HintBoxWidget;

class HintBoxServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot(ContentWidgetRepositoryContract $widgetRepository)
    {
        $widgetRepository->registerWidget(HintBoxWidget::class);
    }
}
