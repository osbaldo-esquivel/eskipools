<?php

namespace Tests\Unit\Domains\Picks;

use App\Domains\Picks\Models\Pick;
use App\Domains\Picks\Picks;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PicksServiceTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pick = Pick::factory()
            ->create([
                'teams' => [
                    'chargers',
                    'eagles',
                    'jets',
                ],
            ]);
    }

    public function testCreate()
    {           
        $expectedAttributes = $this->pick->toArray();
dd($expectedAttributes);
        $actualPick = Picks::create($expectedAttributes);

        $this->assertInstanceOf(Pick::class, $actualPick);
        $this->assertSame($expectedAttributes['week_id'], $actualPick->week_id);
        $this->assertSame($expectedAttributes['user_id'], $actualPick->user_id);
    }
}