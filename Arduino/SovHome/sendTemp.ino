/*--------------------------------------------------------------
 Функция отправляет данные о температуре и влажности на 
 WEB сервер.
 --------------------------------------------------------------*/
void sendTemp() {
  if (client.connect(server, 80)) {
    
  Serial.println("# Хост подключен");
    
  client.print( "GET /add.php?");
  client.print("k=");
  client.print(getKey);                       // Специальный код обработки запроса на сайте, например asREb25C
  client.print("&");
  client.print("t0=");                   
  client.print(temp0C);
  client.print("&");
  client.print("t1=");
  client.print(temp1C);
  client.print("&");
  client.print("t2=");
  client.print(temp2C);
  client.println(" HTTP/1.1");
  client.print( "Host: " );
  client.println(server);
  client.println( "Connection: close" );
  client.println();
  client.println();
  client.stop();
  client.flush();
  } else {
   
  Serial.println("# Связь с хостом отсутствует");
  
  client.stop();
  delay(10000);
  sendTemp();
  }
  
}
