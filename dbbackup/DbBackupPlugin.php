<?php


/**
 * Full Database Backup plugin for Craft CMS
 *
 * Create full database backups of the Craft mysql database, including asset index and transformation tables. The regular database backup excludes these tables with no way to include them:
 * - assetindexdata
 * - assettransformindex
 * - cache
 * - sessions
 * - templatecaches
 * - templatecachecriteria
 * - templatecacheelements
 *
 * @author    Derrick Grigg
 * @copyright Copyright (c) 2017 FirstBorn
 * @link      https://firstborn.com
 * @package   DbBackupPlugin
 * @since     1.0.0
 *
 * database icon svg by Mister Pixel from the Noun Project
 */


namespace Craft;

class DbBackupPlugin extends BasePlugin
{



    /**
     * @return mixed
     */
    public function init()
    {
        Craft::import('plugins.dbbackup.tools.FullDbBackupTool');

        if ( craft()->request->isCpRequest() && craft()->userSession->isLoggedIn() && craft()->request->getUrl() == '/admin/settings' ) {

            craft()->templates->includeJsResource('dbbackup/js/DbBackup.js');

            $tool = new FullDbBackupTool();


            craft()->templates->includeJs("new Craft.InsertDbBackup('" . $tool->getName(). "', '" . $tool->getClassHandle(). "', " . json_encode($tool->getOptionsHtml()). ", '" . $tool->getButtonLabel()."');");
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('DBBackup');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Create a full database backup without excluding tables. This replaces the standard Craft Database Backup tool');
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    protected function defineSettings()
    {
        return array(
            'includeTables' => array(AttributeType::Mixed, 'default' => array('assetindexdata' => 1,
                'assettransformindex' => 1,
                'cache' => 1,
                'sessions' => 1,
                'templatecaches' => 1,
                'templatecachecriteria' => 1,
                'templatecacheelements' => 1)),
        );
    }

    public function getSettingsHtml()
    {
        return craft()->templates->render('dbbackup/settings', array(
            'settings' => $this->getSettings()
        ));
    }

    public function prepSettings($settings)
    {
        // Modify $settings here...
        DbBackupPlugin::log(json_encode($settings), LogLevel::Error);

        return $settings;
    }



    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Derrick Grigg';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://firstborn.com';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }




}