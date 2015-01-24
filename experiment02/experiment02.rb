require "net/http"
require "uri"

require 'rubygems'
require 'phidgets-ffi'
 
puts "Library Version: #{Phidgets::FFI.library_version}"

rfid = Phidgets::RFID.new
 
puts "Wait for PhidgetRFID to attached..."
 
#The following method runs when the PhidgetRFID is attached to the system
rfid.on_attach  do |device, obj|
  rfid.antenna = true
  rfid.led = true
  sleep 1
end

#The following method runs when a RFID tag is detected 
rfid.on_tag do |device, tag, obj|
  puts "Tag #{tag} detected"

  uri = URI.parse("http://www.matthewpateman.com/phidgets/experiment02/write.php")

  http = Net::HTTP.new(uri.host, uri.port)

request = Net::HTTP::Post.new(uri.request_uri)
request.set_form_data({"chip" => "#{tag}"})

response = http.request(request)

puts response
end

#The following method runs when a RFID tag is removed 
rfid.on_tag_lost do |device, tag, obj|
  puts "Tag #{tag} removed"
end
 
puts "Please insert a tag to read read ..."
 
gets.chomp
 
puts 'Closing...'
 
rfid.close