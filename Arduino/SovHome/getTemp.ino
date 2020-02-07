float getTemperature(int i) {
 // do {
    DS18B20.requestTemperatures();
    float tempC = DS18B20.getTempCByIndex(i);
    //dtostrf(tempC, 6, 0, temperatureCString);
    delay(500);
 // } while (tempC == 85.0 || tempC == (-127.0));
  return tempC; 
}
