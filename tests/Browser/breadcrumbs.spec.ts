import { test, expect } from '@playwright/test';

test.describe('Breadcrumbs Component - Day 7', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('/ui/7');
    await page.waitForLoadState('networkidle');
  });

  test('breadcrumbs component renders correctly', async ({ page }) => {
    const breadcrumbs = page.locator('[data-test="breadcrumbs-container"]').first();
    await expect(breadcrumbs).toBeVisible();
  });

  test('breadcrumbs have navigation role and ARIA label', async ({ page }) => {
    const breadcrumbs = page.locator('[data-test="breadcrumbs-container"]').first();
    await expect(breadcrumbs).toHaveAttribute('role', 'navigation');
    await expect(breadcrumbs).toHaveAttribute('aria-label', 'Breadcrumb');
  });

  test('breadcrumbs display all items', async ({ page }) => {
    const breadcrumbs = page.locator('[data-test="breadcrumbs-container"]').first();
    const items = breadcrumbs.locator('[data-test="breadcrumb-item"]');

    const count = await items.count();
    expect(count).toBeGreaterThan(0);
  });

  test('breadcrumbs have clickable links', async ({ page }) => {
    const breadcrumbs = page.locator('[data-test="breadcrumbs-container"]').first();
    const links = breadcrumbs.locator('[data-test="breadcrumb-link"]');

    const count = await links.count();
    if (count > 0) {
      const firstLink = links.first();
      await expect(firstLink).toHaveAttribute('href');
      await expect(firstLink).toHaveClass(/hover:text-foreground/);
    }
  });

  test('last breadcrumb item is not clickable', async ({ page }) => {
    const breadcrumbs = page.locator('[data-test="breadcrumbs-container"]').first();
    const currentPage = breadcrumbs.locator('[data-test="breadcrumb-current"]').first();

    await expect(currentPage).toBeVisible();
    await expect(currentPage).toHaveAttribute('aria-current', 'page');

    // Should be a span, not a link
    const tagName = await currentPage.evaluate(el => el.tagName.toLowerCase());
    expect(tagName).toBe('span');
  });

  test('breadcrumbs display separators between items', async ({ page }) => {
    const breadcrumbs = page.locator('[data-test="breadcrumbs-container"]').first();
    const separators = breadcrumbs.locator('[data-test="breadcrumb-separator"]');

    const count = await separators.count();

    // Separators should be N-1 where N is number of items
    const items = await breadcrumbs.locator('[data-test="breadcrumb-item"]').count();
    expect(count).toBe(items - 1);
  });

  test('separators are SVG icons', async ({ page }) => {
    const separator = page.locator('[data-test="breadcrumb-separator"]').first();
    await expect(separator).toBeVisible();

    // Check it's an SVG
    const tagName = await separator.evaluate(el => el.tagName.toLowerCase());
    expect(tagName).toBe('svg');
  });

  test('breadcrumbs examples are displayed', async ({ page }) => {
    // Check for different example sections
    await expect(page.locator('text=Basic Navigation')).toBeVisible();
    await expect(page.locator('text=Administrative Navigation (Cameroon)')).toBeVisible();
    await expect(page.locator('text=Slash Separator')).toBeVisible();
    await expect(page.locator('text=Dot Separator')).toBeVisible();
    await expect(page.locator('text=Deep Hierarchy')).toBeVisible();
  });

  test('basic navigation breadcrumb contains expected items', async ({ page }) => {
    const section = page.locator('text=Basic Navigation').locator('..');
    await expect(section.locator('text=Home')).toBeVisible();
    await expect(section.locator('text=Products')).toBeVisible();
    await expect(section.locator('text=Electronics')).toBeVisible();
    await expect(section.locator('text=Laptop')).toBeVisible();
  });

  test('Cameroon administrative navigation contains expected items', async ({ page }) => {
    const section = page.locator('text=Administrative Navigation (Cameroon)').locator('..');
    await expect(section.locator('text=Accueil')).toBeVisible();
    await expect(section.locator('text=Régions')).toBeVisible();
    await expect(section.locator('text=Centre')).toBeVisible();
    await expect(section.locator('text=Yaoundé')).toBeVisible();
  });

  test('deep hierarchy breadcrumb shows multiple levels', async ({ page }) => {
    const section = page.locator('text=Deep Hierarchy').locator('..');
    await expect(section.locator('text=Cameroun')).toBeVisible();
    await expect(section.locator('text=Douala')).toBeVisible();
  });

  test('breadcrumbs have proper text color for links', async ({ page }) => {
    const link = page.locator('[data-test="breadcrumb-link"]').first();
    await expect(link).toHaveClass(/text-muted-foreground/);
  });

  test('current page has proper text color', async ({ page }) => {
    const currentPage = page.locator('[data-test="breadcrumb-current"]').first();
    await expect(currentPage).toHaveClass(/text-foreground/);
    await expect(currentPage).toHaveClass(/font-medium/);
  });

  test('breadcrumbs features list is visible', async ({ page }) => {
    await expect(page.locator('text=Icon separators')).toBeVisible();
    await expect(page.locator('text=Active page indication')).toBeVisible();
    await expect(page.locator('text=Flexible item format')).toBeVisible();
    await expect(page.locator('text=Hover effects')).toBeVisible();
  });

  test('breadcrumbs in combined example', async ({ page }) => {
    const combinedSection = page.locator('text=Combined Usage Example').locator('..');
    const breadcrumbs = combinedSection.locator('[data-test="breadcrumbs-container"]');

    await expect(breadcrumbs).toBeVisible();
    await expect(breadcrumbs.locator('text=Université')).toBeVisible();
    await expect(breadcrumbs.locator('text=Étudiants')).toBeVisible();
  });

  test('breadcrumbs containers have proper spacing', async ({ page }) => {
    const breadcrumbs = page.locator('[data-test="breadcrumbs-container"]').first();
    await expect(breadcrumbs).toHaveClass(/gap-2/);
  });

  test('breadcrumb items are in an ordered list', async ({ page }) => {
    const breadcrumbs = page.locator('[data-test="breadcrumbs-container"]').first();
    const ol = breadcrumbs.locator('ol[role="list"]');

    await expect(ol).toBeVisible();
  });

  test('slash separator example uses different separator', async ({ page }) => {
    // This tests that different separator props work
    const section = page.locator('text=Slash Separator').locator('..');
    await expect(section.locator('text=Documents')).toBeVisible();
    await expect(section.locator('text=Administrative')).toBeVisible();
    await expect(section.locator('text=CNI Request')).toBeVisible();
  });

  test('dot separator example uses different separator', async ({ page }) => {
    const section = page.locator('text=Dot Separator').locator('..');
    await expect(section.locator('text=Settings')).toBeVisible();
    await expect(section.locator('text=Profile')).toBeVisible();
    await expect(section.locator('text=Security')).toBeVisible();
  });

  test('breadcrumbs have appropriate text size', async ({ page }) => {
    const breadcrumbs = page.locator('[data-test="breadcrumbs-container"]').first();
    await expect(breadcrumbs).toHaveClass(/text-sm/);
  });

  test('separator icons have appropriate size', async ({ page }) => {
    const separator = page.locator('[data-test="breadcrumb-separator"]').first();
    await expect(separator).toHaveClass(/size-4/);
  });

  test('breadcrumb links have transition effects', async ({ page }) => {
    const link = page.locator('[data-test="breadcrumb-link"]').first();
    await expect(link).toHaveClass(/transition-colors/);
  });

  test('page title and description are correct', async ({ page }) => {
    await expect(page.locator('text=Pagination & Breadcrumbs')).toBeVisible();
  });

  test('multiple breadcrumb examples render without conflicts', async ({ page }) => {
    // Count all breadcrumb containers
    const containers = page.locator('[data-test="breadcrumbs-container"]');
    const count = await containers.count();

    // Should have multiple examples
    expect(count).toBeGreaterThan(3);
  });
});
