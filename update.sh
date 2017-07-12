!#/bin/bash

# Move new php/web files into place
/bin/cp -rf /nvupdate/nvezos/installpayload/html/ /var/www/
# Update scripts
/bin/cp -rf /nvupdate/nvezos/scripts/ /nvezos/

echo "Update is now complete, process will exit shortly."

sleep 5