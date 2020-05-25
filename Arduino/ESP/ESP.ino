#include <Arduino.h>
#include <SoftwareSerial.h>

const int RX = 12;
const int TX = 13;

SoftwareSerial ESPinput(RX, TX); // RX, TX

char myString[10];
void setup()
{
  // put your setup code here, to run once:
  // Open serial communications and wait for port to open:
  Serial.begin(115200);
while (!Serial)
 {
    ; // wait for serial port to connect. Needed for native USB port only
}
Serial.println("USB connection ready");
ESPinput.begin(115200);
}
void loop()  // run over and over
{
   if (ESPinput.available())
    Serial.write(ESPinput.read());
}
