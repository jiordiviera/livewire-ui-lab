import { test, expect } from '@playwright/test';

test.describe('Avatar Component - Day 8', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('/ui/8');
    await page.waitForLoadState('networkidle');
  });

  test('avatar component renders correctly', async ({ page }) => {
    const avatar = page.locator('[data-test="avatar-container"]').first();
    await expect(avatar).toBeVisible();
  });

  test('avatar with image displays correctly', async ({ page }) => {
    const avatarImage = page.locator('[data-test="avatar-image"]').first();
    await expect(avatarImage).toBeVisible();
    await expect(avatarImage).toHaveAttribute('src');
  });

  test('avatar sizes display correctly', async ({ page }) => {
    const sizesSection = page.getByText('Sizes').first().locator('..');
    const avatars = sizesSection.locator('[data-test="avatar-container"]');

    const count = await avatars.count();
    expect(count).toBeGreaterThanOrEqual(6); // xs, sm, md, lg, xl, 2xl
  });

  test('avatar xs size has correct dimensions', async ({ page }) => {
    const xsAvatar = page.locator('[data-test="avatar-container"].size-6').first();
    await expect(xsAvatar).toBeVisible();
  });

  test('avatar md size has correct dimensions', async ({ page }) => {
    const mdAvatar = page.locator('[data-test="avatar-container"].size-10').first();
    await expect(mdAvatar).toBeVisible();
  });

  test('avatar lg size has correct dimensions', async ({ page }) => {
    const lgAvatar = page.locator('[data-test="avatar-container"].size-12').first();
    await expect(lgAvatar).toBeVisible();
  });

  test('avatar shapes render correctly', async ({ page }) => {
    const shapesSection = page.getByText('Shapes').first().locator('..');

    // Circle shape
    const circleAvatar = shapesSection.locator('[data-test="avatar-container"].rounded-full').first();
    await expect(circleAvatar).toBeVisible();

    // Square shape
    const squareAvatar = shapesSection.locator('[data-test="avatar-container"].rounded-md').first();
    await expect(squareAvatar).toBeVisible();
  });

  test('avatar with initials fallback displays initials', async ({ page }) => {
    const fallbackSection = page.getByText('Fallback States').first().locator('..');
    const initialsAvatar = fallbackSection.locator('[data-test="avatar-initials"]').first();
    await expect(initialsAvatar).toBeVisible();

    const text = await initialsAvatar.textContent();
    expect(text?.trim()).toMatch(/^[A-Z]{2}$/); // Should be 2 uppercase letters
  });

  test('avatar with no image and no name shows icon fallback', async ({ page }) => {
    const fallbackSection = page.getByText('Fallback States').first().locator('..');
    const iconFallback = fallbackSection.locator('[data-test="avatar-icon"]').first();
    await expect(iconFallback).toBeVisible();
  });

  test('avatar status indicator online displays correctly', async ({ page }) => {
    const statusSection = page.getByText('Status Indicators').first().locator('..');
    const onlineStatus = statusSection.locator('[data-test="avatar-status"].bg-green-500').first();
    await expect(onlineStatus).toBeVisible();
  });

  test('avatar status indicator offline displays correctly', async ({ page }) => {
    const statusSection = page.getByText('Status Indicators').first().locator('..');
    const offlineStatus = statusSection.locator('[data-test="avatar-status"].bg-gray-400').first();
    await expect(offlineStatus).toBeVisible();
  });

  test('avatar status indicator busy displays correctly', async ({ page }) => {
    const statusSection = page.getByText('Status Indicators').first().locator('..');
    const busyStatus = statusSection.locator('[data-test="avatar-status"].bg-red-500').first();
    await expect(busyStatus).toBeVisible();
  });

  test('avatar status indicator away displays correctly', async ({ page }) => {
    const statusSection = page.getByText('Status Indicators').first().locator('..');
    const awayStatus = statusSection.locator('[data-test="avatar-status"].bg-yellow-500').first();
    await expect(awayStatus).toBeVisible();
  });

  test('avatar status has aria-label', async ({ page }) => {
    const status = page.locator('[data-test="avatar-status"]').first();
    await expect(status).toHaveAttribute('aria-label');
  });

  test('avatar group renders correctly', async ({ page }) => {
    const avatarGroup = page.locator('[data-test="avatar-group"]').first();
    await expect(avatarGroup).toBeVisible();
    await expect(avatarGroup).toHaveAttribute('role', 'group');
  });

  test('avatar group displays correct number of avatars', async ({ page }) => {
    const avatarGroup = page.locator('[data-test="avatar-group"]').first();
    const groupItems = avatarGroup.locator('[data-test="avatar-group-item"]');

    const count = await groupItems.count();
    expect(count).toBeGreaterThan(0);
    expect(count).toBeLessThanOrEqual(4); // Default max is 4
  });

  test('avatar group shows overflow count', async ({ page }) => {
    const overflow = page.locator('[data-test="avatar-group-overflow"]').first();
    await expect(overflow).toBeVisible();

    const countText = page.locator('[data-test="avatar-group-count"]').first();
    const text = await countText.textContent();
    expect(text).toMatch(/^\+\d+$/); // Should be +N format
  });

  test('avatar group with max 3 shows correct overflow', async ({ page }) => {
    const groupSection = page.getByText('Max 3:').locator('..');
    const overflow = groupSection.locator('[data-test="avatar-group-count"]');
    await expect(overflow).toBeVisible();
  });

  test('avatar group items have stacking z-index', async ({ page }) => {
    const avatarGroup = page.locator('[data-test="avatar-group"]').first();
    const firstItem = avatarGroup.locator('[data-test="avatar-group-item"]').first();

    const style = await firstItem.getAttribute('style');
    expect(style).toContain('z-index');
  });

  test('avatar group items have ring for separation', async ({ page }) => {
    const groupItem = page.locator('[data-test="avatar-group-item"]').first();
    await expect(groupItem).toHaveClass(/ring-/);
  });

  test('avatar group large size displays correctly', async ({ page }) => {
    const largeSection = page.getByText('Large size:').locator('..');
    const largeGroup = largeSection.locator('[data-test="avatar-group"]');
    const avatar = largeGroup.locator('[data-test="avatar-container"]').first();
    await expect(avatar).toHaveClass(/size-12/);
  });

  test('avatar group square shape displays correctly', async ({ page }) => {
    const squareSection = page.getByText('Square shape:').locator('..');
    const squareGroup = squareSection.locator('[data-test="avatar-group"]');
    const avatar = squareGroup.locator('[data-test="avatar-container"]').first();
    await expect(avatar).toHaveClass(/rounded-md/);
  });

  test('interactive demo loaded state shows avatar with status', async ({ page }) => {
    // Toggle to loaded state
    const toggleButton = page.locator('[data-test="toggle-loading-btn"]');
    await toggleButton.click();
    await page.waitForTimeout(300);

    const loadedState = page.locator('[data-test="loaded-state"]');
    const avatar = loadedState.locator('[data-test="avatar-container"]');
    await expect(avatar).toBeVisible();

    const status = loadedState.locator('[data-test="avatar-status"]');
    await expect(status).toBeVisible();
  });

  test('team loaded state shows avatar group', async ({ page }) => {
    // Toggle to loaded state
    const toggleButton = page.locator('[data-test="toggle-loading-btn"]');
    await toggleButton.click();
    await page.waitForTimeout(300);

    const teamLoaded = page.locator('[data-test="team-loaded"]');
    await expect(teamLoaded).toBeVisible();

    const avatarGroup = teamLoaded.locator('[data-test="avatar-group"]');
    await expect(avatarGroup).toBeVisible();
  });

  test('avatar images have object-cover for proper scaling', async ({ page }) => {
    const avatarImage = page.locator('[data-test="avatar-image"]').first();
    await expect(avatarImage).toHaveClass(/object-cover/);
  });

  test('avatar has overflow hidden for image clipping', async ({ page }) => {
    const avatar = page.locator('[data-test="avatar-container"]').first();
    await expect(avatar).toHaveClass(/overflow-hidden/);
  });

  test('avatar group has aria-label describing the group', async ({ page }) => {
    const avatarGroup = page.locator('[data-test="avatar-group"]').first();
    const ariaLabel = await avatarGroup.getAttribute('aria-label');
    expect(ariaLabel).toContain('avatars');
  });
});
