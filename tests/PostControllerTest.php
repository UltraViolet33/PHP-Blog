<?php 

namespace Tests;

use App\controllers\PostController;

use PHPUnit\Framework\TestCase;
class PostControllerTest extends TestCase {

    public function testDateToString() {
        $postController = new \App\controllers\PostController();

        $dateString = $postController->dateToString('2023-10-29');
        $this->assertEquals('10/29/2023', $dateString);

        // $mockedPostModel = $this->createMock(\App\controllers\PostController::class);
        // $this->assertEquals(true, true);

    }

}
