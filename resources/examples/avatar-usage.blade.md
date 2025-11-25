## Avatar Component

Le composant `<x-ui.avatar>` affiche l'image de profil d'un utilisateur avec fallback automatique.

### Basic Usage

```blade
{{-- With image --}}
<x-ui.avatar src="https://example.com/avatar.jpg" name="Ngono Marie" />

{{-- With name only (shows initials) --}}
<x-ui.avatar name="Ngono Marie" />

{{-- Default (shows user icon) --}}
<x-ui.avatar />
```

### Sizes

```blade
<x-ui.avatar size="xs" name="XS" />   {{-- 24px --}}
<x-ui.avatar size="sm" name="SM" />   {{-- 32px --}}
<x-ui.avatar size="md" name="MD" />   {{-- 40px (default) --}}
<x-ui.avatar size="lg" name="LG" />   {{-- 48px --}}
<x-ui.avatar size="xl" name="XL" />   {{-- 56px --}}
<x-ui.avatar size="2xl" name="2XL" /> {{-- 64px --}}
```

### Shapes

```blade
{{-- Circle (default) --}}
<x-ui.avatar shape="circle" name="Circle" />

{{-- Rounded square --}}
<x-ui.avatar shape="rounded" name="Rounded" />

{{-- Square --}}
<x-ui.avatar shape="square" name="Square" />
```

### Status Indicators

```blade
<x-ui.avatar status="online" name="Online" />   {{-- Green dot --}}
<x-ui.avatar status="offline" name="Offline" /> {{-- Gray dot --}}
<x-ui.avatar status="busy" name="Busy" />       {{-- Red dot --}}
<x-ui.avatar status="away" name="Away" />       {{-- Yellow dot --}}
```

### Fallback Behavior

```blade
{{-- Image loads successfully --}}
<x-ui.avatar src="valid-url.jpg" name="User Name" />

{{-- Image fails - shows initials from name --}}
<x-ui.avatar src="invalid-url.jpg" name="User Name" />

{{-- No image, has name - shows initials --}}
<x-ui.avatar name="User Name" />

{{-- No image, no name - shows default icon --}}
<x-ui.avatar />

{{-- Custom fallback icon --}}
<x-ui.avatar fallbackIcon="users" />
```

### Avatar Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `src` | string | `null` | Image URL |
| `alt` | string | `''` | Image alt text |
| `name` | string | `null` | User name (used for initials fallback) |
| `size` | string | `md` | Size (xs, sm, md, lg, xl, 2xl) |
| `shape` | string | `circle` | Shape (circle, square, rounded) |
| `status` | string | `null` | Status indicator (online, offline, busy, away) |
| `fallbackIcon` | string | `user` | Lucide icon name for default fallback |

---

## Avatar Group Component

Le composant `<x-ui.avatar-group>` affiche plusieurs avatars empilés avec un badge +X.

### Basic Usage

```blade
@php
$users = [
    ['name' => 'User 1', 'src' => 'avatar1.jpg'],
    ['name' => 'User 2', 'src' => 'avatar2.jpg'],
    ['name' => 'User 3', 'src' => 'avatar3.jpg'],
    ['name' => 'User 4', 'src' => 'avatar4.jpg'],
    ['name' => 'User 5', 'src' => 'avatar5.jpg'],
];
@endphp

<x-ui.avatar-group :avatars="$users" />
```

### Maximum Displayed

```blade
{{-- Show max 3 avatars, rest as +X --}}
<x-ui.avatar-group :avatars="$users" :max="3" />

{{-- Show max 6 avatars --}}
<x-ui.avatar-group :avatars="$users" :max="6" />
```

### With Status

```blade
@php
$team = [
    ['name' => 'Alice', 'src' => 'alice.jpg', 'status' => 'online'],
    ['name' => 'Bob', 'src' => 'bob.jpg', 'status' => 'busy'],
    ['name' => 'Carol', 'src' => 'carol.jpg', 'status' => 'away'],
];
@endphp

<x-ui.avatar-group :avatars="$team" />
```

### Size and Shape

```blade
{{-- Large avatars --}}
<x-ui.avatar-group :avatars="$users" size="lg" />

{{-- Square shape --}}
<x-ui.avatar-group :avatars="$users" shape="square" />

{{-- Small with rounded shape --}}
<x-ui.avatar-group :avatars="$users" size="sm" shape="rounded" />
```

### Avatar Array Format

```blade
@php
// Full format
$users = [
    [
        'name' => 'User Name',      // For initials fallback
        'src' => 'image-url.jpg',   // or 'image' key
        'alt' => 'Alt text',        // Optional
        'status' => 'online',       // Optional
    ],
];

// Simple format (image URL only)
$users = [
    'avatar1.jpg',
    'avatar2.jpg',
    'avatar3.jpg',
];
@endphp
```

### Avatar Group Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `avatars` | array | `[]` | Array of avatar data |
| `max` | int | `4` | Maximum avatars to display |
| `size` | string | `md` | Avatar size (xs, sm, md, lg, xl, 2xl) |
| `shape` | string | `circle` | Avatar shape (circle, square, rounded) |
| `spacing` | string | `-2` | Overlap spacing (Tailwind margin) |

### Testing Attributes

| Attribute | Description |
|-----------|-------------|
| `data-test="avatar-container"` | Avatar wrapper element |
| `data-test="avatar-image"` | Avatar image element |
| `data-test="avatar-initials"` | Initials fallback text |
| `data-test="avatar-icon"` | Icon fallback element |
| `data-test="avatar-fallback"` | Hidden fallback container |
| `data-test="avatar-status"` | Status indicator dot |
| `data-test="avatar-group"` | Avatar group container |
| `data-test="avatar-group-item"` | Individual avatar in group |
| `data-test="avatar-group-overflow"` | +X overflow badge |
| `data-test="avatar-group-count"` | Count text in overflow badge |
