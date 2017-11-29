# Full Database Backup for [Craft CMS](https://craftcms.com/)

The database backup option in Craft does a backup of **most** of the mysql tables but not all of them. In most cases that is fine but sometimes you may need the entire database (or more than the default). The Full Database Backup plugin allows you to override the default backup and get a full backup of the database including the following tables:
- assetindexdata
- assettransformindex
- cache
- sessions
- templatecaches
- templatecachecriteria
- templatecacheelements 


## Installation
1. Move the `dbbackup` directory into your `craft/plugins` directory.
2. Go to Settings &gt; Plugins in your Craft control panel and enable the `DBBackup` plugin

## Use
In the plugin settings you can select which of the additional tables to include in database backups. By default all tables are selected.

The 'Backup Database' option in the CraftCMS Settings/Tools section is replaced with a 'Backup Full Database' option. Simply click the icon and save a backup like you normally would.

##### Credits
The entire dev team at [Firstborn](https://www.firstborn.com/)
