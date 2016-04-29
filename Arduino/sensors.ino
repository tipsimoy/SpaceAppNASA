#include <dht.h>
#define dht_apin A0

dht DHT;

 int valueMQ5 = A2;
 int valueMQ2 = A3;
 int measurePin = A1;
 int ledPower = 2; //digital 2
 int samplingTime = 280;
 int deltaTime = 40;
 int sleepTime = 9680;
 float voMeasured = 0;
 float calcVoltage = 0;
 float dustDensity = 0;
 String humidity;
 String temperature;
 String dust;
 String MQ2;
 String MQ5;
 String servernumber = "+639753349196";
 String compiledData;

 void setup()
 {
  Serial.begin(9600);
  delay(1000);
  pinMode(ledPower,OUTPUT);
  pinMode(valueMQ2, INPUT);
  pinMode(valueMQ5, INPUT);
 }

void loop()
{
 MQ2 = String(analogRead(valueMQ2));
 MQ5 = String(analogRead(valueMQ5));
 DHT11();
 DUSTSENSOR();
 temperature = String(DHT.temperature); //in degrees Celcius
 humidity = String(DHT.humidity); //in percent
 dust = String (dustDensity); //in mg/m3
 compiledData = String(temperature + ' ' + humidity + ' ' + MQ5 + ' ' + MQ2 + ' ' + dust + ' ' + "JOMA143");
 sendSMS(compiledData);
}
void DHT11()
{
  DHT.read11(dht_apin);  
  delay(5000);
}
void DUSTSENSOR()
{
  digitalWrite(ledPower,LOW);
  delayMicroseconds(samplingTime);
  voMeasured = analogRead(measurePin);
  delayMicroseconds(deltaTime);
  digitalWrite(ledPower,HIGH);
  delayMicroseconds(sleepTime);
  calcVoltage = voMeasured * (5.0 / 1024.0);
  dustDensity = 0.17 * calcVoltage - 0.1;
  delay(1000);  
}

void sendSMS(String msg)
{
 Serial.begin(9600); 
 delay(2000);
 Serial.print("AT+CMG­F=1\r");
 delay(2000);
 Serial.println("AT + CMGS = \"" + servernumber +"\"");
 delay(2000);
 Serial.print(msg);
 delay(2000);
 Serial.write((char)26);
 delay(2000);
 }

