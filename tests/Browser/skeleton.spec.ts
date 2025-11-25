import { test, expect } from '@playwright/test';

test.describe('Skeleton Loader Component - Day 8', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('/ui/8');
    await page.waitForLoadState('networkidle');
  });

  test('skeleton component renders correctly', async ({ page }) => {
    const skeleton = page.locator('[data-test="skeleton-item"]').first();
    await expect(skeleton).toBeVisible();
  });

  test('skeleton has aria-hidden attribute for accessibility', async ({ page }) => {
    const skeleton = page.locator('[data-test="skeleton-item"]').first();
    await expect(skeleton).toHaveAttribute('aria-hidden', 'true');
  });

  test('skeleton has background color', async ({ page }) => {
    const skeleton = page.locator('[data-test="skeleton-item"]').first();
    await expect(skeleton).toHaveClass(/bg-muted/);
  });

  test('skeleton with pulse animation has animate-pulse class', async ({ page }) => {
    // Basic variants use pulse animation by default
    const skeleton = page.locator('[data-test="skeleton-item"]').first();
    await expect(skeleton).toHaveClass(/animate-pulse/);
  });

  test('skeleton with wave animation has skeleton-wave class', async ({ page }) => {
    // Wave animation section
    const waveSection = page.getByText('Wave Animation').locator('..');
    const waveSkeleton = waveSection.locator('[data-test="skeleton-item"]').first();
    await expect(waveSkeleton).toHaveClass(/skeleton-wave/);
  });

  test('skeleton group renders multiple items', async ({ page }) => {
    const skeletonGroup = page.locator('[data-test="skeleton-group"]').first();
    await expect(skeletonGroup).toBeVisible();

    const items = skeletonGroup.locator('[data-test="skeleton-item"]');
    const count = await items.count();
    expect(count).toBeGreaterThan(1);
  });

  test('skeleton text variant has correct dimensions', async ({ page }) => {
    const textSkeleton = page.locator('[data-test="skeleton-item"]').first();
    await expect(textSkeleton).toHaveClass(/h-4/);
    await expect(textSkeleton).toHaveClass(/w-full/);
  });

  test('skeleton avatar variant has correct shape', async ({ page }) => {
    // Look for avatar skeleton in Basic Variants section
    const avatarSkeleton = page.locator('[data-test="skeleton-item"].rounded-full').first();
    await expect(avatarSkeleton).toBeVisible();
  });

  test('skeleton with custom sizes renders correctly', async ({ page }) => {
    const customSection = page.getByText('Custom Sizes').locator('..');
    const customSkeleton = customSection.locator('[data-test="skeleton-item"]').first();
    await expect(customSkeleton).toBeVisible();
  });

  test('multiple skeleton lines have proper gap', async ({ page }) => {
    const skeletonGroup = page.locator('[data-test="skeleton-group"]').first();
    await expect(skeletonGroup).toHaveClass(/flex/);
    await expect(skeletonGroup).toHaveClass(/flex-col/);
    await expect(skeletonGroup).toHaveClass(/gap-/);
  });

  test('skeleton rounded variants render correctly', async ({ page }) => {
    // Check various rounded classes exist
    const roundedMd = page.locator('[data-test="skeleton-item"].rounded-md').first();
    await expect(roundedMd).toBeVisible();
  });

  test('card skeleton example renders with image placeholder', async ({ page }) => {
    const cardSection = page.getByText('Card Skeleton').locator('..');
    const imageSkeleton = cardSection.locator('[data-test="skeleton-item"]').first();
    await expect(imageSkeleton).toBeVisible();
  });

  test('interactive demo shows skeleton state by default', async ({ page }) => {
    const skeletonState = page.locator('[data-test="skeleton-state"]');
    await expect(skeletonState).toBeVisible();
  });

  test('toggle button switches between skeleton and loaded state', async ({ page }) => {
    const toggleButton = page.locator('[data-test="toggle-loading-btn"]');
    await expect(toggleButton).toBeVisible();
    await expect(toggleButton).toContainText('Afficher contenu');

    // Click to show content
    await toggleButton.click();
    await page.waitForTimeout(300);

    const loadedState = page.locator('[data-test="loaded-state"]');
    await expect(loadedState).toBeVisible();
    await expect(toggleButton).toContainText('Simuler chargement');

    // Click to show skeleton again
    await toggleButton.click();
    await page.waitForTimeout(300);

    const skeletonState = page.locator('[data-test="skeleton-state"]');
    await expect(skeletonState).toBeVisible();
  });

  test('team skeleton shows multiple avatar skeletons', async ({ page }) => {
    const teamSkeleton = page.locator('[data-test="team-skeleton"]');
    await expect(teamSkeleton).toBeVisible();

    const avatarSkeletons = teamSkeleton.locator('[data-test="skeleton-item"]');
    const count = await avatarSkeletons.count();
    expect(count).toBeGreaterThanOrEqual(5);
  });

  test('skeleton variants section displays all variant types', async ({ page }) => {
    const basicSection = page.getByText('Basic Variants').locator('..');

    // Should have multiple skeleton items
    const skeletons = basicSection.locator('[data-test="skeleton-item"]');
    const count = await skeletons.count();
    expect(count).toBeGreaterThan(3);
  });

  test('wave animation creates shimmer effect with CSS', async ({ page }) => {
    const waveSection = page.getByText('Wave Animation').locator('..');
    const waveSkeleton = waveSection.locator('[data-test="skeleton-item"]').first();

    // Check that the skeleton-wave class creates the shimmer effect
    await expect(waveSkeleton).toHaveClass(/skeleton-wave/);
  });

  test('skeleton component is responsive', async ({ page }) => {
    // Check that full-width skeletons work
    const fullWidthSkeleton = page.locator('[data-test="skeleton-item"].w-full').first();
    await expect(fullWidthSkeleton).toBeVisible();

    // Get the computed width
    const box = await fullWidthSkeleton.boundingBox();
    expect(box?.width).toBeGreaterThan(100);
  });
});
