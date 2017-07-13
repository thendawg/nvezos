#!/bin/bash

# Move new php/web files into place
/bin/cp -rf /nvupdate/nvezos/installpayload/html/ /var/www/

# Update scripts
/bin/cp -rf /nvupdate/nvezos/scripts/network/getinterface.sh /nvezos/scripts/network/
/bin/cp -rf /nvupdate/nvezos/scripts/gpu/fixgpu.sh /nvezos/scripts/gpu/
/bin/cp -rf /nvupdate/nvezos/scripts/query/queryhashrate.sh /nvezos/scripts/query/

# Fix permissions again
chown -R www-data /nvezos/
chmod -R 755 /nvezos/
chown -R www-data /var/www/html/
chmod -R 755 /var/www/html/

# Cleanup
rm -rf /nvupdate/


echo "Update is now complete, process will exit shortly."

sleep 5