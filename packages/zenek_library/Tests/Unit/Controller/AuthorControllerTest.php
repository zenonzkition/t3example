<?php

declare(strict_types=1);

namespace Zenek\ZenekLibrary\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class AuthorControllerTest extends UnitTestCase
{
    /**
     * @var \Zenek\ZenekLibrary\Controller\AuthorController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Zenek\ZenekLibrary\Controller\AuthorController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllAuthorsFromRepositoryAndAssignsThemToView(): void
    {
        $allAuthors = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $authorRepository = $this->getMockBuilder(\Zenek\ZenekLibrary\Domain\Repository\AuthorRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $authorRepository->expects(self::once())->method('findAll')->will(self::returnValue($allAuthors));
        $this->subject->_set('authorRepository', $authorRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('authors', $allAuthors);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenAuthorToView(): void
    {
        $author = new \Zenek\ZenekLibrary\Domain\Model\Author();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('author', $author);

        $this->subject->showAction($author);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenAuthorToAuthorRepository(): void
    {
        $author = new \Zenek\ZenekLibrary\Domain\Model\Author();

        $authorRepository = $this->getMockBuilder(\Zenek\ZenekLibrary\Domain\Repository\AuthorRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $authorRepository->expects(self::once())->method('add')->with($author);
        $this->subject->_set('authorRepository', $authorRepository);

        $this->subject->createAction($author);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenAuthorToView(): void
    {
        $author = new \Zenek\ZenekLibrary\Domain\Model\Author();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('author', $author);

        $this->subject->editAction($author);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenAuthorInAuthorRepository(): void
    {
        $author = new \Zenek\ZenekLibrary\Domain\Model\Author();

        $authorRepository = $this->getMockBuilder(\Zenek\ZenekLibrary\Domain\Repository\AuthorRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $authorRepository->expects(self::once())->method('update')->with($author);
        $this->subject->_set('authorRepository', $authorRepository);

        $this->subject->updateAction($author);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenAuthorFromAuthorRepository(): void
    {
        $author = new \Zenek\ZenekLibrary\Domain\Model\Author();

        $authorRepository = $this->getMockBuilder(\Zenek\ZenekLibrary\Domain\Repository\AuthorRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $authorRepository->expects(self::once())->method('remove')->with($author);
        $this->subject->_set('authorRepository', $authorRepository);

        $this->subject->deleteAction($author);
    }
}
