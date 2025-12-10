<?php

namespace HintBoxWidget\Widgets;

use Ceres\Widgets\Helper\BaseWidget;
use Ceres\Widgets\Helper\Factories\WidgetDataFactory;
use Ceres\Widgets\Helper\WidgetTypes;

class HintBoxWidget extends BaseWidget
{
    /**
     * Verweis auf das Twig-Template:
     * resources/views/Widgets/HintBoxWidget.twig
     */
    protected $template = "HintBoxWidget::Widgets.HintBoxWidget";

    /**
     * Basisdaten für den ShopBuilder (Name, Kategorie usw.)
     */
    public function getData(): array
    {
        return WidgetDataFactory::make("HintBoxWidget::HintBox")
            ->withLabel("Widget.hintBoxLabel")
            ->withPreviewImageUrl("/images/hintbox-widget.svg") // optional
            ->withType(WidgetTypes::STATIC)                     // Content-Widget
            ->withCategories(["text"])                          // erscheint im Tab "Text"
            ->withPosition(2100)
            ->toArray();
    }

    /**
     * KEINE eigenen Settings – leeres Array.
     * So können hier keine kaputten Settings-Strukturen Vue zerschießen.
     */
    public function getSettings(): array
    {
        return [];
    }
}
