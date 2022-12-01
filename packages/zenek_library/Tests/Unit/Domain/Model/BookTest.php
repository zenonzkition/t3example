<?php

declare(strict_types=1);

namespace Zenek\ZenekLibrary\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class BookTest extends UnitTestCase
{
    /**
     * @var \Zenek\ZenekLibrary\Domain\Model\Book|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Zenek\ZenekLibrary\Domain\Model\Book::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getCoverReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getCover()
        );
    }

    /**
     * @test
     */
    public function setCoverForFileReferenceSetsCover(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setCover($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('cover'));
    }

    /**
     * @test
     */
    public function getAuthorReturnsInitialValueForAuthor(): void
    {
        self::assertEquals(
            null,
            $this->subject->getAuthor()
        );
    }

    /**
     * @test
     */
    public function setAuthorForAuthorSetsAuthor(): void
    {
        $authorFixture = new \Zenek\ZenekLibrary\Domain\Model\Author();
        $this->subject->setAuthor($authorFixture);

        self::assertEquals($authorFixture, $this->subject->_get('author'));
    }
}
