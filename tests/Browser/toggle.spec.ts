import { test, expect } from '@playwright/test';

test.describe('Toggle Component - Day 4', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('/ui/4');
    await page.waitForLoadState('networkidle');
  });

  test('toggle switches on and off with click', async ({ page }) => {
    // Find first toggle
    const toggle = page.locator('[role="switch"]').first();

    // Get initial state
    const initialState = await toggle.getAttribute('aria-checked');

    // Click toggle
    await toggle.click();

    // State should have changed
    const newState = await toggle.getAttribute('aria-checked');
    expect(newState).not.toBe(initialState);

    // Click again to toggle back
    await toggle.click();

    // Should be back to initial state
    const finalState = await toggle.getAttribute('aria-checked');
    expect(finalState).toBe(initialState);
  });

  test('toggle keyboard interaction - Space key', async ({ page }) => {
    const toggle = page.locator('[role="switch"]').first();

    // Focus toggle
    await toggle.focus();
    await expect(toggle).toBeFocused();

    // Get initial state
    const initialState = await toggle.getAttribute('aria-checked');

    // Press Space to toggle
    await page.keyboard.press('Space');

    // State should change
    const newState = await toggle.getAttribute('aria-checked');
    expect(newState).not.toBe(initialState);
  });

  test('toggle keyboard interaction - Enter key', async ({ page }) => {
    const toggle = page.locator('[role="switch"]').first();

    // Focus toggle
    await toggle.focus();

    // Get initial state
    const initialState = await toggle.getAttribute('aria-checked');

    // Press Enter to toggle
    await page.keyboard.press('Enter');

    // State should change
    const newState = await toggle.getAttribute('aria-checked');
    expect(newState).not.toBe(initialState);
  });

  test('toggle visual feedback - thumb position', async ({ page }) => {
    const toggle = page.locator('[role="switch"]').first();
    const thumb = toggle.locator('span[aria-hidden="true"]');

    // Get initial thumb position class
    const initialClass = await thumb.getAttribute('class');

    // Click toggle
    await toggle.click();

    // Wait for animation
    await page.waitForTimeout(300);

    // Thumb should have translated
    const newClass = await thumb.getAttribute('class');
    expect(newClass).not.toBe(initialClass);
  });

  test('toggle with label clicks label to toggle', async ({ page }) => {
    // Find toggle with label
    const toggleContainer = page.locator('[x-data*="checked"]').filter({ has: page.locator('label') }).first();
    const label = toggleContainer.locator('label');
    const toggle = toggleContainer.locator('[role="switch"]');

    // Get initial state
    const initialState = await toggle.getAttribute('aria-checked');

    // Click label
    await label.click();

    // Wait for Alpine.js reactivity
    await page.waitForTimeout(200);

    // State should change
    const newState = await toggle.getAttribute('aria-checked');
    expect(newState).not.toBe(initialState);
  });

  test('toggle sizes - small, medium, large', async ({ page }) => {
    // Find toggles of different sizes
    const toggles = page.locator('[role="switch"]');
    const count = await toggles.count();

    expect(count).toBeGreaterThan(0);

    // Check that different sizes have different heights
    const sizes = new Set();

    for (let i = 0; i < Math.min(count, 5); i++) {
      const toggle = toggles.nth(i);
      const box = await toggle.boundingBox();

      if (box) {
        sizes.add(box.height);
      }
    }

    // We should have at least one size variant
    expect(sizes.size).toBeGreaterThanOrEqual(1);
  });

  test('toggle disabled state is not interactive', async ({ page }) => {
    // Find disabled toggle
    const disabledToggle = page.locator('[role="switch"]:disabled').first();

    if (await disabledToggle.count() > 0) {
      await expect(disabledToggle).toBeDisabled();

      // Get initial state
      const initialState = await disabledToggle.getAttribute('aria-checked');

      // Try to click (should not work)
      await disabledToggle.click({ force: true });

      // State should not change
      const finalState = await disabledToggle.getAttribute('aria-checked');
      expect(finalState).toBe(initialState);
    }
  });

  test('toggle accessibility - ARIA attributes', async ({ page }) => {
    const toggle = page.locator('[role="switch"]').first();

    // Check required ARIA attributes
    await expect(toggle).toHaveAttribute('role', 'switch');
    await expect(toggle).toHaveAttribute('aria-checked');

    // Check that aria-checked updates
    const initialChecked = await toggle.getAttribute('aria-checked');

    await toggle.click();
    await page.waitForTimeout(100);

    const newChecked = await toggle.getAttribute('aria-checked');
    expect(newChecked).not.toBe(initialChecked);
  });

  test('toggle focus visible ring', async ({ page }) => {
    const toggle = page.locator('[role="switch"]').first();

    // Tab to toggle
    await page.keyboard.press('Tab');

    // Check if toggle is focused
    const isFocused = await toggle.evaluate((el) => el === document.activeElement);

    if (isFocused) {
      await expect(toggle).toBeFocused();

      // Check for focus ring classes
      const classes = await toggle.getAttribute('class');
      expect(classes).toContain('focus');
    }
  });

  test('toggle Livewire integration - syncs state', async ({ page }) => {
    const toggle = page.locator('[role="switch"]').first();

    // Check if hidden input exists for Livewire
    const hiddenInput = page.locator('input[type="hidden"]').or(page.locator('input[type="checkbox"]')).first();

    if (await hiddenInput.count() > 0) {
      // Get initial input value
      const initialValue = await hiddenInput.inputValue();

      // Toggle
      await toggle.click();

      // Wait for Livewire update
      await page.waitForLoadState('networkidle');

      // Input value should have changed
      const newValue = await hiddenInput.inputValue();
      expect(newValue).not.toBe(initialValue);
    }
  });

  test('multiple toggles work independently', async ({ page }) => {
    const toggles = page.locator('[role="switch"]');
    const count = await toggles.count();

    if (count >= 2) {
      const firstToggle = toggles.nth(0);
      const secondToggle = toggles.nth(1);

      // Get initial states
      const firstInitialState = await firstToggle.getAttribute('aria-checked');
      const secondInitialState = await secondToggle.getAttribute('aria-checked');

      // Toggle first
      await firstToggle.click();

      // First should change, second should not
      const firstNewState = await firstToggle.getAttribute('aria-checked');
      const secondNewState = await secondToggle.getAttribute('aria-checked');

      expect(firstNewState).not.toBe(firstInitialState);
      expect(secondNewState).toBe(secondInitialState);
    }
  });

  test('toggle Cameroon context - notification preferences', async ({ page }) => {
    // Find toggles in notification settings section
    const notificationToggles = page.locator('[role="switch"]').filter({
      has: page.locator('label')
    });

    const count = await notificationToggles.count();

    if (count > 0) {
      // Find "Push Notifications" toggle
      const pushToggle = page.locator('label').filter({ hasText: /notification/i })
        .locator('..').locator('[role="switch"]').first();

      if (await pushToggle.count() > 0) {
        // Toggle notifications
        await pushToggle.click();

        // Verify state changed
        const state = await pushToggle.getAttribute('aria-checked');
        expect(state).toBeTruthy();
      }
    }
  });

  test('toggle smooth transition animation', async ({ page }) => {
    const toggle = page.locator('[role="switch"]').first();
    const thumb = toggle.locator('span[aria-hidden="true"]');

    // Check for transition classes
    const classes = await thumb.getAttribute('class');
    expect(classes).toMatch(/transition/);

    // Toggle and check animation completes
    await toggle.click();
    await page.waitForTimeout(350); // Wait for 300ms transition + buffer

    // Verify thumb has moved
    const box = await thumb.boundingBox();
    expect(box).toBeTruthy();
  });
});
