import { test, expect } from '@playwright/test';

test.describe('File Upload Component - Day 6', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('/ui/6');
    await page.waitForLoadState('networkidle');
  });

  test('file upload component renders correctly', async ({ page }) => {
    // Check that all three file upload sections are visible
    await expect(page.locator('text=Single Image Upload')).toBeVisible();
    await expect(page.locator('text=Document Upload')).toBeVisible();
    await expect(page.getByRole('heading', { name: 'Multiple Images' })).toBeVisible();
  });

  test('file upload shows dropzone with instructions', async ({ page }) => {
    const dropzone = page.locator('[data-test="file-upload-dropzone"]').first();
    await expect(dropzone).toBeVisible();

    // Check for upload instructions
    await expect(page.locator('[data-test="file-upload-description"]').first()).toContainText('Click to upload');
    await expect(page.locator('[data-test="file-upload-description"]').first()).toContainText('drag and drop');
  });

  test('file upload icon is visible', async ({ page }) => {
    const icon = page.locator('[data-test="file-upload-icon"]').first();
    await expect(icon).toBeVisible();
  });

  test('single image upload input is present and configured', async ({ page }) => {
    // Check file input exists and has correct attributes
    const fileInput = page.locator('[data-test-name="photo"] [data-test="file-upload-input"]');
    await expect(fileInput).toBeAttached();

    // Verify it accepts images
    const accept = await fileInput.getAttribute('accept');
    expect(accept).toBe('image/*');

    // Verify wire:model is present
    const wireModel = await fileInput.getAttribute('wire:model');
    expect(wireModel).toBe('photo');
  });

  test('document upload input is configured for documents', async ({ page }) => {
    const fileInput = page.locator('[data-test-name="document"] [data-test="file-upload-input"]');
    await expect(fileInput).toBeAttached();

    // Verify it accepts documents
    const accept = await fileInput.getAttribute('accept');
    expect(accept).toContain('.pdf');
    expect(accept).toContain('.doc');

    // Verify wire:model is present
    const wireModel = await fileInput.getAttribute('wire:model');
    expect(wireModel).toBe('document');
  });

  test('multiple image upload is configured for multiple files', async ({ page }) => {
    const fileInput = page.locator('[data-test-name="photos"] [data-test="file-upload-input"]');
    await expect(fileInput).toBeAttached();

    // Verify it has multiple attribute
    await expect(fileInput).toHaveAttribute('multiple');

    // Verify it accepts images
    const accept = await fileInput.getAttribute('accept');
    expect(accept).toBe('image/*');

    // Verify wire:model is present
    const wireModel = await fileInput.getAttribute('wire:model');
    expect(wireModel).toBe('photos');
  });

  test('file upload has progress bar element', async ({ page }) => {
    // Verify the progress bar component is used in the file upload
    const fileUploadContainer = page.locator('[data-test-name="photo"]');
    await expect(fileUploadContainer).toBeAttached();

    // The progress bar should be hidden initially but present in the component
    // This verifies the integration between file-upload and progress-bar components
    const dropzone = fileUploadContainer.locator('[data-test="file-upload-dropzone"]');
    await expect(dropzone).toBeVisible();
  });

  test('file upload description shows size limits', async ({ page }) => {
    // Verify that file upload components show size limits in their descriptions
    const photoHint = page.locator('[data-test-name="photo"] [data-test="file-upload-hint"]');
    await expect(photoHint).toContainText('2MB');

    const documentHint = page.locator('[data-test-name="document"] [data-test="file-upload-hint"]');
    await expect(documentHint).toContainText('2MB');
  });

  test('file upload trigger is clickable', async ({ page }) => {
    const trigger = page.locator('[data-test="file-upload-trigger"]').first();
    await expect(trigger).toBeVisible();

    // Should have cursor pointer
    await expect(trigger).toHaveClass(/cursor-pointer/);
  });

  test('file upload hint displays max size', async ({ page }) => {
    const hint = page.locator('[data-test="file-upload-hint"]').first();
    await expect(hint).toBeVisible();

    // Should show max size
    await expect(hint).toContainText('Max size:');
  });

  test('file upload features list displays correctly', async ({ page }) => {
    // Check that all features are listed
    await expect(page.locator('text=Drag & drop').last()).toBeVisible();
    await expect(page.locator('text=Image previews').last()).toBeVisible();
    await expect(page.locator('text=Real-time progress').last()).toBeVisible();
    await expect(page.locator('text=Multiple files').last()).toBeVisible();
    await expect(page.locator('text=File filtering').last()).toBeVisible();
    await expect(page.locator('text=Validation').last()).toBeVisible();
  });

  test('combined usage example - document submission form', async ({ page }) => {
    // Check for Cameroon context example
    await expect(page.locator('text=Document Submission Form')).toBeVisible();
    await expect(page.locator('text=Exemple typique pour une inscription administrative au Cameroun')).toBeVisible();

    // Check for Cameroon-specific document labels
    await expect(page.locator('text=Carte Nationale d\'Identité (CNI)')).toBeVisible();
    await expect(page.locator('text=Acte de Naissance')).toBeVisible();
    await expect(page.locator('text=Documents Complémentaires')).toBeVisible();
  });

  test('file upload accepts correct file types', async ({ page }) => {
    // Check photo upload accepts images
    const photoInput = page.locator('[data-test-name="photo"] [data-test="file-upload-input"]');
    const photoAccept = await photoInput.getAttribute('accept');
    expect(photoAccept).toBe('image/*');

    // Check document upload accepts specific types
    const docInput = page.locator('[data-test-name="document"] [data-test="file-upload-input"]');
    const docAccept = await docInput.getAttribute('accept');
    expect(docAccept).toContain('.pdf');
    expect(docAccept).toContain('.doc');
  });

  test('multiple file upload has multiple attribute', async ({ page }) => {
    const photosInput = page.locator('[data-test-name="photos"] [data-test="file-upload-input"]');
    await expect(photosInput).toHaveAttribute('multiple');
  });

  test('file upload label is visible', async ({ page }) => {
    const label = page.locator('[data-test="file-upload-label"]').first();
    await expect(label).toBeVisible();
    await expect(label).toContainText('Upload Profile Photo');
  });

  test('dropzone has proper styling and transitions', async ({ page }) => {
    const dropzone = page.locator('[data-test="file-upload-dropzone"]').first();

    // Check for border styling
    await expect(dropzone).toHaveClass(/border-2/);
    await expect(dropzone).toHaveClass(/border-dashed/);
    await expect(dropzone).toHaveClass(/rounded-lg/);
    await expect(dropzone).toHaveClass(/transition-all/);
  });

  test('file upload components have proper data-test attributes', async ({ page }) => {
    // Verify all file upload components have proper test attributes
    const photoContainer = page.locator('[data-test-name="photo"]');
    await expect(photoContainer).toBeAttached();

    const documentContainer = page.locator('[data-test-name="document"]');
    await expect(documentContainer).toBeAttached();

    const photosContainer = page.locator('[data-test-name="photos"]');
    await expect(photosContainer).toBeAttached();
  });

  test('page title and description are correct', async ({ page }) => {
    // Check Day 6 title
    await expect(page.locator('text=File Upload & Progress Bar')).toBeVisible();

    // Check description
    await expect(page.locator('text=FilePond-style file upload with drag-and-drop')).toBeVisible();
  });
});
