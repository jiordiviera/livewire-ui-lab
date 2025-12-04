```blade
{{-- Basic Carousel --}}
<x-ui.carousel :images="[
    'https://example.com/image1.jpg',
    'https://example.com/image2.jpg',
    'https://example.com/image3.jpg',
]" />

{{-- With Captions --}}
<x-ui.carousel :images="[
    [
        'src' => 'https://example.com/image1.jpg',
        'alt' => 'Mountain view',
        'caption' => 'Scenic mountain landscape'
    ],
    [
        'src' => 'https://example.com/image2.jpg',
        'alt' => 'Ocean sunset',
        'caption' => 'Beautiful ocean sunset'
    ],
]" />

{{-- With Autoplay --}}
<x-ui.carousel
    :images="$images"
    :autoplay="true"
    :interval="3000"
/>

{{-- Custom Aspect Ratio --}}
<x-ui.carousel
    :images="$images"
    aspectRatio="1/1"
/>
{{-- Options: 16/9, 4/3, 1/1, auto --}}

{{-- Without Navigation --}}
<x-ui.carousel
    :images="$images"
    :showArrows="false"
    :showDots="false"
/>
```
