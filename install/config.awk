BEGIN {
	# ORS="\\r\\n";
	# SUBSTIT = "\\\\xampplitecoffee";
	# DIR = "D:\\xampplite";
	# server_cmd = "D:\\xampplite\\install\\server.xml";
	while (getline < CONFIG) {
		sub(SUBSTIT,DIR,$0);
		print $0 > CONFIGNEW
	}

	# print "@rem  Installation Program, second part" > "D:\\xampplite\\install\\inst.bat"
	# D:\xampplite\install\awk -v DIR = "C:\\xampplite" -f D:\xampplite\install\test.awk
}
