float getTemperature() {
 // do {
  DS18B20.requestTemperatures();
  temp0C = DS18B20.getTempC(ds1);
  delay(500);
  temp1C = DS18B20.getTempC(ds2);
  delay(500);
  temp2C = DS18B20.getTempC(ds3);
  delay(500);

    
    //dtostrf(tempC, 6, 0, temperatureCString);
    
 // } while (tempC == 85.0 || tempC == (-127.0));
}
