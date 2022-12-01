<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'ZenekLibrary',
        'web',
        'library',
        '',
        [
            \Zenek\ZenekLibrary\Controller\BookController::class => 'list, create',
            \Zenek\ZenekLibrary\Controller\AuthorController::class => 'list, show, create, edit, update, delete',
            
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:zenek_library/Resources/Public/Icons/user_mod_library.svg',
            'labels' => 'LLL:EXT:zenek_library/Resources/Private/Language/locallang_library.xlf',
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_zeneklibrary_domain_model_author', 'EXT:zenek_library/Resources/Private/Language/locallang_csh_tx_zeneklibrary_domain_model_author.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_zeneklibrary_domain_model_author');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_zeneklibrary_domain_model_book', 'EXT:zenek_library/Resources/Private/Language/locallang_csh_tx_zeneklibrary_domain_model_book.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_zeneklibrary_domain_model_book');
})();
