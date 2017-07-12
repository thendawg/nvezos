!#/bin/bash

# Move new php/web files into place
/bin/cp -rf /nvupdate/nvezos/installpayload/html/ /var/www/
# Update scripts
/bin/cp -rf /nvupdate/nvezos/scripts/ /nvezos/
# Fix permissions again
chown -R www-data /nvezos/
chmod -R 755 /nvezos/
chown -R www-data /var/www/html/
chmod -R 755 /var/www/html/


echo "Update is now complete, process will exit shortly."

sleep 5