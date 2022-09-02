<?php

namespace Tests\Unit\Domains\Picks;

use App\Domains\Games\Models\Game;
use App\Domains\Picks\Models\Pick;
use App\Domains\Picks\Picks;
use App\Domains\Weeks\Models\Week;
use App\Models\User;
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

        $this->user = User::factory()->create();

        $this->week = Week::factory()->create();

        $this->game = Game::factory()->create();

        $this->game->week->save($this->week);

        $this->pick = Pick::factory()
            ->create([
                'team' => 'eagles',
                'week_id' => $this->week->id,
                'user_id' => $this->user->id,
                'game_id' => $this->game->id,
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