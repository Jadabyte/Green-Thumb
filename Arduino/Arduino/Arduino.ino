#include <Arduino.h>
#include <SoftwareSerial.h>

//TMP36 Pin Variables
int sensorPin = 5; 
//the analog pin the TMP36's Vout (sense) pin is connected to
//the resolution is 10 mV / degree centigrade with a
//500 mV offset to allow for negative temperatures
int photocellPin = 3;     // the cell and 10K pulldown are connected to a0
int photocellReading;     // the analog reading from the analog resistor divider
String LSout;
int moisturePin = 1;
int moistureReading;
String StringtoESP;

// Define the digital pins to use as RX and TX
const int RX = 10;
const int TX = 11;

SoftwareSerial ASWoutput(RX, TX); // RX, TX

void setup()
{
  //pinMode(RX, INPUT);
  //pinMode(TX, output);
Serial.begin(9600);
ASWoutput.begin(115200);
  
  /*serial.begin(115200);  //Start the serial connection with the computer
  //to view the result open the serial monitor
  serial.print("Hello, world");*/
}

void loop()                     // run over and over again
{

  //getting the voltage reading from the temperature sensor
int reading = analogRead(sensorPin);
  // converting that reading to voltage, for 3.3v arduino use 3.3
  float voltage = reading * 5.0;
  voltage /= 1024.0;
  // print out the voltage
  //Serial.print(voltage); Serial.println(" volts");
  // now print out the temperature
float temperatureC = (voltage - 0.5) * 100 ;  
//converting from 10 mv per degree with 500 mV offset
  //to degrees ((voltage - 500mV) times 100)
  Serial.print(temperatureC); Serial.println(" degrees C");
  // now convert to Fahrenheit
  float temperatureF = (temperatureC * 9.0 / 5.0) + 32.0;
  Serial.print(temperatureF); Serial.println(" degrees F");

  photocellReading = analogRead(photocellPin);
  Serial.print("Photocell reading = ");
  Serial.print(photocellReading);     // the raw analog reading
  // We'll have a few threshholds, qualitatively determined
  if (photocellReading < 10) {
Serial.println(" - Dark");
LSout = String("Dark");
  } else if (photocellReading < 200) {
Serial.println(" - Dim");
LSout = String("Dim");
  } else if (photocellReading < 500) {
Serial.println(" - Light");
LSout = String("Light");
  } else if (photocellReading < 800) {
Serial.println(" - Bright");
LSout = String("Bright");
  } else {
Serial.println(" - Very bright");
LSout = String("Very bright");
  }

moistureReading = analogRead(moisturePin);
moistureReading = map (moistureReading, 1023, 0, 0, 100);// map(value, fromLow, fromHigh, toLow, toHigh)
  /*for (int i = 0; i <= 100; i++) 
   { 
     moistureReading = moistureReading + analogRead(moisturePin); 
     delay(1); 
   } */
  Serial.print("Moisture reading = ");
  //moistureReading = moistureReading / 100.0;
  Serial.print (moistureReading);
  Serial.println ("%");

  
  Serial.println(" ");
  Serial.println("===");
  Serial.println(" ");

StringtoESP = String(temperatureC, 0) + String("C ") + String(temperatureF, 0) + String("F ") + String(LSout + " ") + String(moistureReading)+ String("%");
//Serial.println(StringtoESP);
ASWoutput.print(temperatureC, 0);
ASWoutput.println("C");

ASWoutput.print(temperatureF, 0);
ASWoutput.println("F");

ASWoutput.println(LSout);

ASWoutput.print(moistureReading);
ASWoutput.println("%");

  ASWoutput.println(" ");
  ASWoutput.println("===");
  ASWoutput.println(" ");

//ASWoutput.println(StringtoESP);

  delay(5000);
}
