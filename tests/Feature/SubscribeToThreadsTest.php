<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SubscribeToThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_subscribe_to_threads()
    {
        //  When the user is logged in
        $this->signIn();

        //  Given we have a thread...
        $thread = create('App\Thread');

        //  And the user subscribed to the thread
        $this->post($thread->path('/subscriptions'));

        $this->assertCount(1, $thread->fresh()->subscriptions);

    }
    
    /** @test */
    public function a_user_can_unsibscribe_from_threads()
    {
        $this->signIn();
        $thread = create('App\Thread');

        $thread->subscribe();

        $this->delete($thread->path('/subscriptions'));

        $this->assertCount(0, $thread->subscriptions);
    }
}