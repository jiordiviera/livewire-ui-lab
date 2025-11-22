import { test, expect } from '@playwright/test';

test.describe('Progress Bar Component - Day 6', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('/ui/6');
    await page.waitForLoadState('networkidle');
  });

  test('progress bars render with correct percentages', async ({ page }) => {
    // Primary progress bar at 25%
    const primaryBar = page.locator('[data-test="progress-bar-container"]').filter({ hasText: 'Primary Progress' }).first();
    await expect(primaryBar).toBeVisible();
    await expect(primaryBar).toContainText('25%');
  });

  test('progress bar color variants display correctly', async ({ page }) => {
    // Check that different variant labels are present
    await expect(page.locator('text=Primary Progress')).toBeVisible();
    await expect(page.locator('text=Success Progress')).toBeVisible();
    await expect(page.locator('text=Warning Progress')).toBeVisible();
    await expect(page.locator('text=Danger Progress')).toBeVisible();
    await expect(page.locator('text=Info Progress')).toBeVisible();
  });

  test('progress bar size variations render correctly', async ({ page }) => {
    // Check that size variation labels are present
    await expect(page.locator('text=Small').first()).toBeVisible();
    await expect(page.locator('text=Medium').first()).toBeVisible();
    await expect(page.locator('text=Large').first()).toBeVisible();
    await expect(page.locator('text=Extra Large').first()).toBeVisible();
  });

  test('progress bar ARIA attributes present', async ({ page }) => {
    // Find a progress bar with role="progressbar"
    const progressBar = page.locator('[role="progressbar"]').first();
    await expect(progressBar).toBeVisible();

    // Check ARIA attributes
    await expect(progressBar).toHaveAttribute('aria-valuenow');
    await expect(progressBar).toHaveAttribute('aria-valuemin', '0');
    await expect(progressBar).toHaveAttribute('aria-valuemax', '100');
  });

  test('simulated progress has button and initial state', async ({ page }) => {
    // Find the simulate progress button
    const simulateBtn = page.locator('[data-test="simulate-progress-btn"]');
    await expect(simulateBtn).toBeVisible();
    await expect(simulateBtn).toContainText('Start Simulation');

    // Get the progress bar with label "Upload Progress"
    const progressBarContainer = page.locator('[data-test-label="Upload Progress"]');
    const progressBar = progressBarContainer.locator('[role="progressbar"]');

    // Initial progress should be 0%
    const initialProgress = await progressBar.getAttribute('aria-valuenow');
    expect(parseInt(initialProgress || '0')).toBeLessThanOrEqual(10);

    // Verify button has wire:click attribute for Livewire interaction
    const wireClick = await simulateBtn.getAttribute('wire:click');
    expect(wireClick).toBe('simulateProgress');
  });

  test('simulate button has loading state attributes', async ({ page }) => {
    const simulateBtn = page.locator('[data-test="simulate-progress-btn"]');

    // Initial button text
    await expect(simulateBtn).toContainText('Start Simulation');
    await expect(simulateBtn).toBeEnabled();

    // Verify loading attributes are present
    const wireLoading = await simulateBtn.getAttribute('wire:loading.attr');
    expect(wireLoading).toBe('disabled');

    // Verify both loading states are in the button
    await expect(simulateBtn.locator('[wire\\:loading\\.remove]')).toContainText('Start Simulation');
    await expect(simulateBtn.locator('[wire\\:loading]')).toContainText('Processing');
  });

  test('progress bar percentage display matches aria-valuenow', async ({ page }) => {
    // Get all progress bars with labels
    const progressBars = page.locator('[role="progressbar"]');
    const count = await progressBars.count();

    for (let i = 0; i < Math.min(count, 5); i++) {
      const bar = progressBars.nth(i);
      const ariaValue = await bar.getAttribute('aria-valuenow');

      if (ariaValue) {
        const percentage = parseInt(ariaValue);
        const container = bar.locator('..');

        // Check if percentage is displayed in the container
        const text = await container.textContent();
        if (text && text.includes('%')) {
          expect(text).toContain(`${percentage}%`);
        }
      }
    }
  });

  test('progress bar features list displays correctly', async ({ page }) => {
    // Check that all features are listed
    const featuresList = page.locator('text=5 color variants');
    await expect(featuresList).toBeVisible();
    await expect(page.locator('text=4 size options')).toBeVisible();
    await expect(page.locator('text=Smooth animations')).toBeVisible();
    await expect(page.locator('text=ARIA accessible')).toBeVisible();
    await expect(page.locator('text=Optional labels')).toBeVisible();
    await expect(page.locator('text=Percentage display')).toBeVisible();
  });

  test('progress bar width reflects percentage', async ({ page }) => {
    // Check a progress bar with label "Success Progress"
    const container = page.locator('[data-test-label="Success Progress"]');
    const progressBar = container.locator('[role="progressbar"]');
    const ariaValue = await progressBar.getAttribute('aria-valuenow');

    // The inner div should have width style matching the percentage
    const innerBar = progressBar.locator('[data-test="progress-fill"]');
    const style = await innerBar.getAttribute('style');

    if (ariaValue && style) {
      expect(style).toContain(`width: ${ariaValue}%`);
    }
  });

  test('progress bar container has proper styling', async ({ page }) => {
    const progressBar = page.locator('[role="progressbar"]').first();

    // Check for rounded styling
    await expect(progressBar).toHaveClass(/rounded-full/);

    // Check for background color
    await expect(progressBar).toHaveClass(/bg-muted/);
  });
});
