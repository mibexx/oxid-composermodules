OXID ComposerModules
=========================
Allow to load modules from composer in Oxid eShop.

Shop version
-----------------
Tested in OXID CE 4.10.4.  
Should work in every shop version with composer.json in modules directory (since 4.10.x).


Installation
------------------
1. Download the repository: https://github.com/mibexx/oxid-composermodules/archive/1.1.0.zip
2. Unzip the mbx directory into the modules directory of the shop
3. Add autoloader to the composer.json

```
"autoload"   : {
    "psr-4": {
        "mbx\\": "mbx"
    }
}
```

4. Run composer update
5. Activate the module at the backend
6. Now you can load modules from composer.json by simple require them

Configuration
-----------------
There is no configuration needed

Usage
-----------------
After activating the module you can simple load you modules via composer.json file.
This module scans alle vendor-subdirectories for the metadata.php file an add this to the oxid modulelist.

