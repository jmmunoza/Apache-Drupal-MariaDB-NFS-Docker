sudo apt-get update
sudo apt-get install nfs-kernel-server
sudo mkdir -p /var/nfs
echo "/var/nfs *(rw,sync,no_subtree_check)" | sudo tee -a /etc/exports
sudo systemctl restart nfs-kernel-server