{% set headline = widget.settings.headline | default('') %}
{% set text     = widget.settings.text | default('') %}
{% set style    = widget.settings.style | default('info') %}
{% set classes  = widget.settings.customClass | default('') %}

<div class="hint-box hint-box--{{ style }} {{ classes }}">
    {% if headline %}
        <h3 class="hint-box__headline">
            {{ headline }}
        </h3>
    {% endif %}

    <div class="hint-box__text">
        {{ text | raw }}
    </div>
</div>
