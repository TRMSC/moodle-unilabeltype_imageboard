<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * unilabel type imageboard
 *
 * @package     unilabeltype_imageboard
 * @author      Andreas Grabs <info@grabs-edv.de>
 * @author      Andreas Schenkel
 * @copyright   2018 onwards Grabs EDV {@link https://www.grabs-edv.de}
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$page = new admin_settingpage('unilabeltype_imageboard', get_string('pluginname', 'unilabeltype_imageboard'));

$imageboardsettings = array();

$imageboardsettings[] = new admin_setting_configcheckbox('unilabeltype_imageboard/active',
    get_string('active'),
    '',
    true);

$numbers = array_combine(range(100, 1800, 50), range(100, 1800, 50));
$numbers = array(0 => get_string('autocanvaswidth', 'unilabeltype_imageboard')) + $numbers;
$imageboardsettings[] = new admin_setting_configselect('unilabeltype_imageboard/canvaswidth',
    get_string('default_canvaswidth', 'unilabeltype_imageboard'),
    get_string('default_canvaswidth_help', 'unilabeltype_imageboard'),
    600,
    $numbers
);

$numbers = array_combine(range(100, 1800, 50), range(100, 1800, 50));
$imageboardsettings[] = new admin_setting_configselect('unilabeltype_imageboard/canvasheight',
    get_string('default_canvasheight', 'unilabeltype_imageboard'),
    get_string('default_canvasheight_help', 'unilabeltype_imageboard'),
    400,
    $numbers
);

$imageboardsettings[] = new admin_setting_configcheckbox('unilabeltype_imageboard/default_showborders',
    get_string('default_showborders', 'unilabeltype_imageboard'),
    get_string('default_showborders_desc', 'unilabeltype_imageboard'),
    true);

$name = 'unilabeltype_imageboard/default_bordercolor';
$title = get_string('default_bordercolor', 'unilabeltype_imageboard');
$description = get_string('default_bordercolor_desc', 'unilabeltype_imageboard');
$imageboardsettings[] = new admin_setting_configcolourpicker($name, $title, $description, '#ff0000');



$name = 'unilabeltype_imageboard/default_gridcolor';
$title = get_string('default_gridcolor', 'unilabeltype_imageboard');
$description = get_string('default_gridcolor_desc', 'unilabeltype_imageboard');
$imageboardsettings[] = new admin_setting_configcolourpicker($name, $title, $description, '#0000ff');



$imageboardsettings[] = new admin_setting_configcheckbox('unilabeltype_imageboard/showintro',
    get_string('default_showintro', 'unilabeltype_imageboard'),
    '',
    false
);

foreach ($imageboardsettings as $setting) {
    $page->add($setting);
}

$settingscategory->add($page);
