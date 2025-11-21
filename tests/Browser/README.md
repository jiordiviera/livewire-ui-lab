# Playwright Browser Tests - Day 4 Components

## Overview

This directory contains E2E (End-to-End) browser tests for Day 4 components using Playwright with `data-test` attributes for reliable and maintainable test selectors.

### Components Tested

- **Dropdown Component** ([tests/Browser/dropdown.spec.ts](dropdown.spec.ts))
- **Toggle Component** ([tests/Browser/toggle.spec.ts](toggle.spec.ts))

### Test Selectors

Tests use `data-test` attributes for stable, framework-agnostic selectors:

**Dropdown:**

- `data-test="dropdown-container"` - Main dropdown wrapper
- `data-test="dropdown-trigger"` - Trigger button
- `data-test="dropdown-menu"` - Dropdown menu
- `data-test-name="[name]"` - Identify specific dropdown by name

**Toggle:**

- `data-test="toggle-container"` - Main toggle wrapper
- `data-test="toggle-button"` - Toggle button
- `data-test="toggle-label"` - Toggle label
- `data-test-name="[name]"` - Identify specific toggle by name

## Running Tests

### Prerequisites

1. Make sure your Laravel app is running at `http://livewire-ui-lab.test`
2. Playwright browsers must be installed: `bunx playwright install`

### Test Commands

```bash
# Run all E2E tests (headless mode)
bun run test:e2e

# Run tests with UI mode (interactive)
bun run test:e2e:ui

# Run tests in headed mode (see browser)
bun run test:e2e:headed

# Run tests in debug mode
bun run test:e2e:debug

# Show test report
bun run test:e2e:report
```

### Recording Tests (Development Only)

Use Playwright's codegen to record your interactions and generate test code:

```bash
# Open codegen tool
bun run test:e2e:codegen

# Then navigate to any page and interact with it
# Codegen will generate test code automatically
```

**Workflow:**
1. Run `bun run test:e2e:codegen`
2. Navigate to `/ui/4` (or any page)
3. Interact with dropdowns, toggles, etc.
4. Copy the generated code from the Playwright Inspector
5. Paste and refine it in your `.spec.ts` files
6. Add proper assertions and cleanup

**Note:** Codegen is a development tool only - it's NOT run in CI. The CI runs the actual test files.

### Running Specific Tests

```bash
# Run only dropdown tests
bunx playwright test dropdown

# Run only toggle tests
bunx playwright test toggle

# Run specific browser
bunx playwright test --project=chromium
bunx playwright test --project=firefox
bunx playwright test --project=webkit
```

## Test Coverage

### Dropdown Component Tests

- Opens and closes on click
- Keyboard navigation (Arrow keys, Enter, Escape)
- Searchable dropdown filtering
- Selected value display
- Check icon on selected option
- Disabled state handling
- ARIA accessibility attributes
- Cameroon context examples

### Toggle Component Tests

- Click to toggle state
- Keyboard interaction (Space, Enter)
- Visual feedback (thumb position animation)
- Label clicks trigger toggle
- Different sizes (sm, md, lg)
- Disabled state handling
- ARIA accessibility attributes
- Livewire state synchronization
- Focus visible ring
- Multiple toggles independence
- Smooth transition animations

## Configuration

Configuration is in [playwright.config.ts](../../playwright.config.ts):

- Base URL: `http://livewire-ui-lab.test`
- Test directory: `tests/Browser`
- Browsers: Chromium, Firefox, WebKit
- Screenshots: On failure only
- Video: Retained on failure
- Trace: On first retry

## CI/CD

Tests are configured to run in CI with:

- 2 retries on failure
- Single worker for stability
- Full parallel execution locally
