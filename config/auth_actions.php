<?php
use App\Model\Entity\User;

$config = [
    // actions available to everyone, even guests
    'public_actions' => [
        'activities' => [ 'improve_sentences', 'translate_sentences_of' ],
        'audio' => [ 'of', 'index' ],
        'autocompletions' => '*',
        'reviews' => [ 'of' ],
        'contributions' => '*',
        'pages' => '*',
        'favorites' => [ 'of_user' ],
        's' => [ 's' ],
        'sentence_annotations' => [ 'last_modified' ],
        'sentences' => [
            'index',
            'show',
            'search',
            'advanced_search',
            'of_user',
            'random',
            'go_to_sentence',
            'several_random_sentences',
            'get_neighbors_for_ajax',
            'show_all_in',
            'with_audio'
        ],
        'sentences_lists' => [
            'index',
            'show',
            'export_to_csv',
            'of_user',
            'download',
            'search',
            'collaborative',
        ],
        'stats' => '*',
        'tags' => [
            'show_sentences_with_tag',
            'view_all',
            'search'
        ],
        'tools' => '*',
        'transcriptions' => [ 'view', 'of' ],
        'user' => [
            'profile',
            'accept_new_terms_of_use',
        ],
        'users' => [
            'all',
            'search',
            'show',
            'login',
            'check_login',
            'logout',
            'register',
            'new_password',
            'check_username',
            'check_email',
            'for_language',
            'login_dialog_template',
        ],
        'vocabulary' => [ 'of' ],
        'wall' => [
            'index',
            'show_message',
            'messages_of_user',
        ],
    ],

    // actions not available for guests or some users
    'auth_actions' => [
        'activities' => [
            'translate_sentences'  => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'adopt_sentences'      => User::ROLE_CONTRIBUTOR_OR_HIGHER,
        ],    
        'audio' => [
            'import' => [ User::ROLE_ADMIN ],
            'save_settings' => User::ROLE_CONTRIBUTOR_OR_HIGHER,
        ],
        'reviews'              => [ '*' => User::ROLE_CONTRIBUTOR_OR_HIGHER ],
        'exports'              => [ '*' => User::ROLE_CONTRIBUTOR_OR_HIGHER ],
        'favorites'            => [ '*' => User::ROLE_CONTRIBUTOR_OR_HIGHER ],
        'links'                => [ '*' => User::ROLE_ADV_CONTRIBUTOR_OR_HIGHER ],
        'imports'              => [ '*' => [ User::ROLE_ADMIN ] ],
        'licensing'            => [ '*' => User::ROLE_CONTRIBUTOR_OR_HIGHER ],
        'private_messages'     => [ '*' => User::ROLE_CONTRIBUTOR_OR_HIGHER ],
        'sentence_annotations' => [ '*' => User::ROLE_CONTRIBUTOR_OR_HIGHER ],
        'sentence_comments' => [
            'save'           => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'edit'           => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'delete_comment' => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'hide_message'   => [ User::ROLE_ADMIN ],
            'unhide_message' => [ User::ROLE_ADMIN ],
        ],
        'sentences' => [
            'add'                   => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'delete'                => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'import'                => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'adopt'                 => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'let_go'                => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'add_an_other_sentence' => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'edit_sentence'         => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'edit_license'          => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'save_translation'      => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'change_language'       => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'edit_audio'            => [ User::ROLE_ADMIN ],
            'edit_correctness'      => [ User::ROLE_ADMIN ],
        ],
        'sentences_lists'      => [ '*' => User::ROLE_CONTRIBUTOR_OR_HIGHER ],
        'tags'                 => [ '*' => User::ROLE_ADV_CONTRIBUTOR_OR_HIGHER ],
        'transcriptions'       => [ '*' => User::ROLE_CONTRIBUTOR_OR_HIGHER ],
        'user'                 => [ '*' => User::ROLE_CONTRIBUTOR_OR_HIGHER ],
        'users'                => [ '*' => [ User::ROLE_ADMIN ] ],
        'users_languages'      => [ '*' => User::ROLE_CONTRIBUTOR_OR_HIGHER ],
        'vocabulary'           => [ '*' => User::ROLE_CONTRIBUTOR_OR_HIGHER ],
        'wall' => [
            'save'           => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'save_inside'    => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'edit'           => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'delete_message' => User::ROLE_CONTRIBUTOR_OR_HIGHER,
            'hide_message'   => [ User::ROLE_ADMIN ],
            'unhide_message' => [ User::ROLE_ADMIN ],
        ],
    ],
];
