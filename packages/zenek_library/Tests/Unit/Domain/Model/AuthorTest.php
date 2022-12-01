<?php

declare(strict_types=1);

namespace Zenek\ZenekLibrary\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class AuthorTest extends UnitTestCase
{
    /**
     * @var \Zenek\ZenekLibrary\Domain\Model\Author|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Zenek\ZenekLibrary\Domain\Model\Author::class,
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
    public function getFirstNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getFirstName()
        );
    }

    /**
     * @test
     */
    public function setFirstNameForStringSetsFirstName(): void
    {
        $this->subject->setFirstName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('firstName'));
    }

    /**
     * @test
     */
    public function getLastNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getLastName()
        );
    }

    /**
     * @test
     */
    public function setLastNameForStringSetsLastName(): void
    {
        $this->subject->setLastName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('lastName'));
    }

    /**
     * @test
     */
    public function getPhotoReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getPhoto()
        );
    }

    /**
     * @test
     */
    public function setPhotoForFileReferenceSetsPhoto(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setPhoto($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('photo'));
    }
}
