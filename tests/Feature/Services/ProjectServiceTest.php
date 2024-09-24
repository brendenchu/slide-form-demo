<?php

namespace Feature\Services;

use App\Enums\ProjectStep;
use App\Models\Story\Project;
use App\Services\ProjectService;
use Exception;
use Tests\TestCase;

class ProjectServiceTest extends TestCase
{
    protected ProjectService $projectService;

    protected Project $project;

    protected ProjectStep $step = ProjectStep::STEP_ONE;

    protected array $responses = [];

    public function setUp(): void
    {
        parent::setUp();
        $this->projectService = new ProjectService;
        $this->project = Project::factory()->create();
        $this->responses = [
            'section_a_1' => 'Response 1',
            'section_a_2' => 'Response 2',
            'section_a_3' => 'Response 3',
            'section_a_4' => 'Response 4',
            'section_a_5' => 'Response 5',
            'section_a_6' => 'Response 6',
        ];
    }

    public function test_that_project_service_can_set_and_get_project()
    {
        // Test setProject method
        $this->projectService->setProject($this->project);

        // Test getProject method
        $this->assertEquals($this->project, $this->projectService->getProject());
    }

    /**
     * @throws Exception
     */
    public function test_that_project_service_throws_exception_when_no_project_is_set()
    {
        // Expect an exception to be thrown
        $this->expectException(Exception::class);

        // Expect the exception message to be
        $this->expectExceptionMessage('No project set.');

        // Call the getProject method
        $this->projectService->getProject();
    }

    /**
     * @throws Exception
     */
    public function test_that_project_service_can_save_responses()
    {
        // Test saveResponses method
        $this->projectService->setProject($this->project)
            ->setSteps($this->step)
            ->saveResponses($this->responses);

        // Test getResponsesArray method
        $this->assertEquals($this->responses, $this->projectService->getResponsesArray());

    }
}
