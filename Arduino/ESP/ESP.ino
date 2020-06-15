#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <SoftwareSerial.h>

extern "C" {
  #include <user_interface.h>
}

// These define the RX and TX pin for the ESP, which are used for the serial communication with the Arduino
const int RX = 12;
const int TX = 13;

int count;
String output; // Declares the variable used for storage of the data sent from the Arduino
char endString = '$'; // Sets '$' as the string termination so that the ESP knows where the transmitted data ends

const char* ssid = "Streignart WiFi"; // The name of the WiFi network
const char* password = "Jorthinad@home"; // The password of the WiFi network
uint8_t mac[6] {0x5C, 0xCF, 0x7F, 0x07, 0x55, 0x47}; // Defines the mac address of the ESP
const char* host = "192.168.0.148"; // Defines where data is being sent

SoftwareSerial ESPinput(RX, TX); // Opens the serial communication with the arduino and sets the RX and TX pins of the ESP

void setup()
{
  Serial.begin(115200); // Baud rate for the serial monitor

/*=============This Code is for connecting to the internet=============*/

  wifi_set_macaddr(0, const_cast<uint8*>(mac)); // Sets the mac address of the ESP
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password); // Sets the name and password of the WiFi network

  Serial.print("Bezig met connecteren...");
  count = 1;
  while (WiFi.status() != WL_CONNECTED){ // While waiting for a connection to the internet, a period is printen every half second
    delay(500);
    Serial.print(".");
  }

  Serial.println(); // Prints an empty line

  Serial.print("Geconnecteerd!\nMijn IP adres: "); // When connected to the internet, this section prints information about the connection
  Serial.println(WiFi.localIP()); // Prints IP of the ESP
  Serial.printf("Mijn MAC adres is: %s\n", WiFi.macAddress().c_str()); // Pritns mac address of the ESP
  Serial.print("De gateway is: "); // The gateway used
  Serial.println(WiFi.gatewayIP());
  Serial.print("De DNS is: "); // The DNS of the server
  Serial.println(WiFi.dnsIP());
  
/*=======================================================================*/

  ESPinput.begin(9600); // The baud rate for serial communication with the Arduino
}
void loop(){
   if (ESPinput.available()){ // Checks if data from the Arduino is available
    output = ESPinput.readStringUntil(endString); // Reads the transmitted string until the termination character '$'
    delay(1000); // wait one second
   }
   
/*===============This Code is for connection to the host===============*/

  Serial.print("connecting to "); // Prints connection to the host
  Serial.println(host);

  WiFiClient client;
  client.setTimeout(1000);
  const int httpPort = 80; // Port used for connection to the server
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed"); // Prints connection failed until a successful connection
    return;
  }

  String url = "/Green-Thumb/plantSensor.php"; // Defines which page the ESP wishes to connect to
  Serial.print("Requesting URL: ");
  Serial.println(url);

/*=====================================================================*/

/*============This Code is for sending the data to the host============*/
  
  Serial.print("Requesting POST: ");
   // I split this code to make it more legible
   client.println("POST /Green-Thumb/plantSensor.php HTTP/1.1"); // Prints which page the ESP wishes to send data to
   client.println("Host: 192.168.0.148"); // Prints the host server
   client.println("Accept: */*");
   client.println("Content-Type: application/x-www-form-urlencoded");
   output = String("data=") + output; // This assigns a key ("data") to the data output so that it can be read in the PHP document
   client.print("Content-Length: "); // Will show how many bits have been transmitted to the server
   client.println(output.length());
   client.println();
   client.print(output); // Prints the data to the server
  
  delay(500); // Wait half a second
  
  while(client.available()){
    String line = client.readStringUntil('\n'); // Displays connect received from the server until the escape character '\n' is encountered
    Serial.println(line);
  }

/*=====================================================================*/

/*==================Closes the connection to the host==================*/
 
  Serial.println();
  Serial.println("closing connection");
  client.stop();

/*=====================================================================*/

  delay(30000); // Wait 30 seconds
}
