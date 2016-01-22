# Magento version (tested/worked)
1.9.2.1

# Frontend
Used AngularJS
/skin/frontend/base/default/js/aircalculator/aircalculator_angular.js
/app/design/frontend/base/default/template/aircalculator/index.phtml

# Main files
Folder "app" and "skin" - put the root of the site.

# Additional files
Folder "js" - includes angularJS v1.4.7, he needs to run module, BUT if you have angularJS - correct path in:
/app/code/local/AKS/Aircalculator/controllers/IndexController.php

# Additional info
This module was created for theme:
"BUYSHOP Responsive Retina Magento theme"
http://themeforest.net/item/buyshop-responsive-retina-magento-theme/4287671
But if you will be used in other themes - correct style in:
/app/design/frontend/base/default/template/aircalculator/index.phtml
