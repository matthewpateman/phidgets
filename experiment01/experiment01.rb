require 'net/http'

require 'rubygems'
require 'phidgets-ffi'

lcd = Phidgets::TextLCD.new

puts "Wait for PhidgetTextLCD to attached..."

#The following method runs when the PhidgetTextLCD is attached to the system
lcd.on_attach  do |device, obj|
 	puts "Device attributes: #{device.attributes} attached"
  	puts "Class: #{device.device_class}"
	puts "Id: #{device.id}"
	puts "Serial number: #{device.serial_number}"
	puts "Version: #{device.version}"
	puts "# Screens: #{device.screens.size}"

	puts "Device attributes: #{device.attributes} attached"
    puts "Class: #{device.device_class}"
	puts "Id: #{device.id}"
	puts "Serial number: #{device.serial_number}"
	puts "Version: #{device.version}"
	puts "# screens: #{device.screens.size}"

	if(lcd.id.to_s == "textlcd_adapter") #the TextLCD Adapter supports screen_size and initialize_screen
		device.screens[0].screen_size = Phidgets::FFI::TextLCDScreenSizes[:screen_size_2x8]
		device.screens[0].initialize_screen
		device.screens[1].initialize_screen
	end

	device.screens[0].contrast = 100
	device.screens[0].back_light = true
	device.screens[0].cursor  = false
	device.screens[0].cursor_blink  = false

	puts device.screens[0].inspect
end

lcd.on_detach  do |device, obj|
	puts "#{device.attributes.inspect} detached"
end

lcd.on_error do |device, obj, code, description|
	puts "Error #{code}: #{description}"
end

sleep 1

if(lcd.attached?)

def checkFile
	url = URI.parse('http://www.matthewpateman.com/phidgets/experiment01/file.txt')
	req = Net::HTTP::Get.new(url.to_s)
	res = Net::HTTP.start(url.host, url.port) {|http|
  		http.request(req)
	}	
	return res.body
end

$i = 1

text = ""

begin 
	newText = checkFile

	if newText != text
	puts "***** A new message has been saved on the server *****"

	puts "***** DISPLAYING NEW MESSAGE *****"
		
		lcd.screens[0].rows[0].display_string = newText[0..19]
		puts "Row 1 will display: " + newText[0..19]

		if newText.length > 19
			lcd.screens[0].rows[1].display_string = newText[20..39]
			puts "Row 2 will display: " + newText[20..39]
		else
			lcd.screens[0].rows[1].display_string = ""
			puts "Row 2 will display: "
		end

		text = newText

	end
	
	$i += 1
	sleep 0.1

end until $i < 0

end

lcd.close
