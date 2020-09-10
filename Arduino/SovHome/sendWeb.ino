/*--------------------------------------------------------------
 Функция отправляет данные на  WEB сервер.
 --------------------------------------------------------------*/
void sendWeb(String param, int vol ) {
  if (client.connect(server, 80)) {
    
  Serial.println("# sendWeb - Хост подключен");
  client.print( "GET /add.php?");
  client.print("k=");
  client.print(getKey);                       // Специальный код обработки запроса на сайте
  client.print("&");
  client.print(param); 
  client.print("=");     
  client.print(vol);
  client.println(" HTTP/1.1");
  client.print( "Host: " );
  client.println(server);
  client.println("User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36");
  client.println( "Connection: close" );
  client.println();
  client.println();
  client.stop();
  client.flush();
  } else {
   
  Serial.println("# sendWeb - Связь с хостом отсутствует");
  
  client.stop();
  delay(10000);
  sendWeb(param, vol);
  }
  
}
