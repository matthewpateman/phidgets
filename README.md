# phidgets
Phidget Experiments

## Installation
Ensure you are running Ruby v2.1.1. If not update your Ruby version. This can be done with RVM (www.rvm.io).

‘$ rvm --default use 2.1.1’
‘$ gem install ffi’
‘$ gem install phidgets-ffi’

* Ensure that the Phidgets plug-in is installed on your Mac. This can be done by visiting http://www.phidgets.com/docs/Operating_System_Support


## Experiment 1 - Display
This experiment allows you to send a message online which is displayed on the Phidgets LCD screen.

1. Install the file on a server and access experiment01/index.php
2. Ensure that file.txt has read and write privileges.
3. Run the ruby application locally by opening the folder it is located in in terminal and running ‘$ ruby experiment01.rb’
4. Now that the application is running visit the experiment01/index.php and enter a message

## Experiment 2 - RFID Reader

This experiment allows makes a log everytime an RFID chip is touched in on the Phidgets RFID Shield.

1. Install the files in experiment02 on a server and access experiment02/index.html
2. Ensure that file.txt has read and write privileges.
3. Run the ruby application locally by opening the folder it is located in in terminal and running ‘$ ruby experiment02.rb’
4. Now that the application is running visit the experiment02/index.html
5. When you tap in a RFID coin you should see it appear on the list which updates itself automatically