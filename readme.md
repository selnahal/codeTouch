# Code Touch Test

1) Before cloning make sure you have Vagrant V1.8.1

2) Clone repository.

3) If you don't have a ssh key already, then open terminal and create one through (ssh-keygen -t rsa -C "your_email@example.com")

4) In terminal run the following commands:
	
	- cd /path/to/project

	- composer install
	
	- php vendor/bin/homestead make (if this command failed then do this one instead "vendor/laravel/homestead/homestead make")
	
	- vagrant up (if you get the following error "The VirtualBox VM was created with a user that doesn't match the current user running Vagrant. VirtualBox requires that the same user be used to manage the VM that was created. Please re-run Vagrant with that user. This is not a Vagrant issue.
	The UID used to create the VM was: 0 Your UID is: 501" regardless of the id numbers written, then you'll have to update the VM's UID. Run this commmand "sudo nano .vagrant/machines/default/virtualbox/creator_uid" and change it to your UID that appeared in the error. Try "vagrant up" and it should work).