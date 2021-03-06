<?php

/**
 *
 *
 * Zenbership Membership Software
 * Copyright (C) 2013-2016 Castlamp, LLC
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author      Castlamp
 * @link        http://www.castlamp.com/
 * @link        http://www.zenbership.com/
 * @copyright   (c) 2013-2016 Castlamp
 * @license     http://www.gnu.org/licenses/gpl-3.0.en.html
 * @project     Zenbership Membership Software
 */

require "admin/sd-system/config.php";

$news = new news();

$changes = array();

if (! empty($_GET['id'])) {
    $article = $news->getArticle($_GET['id']);

    if (! empty($article['error'])) {
        header('Location: ' . PP_URL . '/login.php?code=L035');
        exit;
    }

    $article['meta_title'] = $article['title'];

    $template = new template('news_' . $article['type'], $article, '1');
} else {
    $template = new template('news', $changes, '1');
}

echo $template;
exit;