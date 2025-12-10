<?php

namespace HintBoxWidget\Widgets;

use Ceres\Widgets\Helper\BaseWidget;
use Ceres\Widgets\Helper\Factories\WidgetDataFactory;
use Ceres\Widgets\Helper\Factories\WidgetSettingsFactory;
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
            ->withLabel("Widget.hintBoxLabel")                     // Text aus widgets.properties
            ->withPreviewImageUrl("/images/hintbox-widget.svg")    // optional
            ->withType(WidgetTypes::STATIC)                        // Content-Widget
            ->withCategories(["text"])                             // Tab "Text" im ShopBuilder
            ->withPosition(2100)
            ->toArray();
    }

    /**
     * Einstellungen für das Widget im ShopBuilder
     */
    public function getSettings(): array
    {
        /** @var WidgetSettingsFactory $settings */
        $settings = pluginApp(WidgetSettingsFactory::class);

        // Standard-Gruppen von Ceres
        $settings->createCustomClass();
        $settings->createAppearance();
        $settings->createSpacing();

        // Eigene Felder:
        $settings->createText("headline", [
            "name"    => "Widget.hintBoxHeadlineLabel",
            "tooltip" => "Widget.hintBoxHeadlineTooltip"
        ]);

        $settings->createNoteEditor("text", [
            "name"    => "Widget.hintBoxTextLabel",
            "tooltip" => "Widget.hintBoxTextTooltip"
        ]);

        $settings->createSelect("style", [
            "name"          => "Widget.hintBoxStyleLabel",
            "tooltip"       => "Widget.hintBoxStyleTooltip",
            "listBoxValues" => [
                [ "value" => "info",    "caption" => "Widget.hintBoxStyleInfo",    "position" => 0 ],
                [ "value" => "success", "caption" => "Widget.hintBoxStyleSuccess", "position" => 1 ],
                [ "value" => "warning", "caption" => "Widget.hintBoxStyleWarning", "position" => 2 ]
            ]
        ], "info");

        return $settings->toArray();
    }
}
