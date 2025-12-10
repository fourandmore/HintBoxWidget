<?php

namespace HintBoxWidget\Widgets;

use Ceres\Widgets\Helper\BaseWidget;
use Ceres\Widgets\Helper\Factories\WidgetDataFactory;
use Ceres\Widgets\Helper\Factories\WidgetSettingsFactory;
use Ceres\Widgets\Helper\WidgetTypes;

class HintBoxWidget extends BaseWidget
{
    protected $template = "HintBoxWidget::Widgets.HintBoxWidget";

    public function getData(): array
    {
        return WidgetDataFactory::make("HintBoxWidget::HintBox")
            ->withLabel("Widget.hintBoxLabel")
            ->withPreviewImageUrl("/images/hintbox-widget.svg")
            ->withType(WidgetTypes::STATIC)
            ->withCategories(["text"])
            ->withPosition(2100)
            ->toArray();
    }

    public function getSettings(): array
    {
        $settings = pluginApp(WidgetSettingsFactory::class);

        $settings->createCustomClass();
        $settings->createAppearance();
        $settings->createSpacing();

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
