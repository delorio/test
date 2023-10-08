<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Lesson;
use Database\Factories\CourseFactory;
use Database\Factories\LessonFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LessonTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    /**@test */
    public function testCreateLesson(): void
    {
        $this->withoutExceptionHandling();
        $course= CourseFactory::new()->create();
        $data = [
            'name' => 'lesson1',
            'description' => 'lesson description',
            'course_id'=>$course['course_id']
        ];

        $response = $this->post('/api/lessons', $data);
        $this->assertDatabaseCount('lessons', 1);
        $lessons = Lesson::first();
        $this->assertEquals($data['name'], $lessons['name']);
        $this->assertEquals($data['description'], $lessons['description']);
        $this->assertEquals($data['course_id'], $lessons['course_id']);
        $response->assertStatus(200);
    }

    public function testIndexLesson(): void

    {
        $course = CourseFactory::new()->times(4)->create();
        $lessons = LessonFactory::new()->times(4)->create();

        $response = $this->call('get', '/api/lessons');
        $response->assertStatus(200);
    }
//
//
    public function testVirwLesson(): void
    {
        CourseFactory::new()->create();
        $lesson = LessonFactory::new()->create();
        $response = $this->call('get', "/api/lessons/{$lesson->lesson_id}");
        $response->assertStatus(200)->assertJsonCount(1);

    }
//
//
    public function testDeleteLesson(): void
    {
        CourseFactory::new()->create();
        $lessons = LessonFactory::new()->create();
        $response = $this->delete("/api/lessons/{$lessons->lesson_id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('lessons', ['lesson_id' => $lessons->lesson_id]);
    }
//
//
    public function testUpdateLesson(): void
    {
        $this->withoutExceptionHandling();
        $course= CourseFactory::new()->create();
        $lessons = LessonFactory::new()->create();
        $data = [
            'name' => 'lesson',
            'description' => 'lesson description',
             'course_id'=>$course['course_id']
        ];


        $response = $this->put("/api/lessons/{$lessons['lesson_id']}", $data);
        $this->assertDatabaseCount('lessons', 1);

        $lessonsUpdate = Lesson::first();
        $this->assertEquals($data['name'], $lessonsUpdate['name']);
        $this->assertEquals($data['description'], $lessonsUpdate['description']);
        $this->assertEquals($lessons['lesson_id'], $lessonsUpdate['lesson_id']);
        $response->assertStatus(200);
    }

}
