@props([
    'content',
])

<div {{ $attributes->merge(['class' => 'prose prose-zinc dark:prose-invert max-w-none']) }} id="content">
    {!! replace_links(\App\Markdown\MarkdownHelper::parseLiquidTags(\GrahamCampbell\Markdown\Facades\Markdown::convert($content))) !!}
</div>
