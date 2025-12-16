```blade
{{-- Basic usage --}}
<x-ui.file-icon extension="pdf" />
<x-ui.file-icon extension="xlsx" />
<x-ui.file-icon extension="js" />

{{-- With size --}}
<x-ui.file-icon extension="png" size="xs" />
<x-ui.file-icon extension="png" size="sm" />
<x-ui.file-icon extension="png" size="md" />
<x-ui.file-icon extension="png" size="lg" />
<x-ui.file-icon extension="png" size="xl" />

{{-- Dynamic from variable --}}
<x-ui.file-icon :extension="$file->extension" />

{{-- Supported categories --}}
{{-- Documents: pdf, doc, docx, txt, md --}}
{{-- Spreadsheets: xls, xlsx, csv --}}
{{-- Presentations: ppt, pptx --}}
{{-- Images: jpg, png, gif, svg, webp --}}
{{-- Videos: mp4, mov, avi, webm --}}
{{-- Audio: mp3, wav, ogg, flac --}}
{{-- Archives: zip, rar, 7z, tar, gz --}}
{{-- Code: js, ts, php, py, html, css --}}
{{-- Data: json, xml, yaml, yml --}}
{{-- Database: sql, db, sqlite --}}
```
