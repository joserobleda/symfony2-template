Vagrant.configure("2") do |config|
	config.vm.box = "ubuntu/trusty64"

  	config.vm.provider :virtualbox do |p|
    	p.customize ["modifyvm", :id, "--memory", "3072", "--cpus", "8", "--ioapic", "on"]
	end

	gitconfig = Pathname.new("#{Dir.home}/.gitconfig")
 	config.vm.provision :shell, :inline => "echo -e '#{gitconfig.read()}' > '/home/vagrant/.gitconfig'", privileged: false if gitconfig.exist?
	config.vm.provision "ansible" do |ansible|
    	ansible.playbook = "vagrant/ansible/config.yml"
  	end

	config.vm.network "private_network", ip: "11.11.11.11"
	config.vm.synced_folder ".", "/vagrant", type: "nfs"
end
