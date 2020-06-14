#include <Arduino.h>
#include <SoftwareSerial.h>

// These integers define the pin inputs and the variables in which the data needs to be stored, respectively
int temperaturePin = 5; 
int tempReading;
int photocellPin = 3;
int photocellReading;
int moisturePin = 1;
int moistureReading;

float voltage; // This defines the voltage of the microcontroller to calculate the temperatures
String StringtoESP; // This variable is used to store the string that will be sent to the ESP

// These define the RX and TX pin for the Arduino, which are used for the serial communication with the ESP
const int RX = 10;
const int TX = 11;

SoftwareSerial ASWoutput(RX, TX); // This uses the integers to set the pins for serial communication

void setup(){
  Serial.begin(9600); // The baud rate for the serial monitor
  ASWoutput.begin(9600); // The baud rate for the serial communication with the ESP
}

void loop(){
/*=============This Code is for the temperature Sensor=============*/

  tempReading = analogRead(temperaturePin); // This grabs the reading of the temperature sensor
  
  voltage = tempReading * 5.0; // Returns usable values from the temperature sensor
  voltage /= 1024.0; // Divides the voltage by the bit range of the temperature sensor
  
  float temperatureC = (voltage - 0.5) * 100 ; // Standard formula to turn the sensor reading into Celcius including a correction for negative temperatures
  Serial.print(temperatureC); Serial.println(" degrees C");
  
  float temperatureF = (temperatureC * 9.0 / 5.0) + 32.0; // Calculates the temperature in Fahrenheit
  Serial.print(temperatureF); Serial.println(" degrees F");
  
/*=================================================================*/


/*==============This Code is for the light Sensor==================*/

  photocellReading = analogRead(photocellPin); // Grabs the reading of the photocell
  Serial.print("Photocell reading = "); // Prints the photocell reading to the serial monitor
  Serial.println(photocellReading);

/*=================================================================*/


/*==============This Code is for the moisture Sensor===============*/

  moistureReading = analogRead(moisturePin); // Grabs the reading of the moisture sensor
  moistureReading = map(moistureReading, 1023, 0, 0, 100); //this function maps the highest and lowest values of the reading and links them to a number between 0 and 100
  
  Serial.print("Moisture reading = "); // Prints the moisture reading to the serial monitor
  Serial.print (moistureReading);
  Serial.println ("%");

  // This just creates a break for formatting in the serial monitor
  Serial.println(" ");
  Serial.println("===");
  Serial.println(" ");

/*=================================================================*/


/*==========This Code is for sending the data to the ESP===========*/

  StringtoESP = String(temperatureC, 0) + String(";") // This is where the sensor data is put into a single string for easy transmission to the ESP 
    + String(temperatureF, 0) + String(";") 
    + String(photocellReading) + String(";") 
    + String(moistureReading) + String("$"); // The '$' is used to terminate the string
    
  Serial.println(StringtoESP); // Prints the data string to the serial monitor
  Serial.println(" "); // Another break for formatting
  Serial.println("===");
  Serial.println(" ");
  ASWoutput.print(StringtoESP); // Sends the full string of data to the ESP via serial communication
  delay(33000); // Wait 33 seconds

/*=================================================================*/
}
