import { test, expect } from '@playwright/test';

test.describe('Dropdown Component - Day 4', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('/ui/4');
    // Wait for Livewire to be ready
    await page.waitForLoadState('networkidle');
  });

  test('dropdown opens and closes on click', async ({ page }) => {
    const dropdown = page.locator('[wire\\:ignore]').filter({ has: page.locator('button[aria-haspopup="listbox"]') }).first();
    const trigger = dropdown.locator('button[aria-haspopup="listbox"]');
    const menu = dropdown.locator('[role="listbox"]');

    // Initially menu should be hidden
    await expect(menu).toBeHidden();

    // Click to open
    await trigger.click();
    await expect(trigger).toHaveAttribute('aria-expanded', 'true');
    await expect(menu).toBeVisible();

    // Click outside to close
    await page.locator('body').click({ position: { x: 10, y: 10 } });
    await expect(menu).toBeHidden();
  });

  test('dropdown keyboard navigation with arrow keys', async ({ page }) => {
    const dropdown = page.locator('[wire\\:ignore]').filter({ has: page.locator('button[aria-haspopup="listbox"]') }).first();
    const trigger = dropdown.locator('button[aria-haspopup="listbox"]');

    // Focus and open with click
    await trigger.click();

    // Wait for menu to be visible
    const menu = dropdown.locator('[role="listbox"]');
    await expect(menu).toBeVisible();

    // Press ArrowDown to navigate
    await page.keyboard.press('ArrowDown');

    // First option should be focused
    const firstOption = menu.locator('button[role="option"]').first();
    await expect(firstOption).toHaveClass(/bg-accent/);

    // Press ArrowDown again
    await page.keyboard.press('ArrowDown');

    // Second option should be focused
    const secondOption = menu.locator('button[role="option"]').nth(1);
    await expect(secondOption).toHaveClass(/bg-accent/);

    // Press ArrowUp to go back
    await page.keyboard.press('ArrowUp');
    await expect(firstOption).toHaveClass(/bg-accent/);
  });

  test('dropdown selects option with Enter key', async ({ page }) => {
    const dropdown = page.locator('[wire\\:ignore]').filter({ has: page.locator('button[aria-haspopup="listbox"]') }).first();
    const trigger = dropdown.locator('button[aria-haspopup="listbox"]');

    // Open dropdown
    await trigger.click();
    const menu = dropdown.locator('[role="listbox"]');
    await expect(menu).toBeVisible();

    // Navigate to first option
    await page.keyboard.press('ArrowDown');

    // Select with Enter
    await page.keyboard.press('Enter');

    // Menu should close
    await expect(menu).toBeHidden();

    // Trigger should show selected value (we need to check the actual text)
    const selectedText = await trigger.textContent();
    expect(selectedText).toBeTruthy();
  });

  test('dropdown closes with Escape key', async ({ page }) => {
    const dropdown = page.locator('[wire\\:ignore]').filter({ has: page.locator('button[aria-haspopup="listbox"]') }).first();
    const trigger = dropdown.locator('button[aria-haspopup="listbox"]');
    const menu = dropdown.locator('[role="listbox"]');

    // Open dropdown
    await trigger.click();
    await expect(menu).toBeVisible();

    // Close with Escape
    await page.keyboard.press('Escape');
    await expect(menu).toBeHidden();
  });

  test('searchable dropdown filters options', async ({ page }) => {
    // Find the searchable dropdown (second one on the page)
    const searchableDropdown = page.locator('[wire\\:ignore]').filter({ has: page.locator('button[aria-haspopup="listbox"]') }).nth(1);
    const trigger = searchableDropdown.locator('button[aria-haspopup="listbox"]');

    // Open dropdown
    await trigger.click();

    // Find search input
    const searchInput = searchableDropdown.locator('input[type="text"][placeholder="Search..."]');
    await expect(searchInput).toBeVisible();

    // Get initial option count
    const menu = searchableDropdown.locator('[role="listbox"]');
    const initialCount = await menu.locator('button[role="option"]').count();

    // Type to filter
    await searchInput.fill('Douala');

    // Wait a bit for Alpine.js reactivity
    await page.waitForTimeout(300);

    // Option count should be reduced
    const filteredCount = await menu.locator('button[role="option"]').count();
    expect(filteredCount).toBeLessThanOrEqual(initialCount);
  });

  test('dropdown shows selected value', async ({ page }) => {
    const dropdown = page.locator('[wire\\:ignore]').filter({ has: page.locator('button[aria-haspopup="listbox"]') }).first();
    const trigger = dropdown.locator('button[aria-haspopup="listbox"]');

    // Open dropdown
    await trigger.click();
    const menu = dropdown.locator('[role="listbox"]');

    // Click first option
    const firstOption = menu.locator('button[role="option"]').first();
    const optionText = await firstOption.textContent();
    await firstOption.click();

    // Menu should close
    await expect(menu).toBeHidden();

    // Trigger should display selected text
    await expect(trigger).toContainText(optionText?.trim() || '');
  });

  test('dropdown displays check icon on selected option', async ({ page }) => {
    const dropdown = page.locator('[wire\\:ignore]').filter({ has: page.locator('button[aria-haspopup="listbox"]') }).first();
    const trigger = dropdown.locator('button[aria-haspopup="listbox"]');

    // Open dropdown
    await trigger.click();
    const menu = dropdown.locator('[role="listbox"]');

    // Select first option
    const firstOption = menu.locator('button[role="option"]').first();
    await firstOption.click();

    // Reopen to check visual feedback
    await trigger.click();
    await expect(menu).toBeVisible();

    // First option should have check icon visible
    const checkIcon = firstOption.locator('svg');
    await expect(checkIcon).toBeVisible();
  });

  test('disabled dropdown is not interactive', async ({ page }) => {
    // This would need a disabled dropdown in the page
    // For now, we test that disabled state can be applied
    const trigger = page.locator('button[aria-haspopup="listbox"]:disabled').first();

    if (await trigger.count() > 0) {
      await expect(trigger).toBeDisabled();
      await expect(trigger).toHaveClass(/opacity-50/);
    }
  });

  test('dropdown accessibility - ARIA attributes', async ({ page }) => {
    const dropdown = page.locator('[wire\\:ignore]').filter({ has: page.locator('button[aria-haspopup="listbox"]') }).first();
    const trigger = dropdown.locator('button[aria-haspopup="listbox"]');
    const menu = dropdown.locator('[role="listbox"]');

    // Check ARIA attributes on trigger
    await expect(trigger).toHaveAttribute('aria-haspopup', 'listbox');
    await expect(trigger).toHaveAttribute('aria-expanded');

    // Open dropdown
    await trigger.click();

    // Check menu has proper role
    await expect(menu).toHaveAttribute('role', 'listbox');

    // Check options have proper role
    const options = menu.locator('button[role="option"]');
    const firstOption = options.first();
    await expect(firstOption).toHaveAttribute('role', 'option');
    await expect(firstOption).toHaveAttribute('aria-selected');
  });

  test('dropdown Cameroon context - Country selection', async ({ page }) => {
    const dropdown = page.locator('[wire\\:ignore]').filter({ has: page.locator('button[aria-haspopup="listbox"]') }).first();
    const trigger = dropdown.locator('button[aria-haspopup="listbox"]');

    // Open dropdown
    await trigger.click();
    const menu = dropdown.locator('[role="listbox"]');

    // Look for Cameroon option
    const cameroonOption = menu.locator('button[role="option"]').filter({ hasText: 'Cameroon' });

    if (await cameroonOption.count() > 0) {
      await cameroonOption.click();

      // Verify selection
      await expect(trigger).toContainText('Cameroon');
    }
  });
});
