<?php
/**
 * Tatoeba Project, free collaborative creation of multilingual corpuses project
 * Copyright (C) 2009  HO Ngoc Phuong Trang <tranglich@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 *
 * @category PHP
 * @package  Tatoeba
 * @author   HO Ngoc Phuong Trang <tranglich@gmail.com>
 * @license  Affero General Public License
 * @link     https://tatoeba.org
 */

if ($userExists) {
    $total = $this->Paginator->counter("{{count}}");
}

if (!$userExists) {
    $title = format(
        __("There's no user called {username}"),
        array('username' => $username));
} else if (empty($filter)) {
    $title = format(
        __("{username}'s lists ({total})"),
        array('username' => $username, 'total' => $total)
    );
} else {
    $title = format(
        __("{username}'s lists containing \"{search}\" ({total})"),
        array('username' => $username, 'search' => $filter, 'total' => $total)
    );
}

$this->set('title_for_layout', $this->Pages->formatTitle($title));
?>

<div id="annexe_content">
    <?php
    $this->Lists->displayListsLinks();
    if($userExists) {
        $this->Lists->displaySearchForm($filter, array('username' => $username));
    }
    if ($this->request->getSession()->read('Auth.User.id')) {
        $this->Lists->displayCreateListForm();
    }
    ?>
</div>

<div id="main_content">
    
        <?php
        if (!$userExists) {
            $this->CommonModules->displayNoSuchUser($username);
        } else {
            ?>
            <section class="md-whiteframe-1dp">
            <md-toolbar class="md-hue-2">
                <div class="md-toolbar-tools">
                    <h2><?= $this->safeForAngular($title) ?></h2>

                    <?php 
                        $options = array(
                            array('param' => 'name','direction' => 'asc','label' => __('List name (alphabetical)')),
                            array('param' => 'name', 'direction' => 'desc','label' => __('List name (reverse alphabetical)')),
                            array('param' => 'created','direction' => 'desc','label' => __('Newest first')),
                            array('param' => 'created','direction' => 'asc','label' => __('Oldest first')),
                            array('param' => 'numberOfSentences','direction' => 'desc','label' => __('Highest number of sentences')),
                            array('param' => 'numberOfSentences','direction' => 'asc','label' => __('Lowest number of sentences')),
                            array('param' => 'modified','direction' => 'desc','label' => __('Most recently updated')),
                            array('param' => 'modified','direction' => 'asc','label' => __('Least recently updated'))
                        );
                        echo $this->element('sort_menu', array('options' => $options));
                    ?>

                </div>
            </md-toolbar>
            
            <div layout-padding>

            <?php
            $this->Pagination->display();

            $this->Lists->displayListTable($userLists);

            $this->Pagination->display();
            
            ?> 
            </div>
            </section> 
            <?php
        }
        ?>
</div>
