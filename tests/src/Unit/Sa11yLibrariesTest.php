<?php

declare(strict_types=1);

namespace Drupal\Tests\localgov_sa11y\Unit;

use PHPUnit\Framework\TestCase;

/**
 * Validates local Sa11y assets are used by the module library.
 */
final class Sa11yLibrariesTest extends TestCase
{
    public function testLibrariesUseLocalAssetsOnly(): void
    {
        $libraries_path = dirname(__DIR__, 3) . '/localgov_sa11y.libraries.yml';
        $libraries_contents = file_get_contents($libraries_path);

        $this->assertNotFalse($libraries_contents, 'Libraries definition should be readable.');
        $this->assertStringNotContainsString('https://', $libraries_contents);
        $this->assertStringContainsString('assets/sa11y/js/lang/en.umd.js', $libraries_contents);
        $this->assertStringContainsString('assets/sa11y/js/sa11y.umd.min.js', $libraries_contents);
        $this->assertStringContainsString('assets/sa11y/css/sa11y.min.css', $libraries_contents);
    }
}
