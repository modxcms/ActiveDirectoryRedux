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
 * @package activedirectoryx
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/activedirectoryxuser.class.php');
class activeDirectoryXUser_mysql extends activeDirectoryXUser {}