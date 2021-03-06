<?php
/**
 * ActiveDirectoryX
 *
 * Copyright 2010 by Shaun McCormick <shaun@modx.com>
 *
 * This file is part of ActiveDirectoryX, which integrates Active Directory
 * authentication into MODx Revolution.
 *
 * ActiveDirectoryX is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * ActiveDirectoryX is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * ActiveDirectoryX; if not, write to the Free Software Foundation, Inc.,
 * 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package activedirectoryx
 */
/**
 * Handle plugin events
 * 
 * @package activedirectoryx
 */
if (!$modx->getOption('activedirectoryx.enabled', $scriptProperties, false)) return;

$activedirectoryx = $modx->getService('activedirectoryx', 'activeDirectoryX', $modx->getOption('activedirectoryx.core_path', null, $modx->getOption('core_path') . 'components/activedirectoryx/') . 'model/activedirectoryx/', $scriptProperties);

if (!($activedirectoryx instanceof activeDirectoryX)) {
    $modx->log(modX::LOG_LEVEL_ERROR, '[ActiveDirectoryX] Could not load ActiveDirectoryX class.');
    $modx->event->output(false);
    return;
}
$activeDirectoryXDriver = $activedirectoryx->loadDriver();
if (!($activeDirectoryXDriver instanceof activeDirectoryXDriver)) {
    $modx->log(modX::LOG_LEVEL_ERROR, '[ActiveDirectoryX] Could not load ActiveDirectoryXDriver class.');
    $modx->event->output(false);
    return;
}

/* grab correct event processor */
$eventProcessor = false;
switch ($modx->event->name) {
    /* authentication */
    case 'OnWebAuthentication':
    case 'OnManagerAuthentication':
        $eventProcessor = 'onauthentication';
        break;

    /* onusernotfound */
    case 'OnUserNotFound':
        $eventProcessor = 'onusernotfound';
        break;
}

/* if found processor, load it */
if (!empty($eventProcessor)) {
    $eventProcessor = $activedirectoryx->config['eventsPath'] . $eventProcessor . '.php';

    if (file_exists($eventProcessor)) {
        include $eventProcessor;
    }
}

return;