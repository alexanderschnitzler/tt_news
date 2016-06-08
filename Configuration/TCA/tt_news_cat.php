<?php
// ******************************************************************
// This is the standard TypoScript news category table, tt_news_cat
// ******************************************************************
return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xml:tt_news_cat',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'delete' => 'deleted',
        'default_sortby' => 'ORDER BY uid',
        'treeParentField' => 'parent_category',
        'dividers2tabs' => true,
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ),
//         'prependAtCopy' => 'LLL:EXT:lang/locallang_general.php:LGL.prependAtCopy',
        'hideAtCopy' => true,
        'mainpalette' => '2,10',
        'crdate' => 'crdate',
        'iconfile' => 'EXT:tt_news/res/gfx/tt_news_cat.gif',
        'searchFields' => 'uid,title'
    ),
    'interface' => array(
        'showRecordFieldList' => 'title,image,shortcut,shortcut_target'
    ),
    'columns' => array(
        'title' => array(
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.title',
            'config' => array(
                'type' => 'input',
                'size' => '40',
                'max' => '256',
                'eval' => 'required'
            )
        ),
        'title_lang_ol' => array(
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xml:tt_news_cat.title_lang_ol',
            'config' => array(
                'type' => 'input',
                'size' => '40',
                'max' => '256',

            )
        ),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
            'config' => array(
                'type' => 'check',
            )
        ),
        'fe_group' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.fe_group',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 5,
                'maxitems' => 20,
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.php:LGL.hide_at_login', -1),
                    array('LLL:EXT:lang/locallang_general.php:LGL.any_login', -2),
                    array('LLL:EXT:lang/locallang_general.php:LGL.usergroups', '--div--')
                ),
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups'
            )
        ),
        'starttime' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.starttime',
            'config' => array(
                'type' => 'input',
                'size' => '10',
                'max' => '20',
                'eval' => 'datetime',
                'checkbox' => '0',
                'default' => '0'
            )
        ),
        'endtime' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.endtime',
            'config' => array(
                'type' => 'input',
                'size' => '8',
                'max' => '20',
                'eval' => 'datetime',
                'checkbox' => '0',
                'default' => '0',
                'range' => array(
                    'upper' => mktime(0, 0, 0, 12, 31, 2020),
                    'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
                )
            )
        ),
        'parent_category' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xml:tt_news_cat.parent_category',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tt_news_cat',
                'foreign_table_where' => ' ORDER BY tt_news_cat.title ASC',
                'size' => 10,
                'autoSizeMax' => 50,
                'minitems' => 0,
                'maxitems' => 1,
                'renderType' => 'selectTree',
                'treeConfig' => array(
                    'expandAll' => true,
                    'parentField' => 'parent_category',
                    'appearance' => array(
                        'showHeader' => true,
                        'width' => 400
                    ),
                )
            )
        ),
        'image' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xml:tt_news_cat.image',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'file',
                'allowed' => 'gif,png,jpeg,jpg',
                'max_size' => 100,
                'uploadfolder' => 'uploads/pics',
                'show_thumbs' => 1,
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            )
        ),
        'shortcut' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xml:tt_news_cat.shortcut',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => '1',
                'maxitems' => '1',
                'minitems' => '0',
                'show_thumbs' => '1'
            )
        ),
        'shortcut_target' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xml:tt_news_cat.shortcut_target',
            'config' => array(
                'type' => 'input',
                'size' => '10',
                'checkbox' => '',
                'eval' => 'trim',
                'max' => '40'
            )
        ),
        'single_pid' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xml:tt_news_cat.single_pid',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => '1',
                'maxitems' => '1',
                'minitems' => '0',
                'show_thumbs' => '1'
            )
        ),
        'description' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xml:tt_news_cat.description',
            'config' => array(
                'type' => 'text',
                'cols' => '40',
                'rows' => '3'
            )
        ),
    ),

    'types' => array(
        '0' => array('showitem' => '
            title;;2;;1-1-1,parent_category;;;;1-1-1,
            --div--;LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xml:tt_news.tabs.special, image;;;;1-1-1,shortcut;;1;;1-1-1,single_pid;;;;1-1-1,description;;;;1-1-1,
            --div--;LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xml:tt_news.tabs.access, hidden,starttime,endtime,fe_group,
            --div--;LLL:EXT:tt_news/Resources/Private/Language/locallang_tca.xml:tt_news.tabs.extended,
        '),

    ),
    'palettes' => array(
        '1' => array('showitem' => 'shortcut_target'),
        '2' => array('showitem' => 'title_lang_ol'),
//        '10' => Array('showitem' => 'fe_group'),
    )
);
