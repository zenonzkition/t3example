<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'ZenekLibrary',
        'Bookslist',
        [
            \Zenek\ZenekLibrary\Controller\BookController::class => 'list'
        ],
        // non-cacheable actions
        [
            \Zenek\ZenekLibrary\Controller\AuthorController::class => 'create, update, delete',
            \Zenek\ZenekLibrary\Controller\BookController::class => 'create'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    bookslist {
                        iconIdentifier = zenek_library-plugin-bookslist
                        title = LLL:EXT:zenek_library/Resources/Private/Language/locallang_db.xlf:tx_zenek_library_bookslist.name
                        description = LLL:EXT:zenek_library/Resources/Private/Language/locallang_db.xlf:tx_zenek_library_bookslist.description
                        tt_content_defValues {
                            CType = list
                            list_type = zeneklibrary_bookslist
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
