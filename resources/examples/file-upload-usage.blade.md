```blade
{{-- Basic File Upload --}}
<x-ui.file-upload
    wire-model="document"
    label="Upload Document"
    accept="*"
    max-size="10MB"
/>

{{-- Image Upload with Preview --}}
<x-ui.file-upload
    wire-model="photo"
    label="Upload Photo"
    accept="image/*"
    max-size="5MB"
    description="PNG, JPG, GIF up to 5MB"
/>

{{-- Document Upload (PDF, Word) --}}
<x-ui.file-upload
    wire-model="document"
    label="Upload Document"
    accept=".pdf,.doc,.docx"
    max-size="20MB"
    description="PDF or Word documents"
/>

{{-- Multiple Files Upload --}}
<x-ui.file-upload
    wire-model="photos"
    label="Upload Multiple Photos"
    accept="image/*"
    :multiple="true"
    max-size="5MB each"
    description="Upload multiple images"
/>

{{-- With Error Message --}}
<x-ui.file-upload
    wire-model="file"
    label="Upload File"
    error="File size must be less than 10MB"
/>
```

### Livewire Component Setup

```php
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class MyComponent extends Component
{
    use WithFileUploads;

    #[Validate('nullable|image|max:10240')]
    public $photo;

    #[Validate('nullable|mimes:pdf,doc,docx|max:20480')]
    public $document;

    public function updatedPhoto()
    {
        $this->validate(['photo' => 'image|max:10240']);
    }
}
```

### Props

- `wire-model` - Livewire property name
- `label` - Field label
- `accept` - File type filter (e.g., `image/*`, `.pdf`, etc.)
- `multiple` - Allow multiple file selection
- `max-size` - Display max size hint
- `description` - Help text
- `error` - Error message

### Features

- **Drag & Drop**: Drag files directly onto the upload zone
- **Image Previews**: Automatic preview for image files with thumbnails
- **Real-time Progress**: Shows upload progress with integrated progress bar
- **File Type Filtering**: Restrict file types with `accept` prop
- **Multiple Files**: Support for uploading multiple files at once
- **Validation**: Integration with Livewire validation and error display
- **Remove Files**: Remove files before upload with preview controls
- **Visual Feedback**: Border highlights on drag over

### Events

The component automatically listens to Livewire upload events:
- `livewire-upload-start` - Upload begins
- `livewire-upload-progress` - Progress updates
- `livewire-upload-finish` - Upload completes
- `livewire-upload-error` - Upload fails
