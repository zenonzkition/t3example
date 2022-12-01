<?php

declare(strict_types=1);

namespace Zenek\ZenekLibrary\Domain\Model;


/**
 * This file is part of the "library_model" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * Book
 */
class Book extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * cover
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $cover = null;

    /**
     * author
     *
     * @var \Zenek\ZenekLibrary\Domain\Model\Author
     */
    protected $author = null;

    /**
     * Returns the author
     *
     * @return \Zenek\ZenekLibrary\Domain\Model\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author
     *
     * @param \Zenek\ZenekLibrary\Domain\Model\Author $author
     * @return void
     */
    public function setAuthor(\Zenek\ZenekLibrary\Domain\Model\Author $author)
    {
        $this->author = $author;
    }

    /**
     * Returns the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the cover
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Sets the cover
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $cover
     * @return void
     */
    public function setCover(\TYPO3\CMS\Extbase\Domain\Model\FileReference $cover)
    {
        $this->cover = $cover;
    }
}
