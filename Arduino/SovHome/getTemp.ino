/*--------------------------------------------------------------
Функция опроса датчиков температуры.  
Принимет значения колличества запросов и пауза между ними. 
Отдает максимальное значение средиэтих измерений.
--------------------------------------------------------------*/

float getTemperature(int n, int pause) {             // колличество запросов температуры теплоносителя и пауза между этими измерениями 
  temp1C = 0;
  temp2C = 0;
//  Serial.print("Функция - getTemp   ");
//  Serial.print(temp0C);
//  Serial.print("   ");
//  Serial.print(temp1C);
//  Serial.print("   ");
//  Serial.println(temp2C);


 for (int i = 0; i < n; i++){
  
    DS18B20.requestTemperatures();
    temp0C = DS18B20.getTempC(ds0);
    delay(1000);
    saveTempMax(temp1C, ds1);
    delay(1000);
    saveTempMax(temp2C, ds2);
    if (temp1C < tempAlarm){
//    Serial.println("Авария - критическая температура");
      sendTemp();      
    }
//    Serial.print("Итерация No: ");
//    Serial.print(i);
//    Serial.print("   ");
//    Serial.print(temp0C);
//    Serial.print("   ");
//    Serial.print(temp1C);
//    Serial.print("   ");
//    Serial.println(temp2C);
    delay(pause);
 }
}

/*--------------------------------------------------------------
Функция 
--------------------------------------------------------------*/
void seveTemp(float &tempName, DeviceAddress adres){
  tempName = DS18B20.getTempC(adres);
}
/*--------------------------------------------------------------
Функция принимает имя переменной для записи в нее наибольшего значения и адрес датчика 
с которого считывается значение
--------------------------------------------------------------*/
void saveTempMax(float &tempName, DeviceAddress adres){
  float temp = DS18B20.getTempC(adres);
  if (tempName < temp) {
    tempName = temp;
    }
}
