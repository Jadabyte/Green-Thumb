#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <SoftwareSerial.h>

extern "C" {
  #include <user_interface.h>
}

const int RX = 12;
const int TX = 13;

int count;
String output;
char endString = '$';

const char* ssid     = "Streignart WiFi";
const char* password = "Jorthinad@home";
uint8_t mac[6] {0x5C, 0xCF, 0x7F, 0x07, 0x55, 0x47};
const char* host = "192.168.0.148";

SoftwareSerial ESPinput(RX, TX); // RX, TX

void setup()
{
  Serial.begin(115200);
  
  wifi_set_macaddr(0, const_cast<uint8*>(mac)); 
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  Serial.print("Bezig met connecteren...");
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  Serial.println();

  Serial.print("Geconnecteerd!\nMijn IP adres: ");
  Serial.println(WiFi.localIP());
  Serial.printf("Mijn MAC adres is: %s\n", WiFi.macAddress().c_str());
  Serial.print("De gateway is: ");
  Serial.println(WiFi.gatewayIP());
  Serial.print("De DNS is: ");
  Serial.println(WiFi.dnsIP());
  count = 1;
  while (!Serial)
   {
      ; // wait for serial port to connect. Needed for native USB port only
}
Serial.println("USB connection ready");
ESPinput.begin(9600);
}
void loop()  // run over and over
{
   if (ESPinput.available()){
    output = ESPinput.readStringUntil(endString);
    //Serial.println(output);
    delay(1000);
   }

  Serial.print("connecting to ");
  Serial.println(host);

  // Probeer te connecteren met de host 
  WiFiClient client;
  client.setTimeout(1000);    //Nodig voor de timeout in readStringUntil
  const int httpPort = 80;    //Een webserver luistert op poort 80
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
  
  // Het path klaar maken van hetgeen we willen van de host 
  String url = "/Green-Thumb/plantdetails.php";
  Serial.print("Requesting URL: ");
  Serial.println(url);
  
  // Get naar de host sturen:
  /*client.print(String("POST ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");*/
  Serial.print("Requesting POST: ");
   // Send request to the server:
   client.println("POST /Green-Thumb/plantdetails.php HTTP/1.1");
   client.println("Host: 192.168.0.148");
   client.println("Accept: */*");
   client.println("Content-Type: application/x-www-form-urlencoded");
   output = String("data=") + output;
   client.print("Content-Length: ");
   client.println(output.length());
   client.println();
   client.print(output);
  
  delay(500);
  
  // Alles lezen en afprinten naar de seriele poort.
  // Merk op dat ook de antwoord headers worden afgedrukt!
  while(client.available()){
    String line = client.readStringUntil('\n');
    Serial.println(line);
  }

  // De verbinding met de server sluiten 
  Serial.println();
  Serial.println("closing connection");
  client.stop();
  delay(30000);
}
