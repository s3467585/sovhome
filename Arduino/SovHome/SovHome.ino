#include <ESP8266WiFi.h>
//#include <ESP8266WiFiMulti.h>
#include <WiFiClient.h>
#include <DallasTemperature.h>                          // подключаем библиотеку "DallasTemperature"

#define ONE_WIRE_BUS 0                                  // пин шины данных  1-Wire

DeviceAddress ds0 = {0x28, 0xAC, 0xF3, 0x79, 0x97, 0x12, 0x03, 0x21};    // Адрес уличного датчика
DeviceAddress ds1 = {0x28, 0x24, 0x4C, 0x79, 0x97, 0x12, 0x03, 0x4A};    // Адрес датчика на подаче
DeviceAddress ds2 = {0x28, 0x13, 0x69, 0x79, 0x97, 0x12, 0x03, 0x08};    // Адрес датчика на обратке
  

const char* getKey = "sovhome";                         // специальный код, для обработки запроса на сервере
const char* ssid = "IoT";                               // перемныные для подключения к точке доступа
const char* password = "876543210";
String reboot = "rb" ;

float temp0C;                                           // переменная значения температуры в градусах цельсия температура улицы
float temp1C;                                           //  температура подачи
float temp2C;                                           //  температура обратки
float tempAlarm = 15;                                   //  критическая температурв

char server[] = "sovhome.ru";                           // переменная с адрес хоста

char temperatureCString[7];                             // переменная для храненния температуры в градусах цельсия


OneWire oneWire(ONE_WIRE_BUS);                          // создаем экземпляр класса oneWire
DallasTemperature DS18B20(&oneWire);                    // передаем объект oneWire объекту DS18B20

//ESP8266WiFiMulti WiFiMulti;
WiFiClient client;


void setup() {
  Serial.begin(115200);
  delay(300);
  
/*--------------------------------------------------------------
    Подключаемся к точке доступа WiFi-сети:
 --------------------------------------------------------------*/
  WiFi.mode(WIFI_STA);                                  //выбрать режим WIFI_AP (точка доступа), WIFI_STA (клиент), или WIFI_AP_STA (оба режима одновременно).
    
  Serial.println();
  Serial.print("Подключаемся к ");
  Serial.println(ssid);
  
  WiFi.begin(ssid, password);                          // инициализируем сетевые настройки библиотеки WiFi и возвращает текущий статус соединения
 
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("# Подключение к WiFi выполнено");
  Serial.println("# Ожидание IP-адреса ESP...");
  delay(4000);  
  Serial.println(WiFi.localIP());                      // выводим IP-адрес ESP:
  Serial.println(WiFi.gatewayIP());

  DS18B20.begin();                                     // инициализируем объект датчика температуры

  sendWeb(reboot, 1);                                  // регистрация события презагрузки модуля
  getTemperature(1, 1000);
  sendTemp(); 
}

void loop() {
//  Serial.println("#Loop - запрос температуры");
  
  getTemperature(20, 60000);
    
//  Serial.print("температура улицы = ");
//  Serial.println(temp0C); 
//  Serial.print("температура подачи = ");
//  Serial.println(temp1C);
//  Serial.print("температура обратки = ");
//  Serial.println(temp2C);
  sendTemp();
}
