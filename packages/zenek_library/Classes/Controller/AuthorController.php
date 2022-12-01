<?php

declare(strict_types=1);

namespace Zenek\ZenekLibrary\Controller;


/**
 * This file is part of the "library_model" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * AuthorController
 */
class AuthorController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * authorRepository
     *
     * @var \Zenek\ZenekLibrary\Domain\Repository\AuthorRepository
     */
    protected $authorRepository = null;

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $authors = $this->authorRepository->findAll();
        $this->view->assign('authors', $authors);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Zenek\ZenekLibrary\Domain\Model\Author $author
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Zenek\ZenekLibrary\Domain\Model\Author $author): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('author', $author);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \Zenek\ZenekLibrary\Domain\Model\Author $newAuthor
     */
    public function createAction(\Zenek\ZenekLibrary\Domain\Model\Author $newAuthor)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->authorRepository->add($newAuthor);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Zenek\ZenekLibrary\Domain\Model\Author $author
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("author")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\Zenek\ZenekLibrary\Domain\Model\Author $author): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('author', $author);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \Zenek\ZenekLibrary\Domain\Model\Author $author
     */
    public function updateAction(\Zenek\ZenekLibrary\Domain\Model\Author $author)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->authorRepository->update($author);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Zenek\ZenekLibrary\Domain\Model\Author $author
     */
    public function deleteAction(\Zenek\ZenekLibrary\Domain\Model\Author $author)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->authorRepository->remove($author);
        $this->redirect('list');
    }

    /**
     * @param \Zenek\ZenekLibrary\Domain\Repository\AuthorRepository $authorRepository
     */
    public function injectAuthorRepository(\Zenek\ZenekLibrary\Domain\Repository\AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }
}
