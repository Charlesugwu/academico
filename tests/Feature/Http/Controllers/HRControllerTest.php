<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HRController
 */
class HRControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->get(route('hrDashboard'));

        $response->assertOk();
        $response->assertViewIs('hr.dashboard');
        $response->assertViewHas('selected_period');
        $response->assertViewHas('teachers');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function teacher_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $teacher = factory(\App\Models\Teacher::class)->create();

        $response = $this->get(route('teacherHours', [$teacher]));

        $response->assertOk();
        $response->assertViewIs('teacher.hours');
        $response->assertViewHas('selected_period');
        $response->assertViewHas('teacher');
        $response->assertViewHas('events');
        $response->assertViewHas('remote_events');

        // TODO: perform additional assertions
    }

    // test cases...
}