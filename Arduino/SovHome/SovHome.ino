#include <ESP8266WiFi.h>
//#include <ESP8266WiFiMulti.h>
#include <WiFiClient.h>
#include <DallasTemperature.h>                          // подключаем библиотеку "DallasTemperature"

#define ONE_WIRE_BUS 0                                  // пин шины данных  1-Wire

const char* getKey = "sovhome";                         // специальный код, для обработки запроса на сервере
const char* ssid = "Mikrotik";                          // перемныные для подключения к точке доступа
const char* password = "12345678";

float temp0C;                                            // переменная значения температуры в градусах цельсия
float temp1C; 

char server[] = "sovhome.cu.ma";                              // переменная с адрес хоста

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

}

void loop() {
  Serial.println("запрос температуры");
  
  temp0C = getTemperature(0);
  temp1C = getTemperature(1);
  
  Serial.print("температура(0) = ");
  Serial.println(temp0C); 
  Serial.print("температура(1) = ");
  Serial.println(temp1C);
  
  sendTemp();  
  
  delay(10000);
}
