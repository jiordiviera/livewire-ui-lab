import { test, expect } from '@playwright/test';

test.describe('Pagination Component - Day 7', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('/ui/7');
    await page.waitForLoadState('networkidle');
  });

  test('pagination component renders correctly', async ({ page }) => {
    const pagination = page.locator('[data-test="pagination-container"]').first();
    await expect(pagination).toBeVisible();
  });

  test('pagination shows results counter', async ({ page }) => {
    const info = page.locator('[data-test="pagination-info"]').first();
    await expect(info).toBeVisible();
    await expect(info).toContainText('Showing');
    await expect(info).toContainText('of');
    await expect(info).toContainText('results');
  });

  test('pagination has previous and next buttons', async ({ page }) => {
    const previousBtn = page.locator('[data-test="pagination-previous"]').first();
    const nextBtn = page.locator('[data-test="pagination-next"]').first();

    await expect(previousBtn).toBeVisible();
    await expect(previousBtn).toContainText('Previous');

    await expect(nextBtn).toBeVisible();
    await expect(nextBtn).toContainText('Next');
  });

  test('previous button is disabled on first page', async ({ page }) => {
    const previousBtn = page.locator('[data-test="pagination-previous"]').first();

    // Should be disabled on page 1
    await expect(previousBtn).toBeDisabled();
    await expect(previousBtn).toHaveClass(/opacity-50/);
  });

  test('pagination displays page numbers', async ({ page }) => {
    const pagesContainer = page.locator('[data-test="pagination-pages"]').first();
    await expect(pagesContainer).toBeVisible();

    const pageButtons = pagesContainer.locator('[data-test="pagination-page"]');
    const count = await pageButtons.count();

    expect(count).toBeGreaterThan(0);
  });

  test('current page has active styling', async ({ page }) => {
    const pagesContainer = page.locator('[data-test="pagination-pages"]').first();
    const currentPage = pagesContainer.locator('[aria-current="page"]');

    await expect(currentPage).toBeVisible();
    await expect(currentPage).toHaveClass(/bg-primary/);
    await expect(currentPage).toHaveClass(/text-primary-foreground/);
  });

  test('page 1 is active initially', async ({ page }) => {
    const pagesContainer = page.locator('[data-test="pagination-pages"]').first();
    const page1 = pagesContainer.locator('[data-test="pagination-page"][data-page="1"]');

    await expect(page1).toHaveAttribute('aria-current', 'page');
  });

  test('clicking next button changes page', async ({ page }) => {
    const nextBtn = page.locator('[data-test="pagination-next"]').first();
    const pagesContainer = page.locator('[data-test="pagination-pages"]').first();

    // Initially on page 1
    await expect(pagesContainer.locator('[data-page="1"]')).toHaveAttribute('aria-current', 'page');

    // Click next
    await nextBtn.click();
    await page.waitForTimeout(500); // Wait for Livewire

    // Should be on page 2
    const page2 = pagesContainer.locator('[data-page="2"]');
    await expect(page2).toHaveAttribute('aria-current', 'page');
  });

  test('clicking specific page number navigates to that page', async ({ page }) => {
    const pagesContainer = page.locator('[data-test="pagination-pages"]').first();
    const page2Btn = pagesContainer.locator('[data-test="pagination-page"][data-page="2"]');

    // Click page 2
    await page2Btn.click();
    await page.waitForTimeout(500); // Wait for Livewire

    // Should be on page 2
    await expect(page2Btn).toHaveAttribute('aria-current', 'page');
  });

  test('previous button becomes enabled after navigation', async ({ page }) => {
    const previousBtn = page.locator('[data-test="pagination-previous"]').first();
    const nextBtn = page.locator('[data-test="pagination-next"]').first();

    // Initially disabled
    await expect(previousBtn).toBeDisabled();

    // Go to page 2
    await nextBtn.click();
    await page.waitForTimeout(500);

    // Previous should now be enabled
    await expect(previousBtn).toBeEnabled();
  });

  test('pagination updates results counter after navigation', async ({ page }) => {
    const info = page.locator('[data-test="pagination-info"]').first();
    const nextBtn = page.locator('[data-test="pagination-next"]').first();

    // Get initial text
    const initialText = await info.textContent();

    // Navigate to next page
    await nextBtn.click();
    await page.waitForTimeout(500);

    // Text should have changed
    const updatedText = await info.textContent();
    expect(updatedText).not.toBe(initialText);
  });

  test('table data updates after pagination', async ({ page }) => {
    const table = page.locator('[data-test="cities-table"]').first();
    const rows = table.locator('[data-test="city-row"]');

    // Get first row city name on page 1
    const firstRowPage1 = await rows.first().locator('td').first().textContent();

    // Navigate to page 2
    const nextBtn = page.locator('[data-test="pagination-next"]').first();
    await nextBtn.click();
    await page.waitForTimeout(500);

    // Get first row city name on page 2
    const firstRowPage2 = await rows.first().locator('td').first().textContent();

    // They should be different
    expect(firstRowPage1).not.toBe(firstRowPage2);
  });

  test('pagination shows ellipsis for many pages', async ({ page }) => {
    const pagesContainer = page.locator('[data-test="pagination-pages"]').first();

    // Check if ellipsis exists (only if there are enough pages)
    const ellipsis = pagesContainer.locator('[data-test="pagination-ellipsis"]');
    const count = await ellipsis.count();

    // If pagination has more than 7 pages, ellipsis should appear
    if (count > 0) {
      await expect(ellipsis.first()).toContainText('...');
    }
  });

  test('pagination navigation has proper ARIA attributes', async ({ page }) => {
    const nav = page.locator('nav[aria-label="Pagination Navigation"]').first();
    await expect(nav).toBeVisible();
    await expect(nav).toHaveAttribute('role', 'navigation');
  });

  test('pagination buttons have proper hover states', async ({ page }) => {
    const nextBtn = page.locator('[data-test="pagination-next"]').first();

    await expect(nextBtn).toHaveClass(/hover:bg-accent/);
    await expect(nextBtn).toHaveClass(/transition-all/);
  });

  test('pagination displays 5 cities per page', async ({ page }) => {
    const table = page.locator('[data-test="cities-table"]').first();
    const rows = table.locator('[data-test="city-row"]');

    const count = await rows.count();
    expect(count).toBe(5);
  });

  test('pagination features list is visible', async ({ page }) => {
    await expect(page.locator('text=Livewire integration')).toBeVisible();
    await expect(page.locator('text=Smart ellipsis logic')).toBeVisible();
    await expect(page.locator('text=Previous/Next buttons')).toBeVisible();
    await expect(page.locator('text=Disabled states')).toBeVisible();
    await expect(page.locator('text=Results counter')).toBeVisible();
  });

  test('pagination icons are visible', async ({ page }) => {
    const previousBtn = page.locator('[data-test="pagination-previous"]').first();
    const nextBtn = page.locator('[data-test="pagination-next"]').first();

    // Check for chevron icons
    await expect(previousBtn.locator('svg')).toBeVisible();
    await expect(nextBtn.locator('svg')).toBeVisible();
  });

  test('clicking previous button navigates backward', async ({ page }) => {
    const previousBtn = page.locator('[data-test="pagination-previous"]').first();
    const nextBtn = page.locator('[data-test="pagination-next"]').first();
    const pagesContainer = page.locator('[data-test="pagination-pages"]').first();

    // Go to page 2
    await nextBtn.click();
    await page.waitForTimeout(500);
    await expect(pagesContainer.locator('[data-page="2"]')).toHaveAttribute('aria-current', 'page');

    // Go back to page 1
    await previousBtn.click();
    await page.waitForTimeout(500);
    await expect(pagesContainer.locator('[data-page="1"]')).toHaveAttribute('aria-current', 'page');
  });
});
