<?php

namespace Tests\Feature;

use App\Models\Course;
use Database\Factories\CourseFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    /**@test */
    public function testCreateCourse(): void
    {
        $this->withoutExceptionHandling();
        $data = [
            'name' => 'php',
            'description' => 'php database'
        ];
        $response = $this->post('/api/courses', $data);
        $this->assertDatabaseCount('courses', 1);
        $courses = Course::first();

        $this->assertEquals($data['name'], $courses->name);
        $this->assertEquals($data['description'], $courses->description);
        $response->assertStatus(200)->assertJsonCount(1);
    }

    public function testIndexCourse(): void
    {
        $response = $this->call('get', '/api/courses');
        $response->assertStatus(200)->assertJsonCount(1);
    }


    public function testViewCourse(): void
    {

        $courses = Course::factory()->create();
        $response = $this->get("/api/courses/{$courses->course_id}");
        $response->assertStatus(200)->assertJsonCount(1);

    }

    public function testDeleteCourse(): void
    {
        $course = CourseFactory::new()->create();
        $response = $this->delete("/api/courses/{$course->course_id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('courses', ['course_id' => $course->course_id]);
    }

    public function testCourseUpdate(): void
    {
        $this->withoutExceptionHandling();
        $courses = CourseFactory::new()->create();
        $data = [
            'name' => 'php',
            'description' => 'php database'
        ];


        $response = $this->put("/api/courses/{$courses['course_id']}", $data);
        $this->assertDatabaseCount('courses', 1);

        $coursesUpdate = Course::first();
        $this->assertEquals($data['name'], $coursesUpdate['name']);
        $this->assertEquals($data['description'], $coursesUpdate['description']);
        $this->assertEquals($courses['course_id'], $coursesUpdate['course_id']);
    }



}
