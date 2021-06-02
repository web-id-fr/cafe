<?php

namespace WebId\Cafe\Tests\Unit;

use Illuminate\Support\Facades\File;
use WebId\Cafe\Tests\TestCase;

class RepositoryCommandTest extends TestCase
{
    /** @test */
    public function it_can_create_repository_class(): void
    {
        File::deleteDirectory(config('cafe.repository.folder_path'));

        $this->artisan('make:repo User')
            ->assertExitCode(0);

        $this->assertFileExists(config('cafe.repository.folder_path') . '/UserRepository.php');
    }
}
