#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
 
const char *ssid = "WAL";  //Nombre de red wifi
const char *password = "mypass12345";
int R = 0; //Variable para guardar el valor r
int G = 0; //Variable para guardar el valor g
int B = 0; //Variable para guardar el valor b

//=======================================================================
//                    Configurar ESP
//=======================================================================
 
void setup() {
  delay(1000);
  Serial.begin(9600);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  
  WiFi.begin(ssid, password);     //Conectarse a la red WiFi
  Serial.println("");
 
  Serial.print("Connecting");
  // Esperando conectarse..
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
 
  //Mostrar mensajes si la conexión fue exitosa..
  Serial.println("");
  Serial.print("Conectado a: ");
  Serial.println(ssid);
  Serial.print("Direcci+on IP: ");
  Serial.println(WiFi.localIP());  //IP asignada al ESP
}
 
//=======================================================================
//                    Main Program Loop
//=======================================================================
void loop() {
  //Generar valores aleatorios:
  
  R = random(0, 255);
  G = random(50, 200); 
  B = random(100, 255);
  String codigo = (String) R + "-" + G + "-" + B;
  
  HTTPClient http;    //Declarar objeto de la clase HTTPClient
  //Iniciar comunicación con la url del servidor apache..
  http.begin("http://192.168.0.12:8080/arduinorgb/guardar_rgb.php?rgb="+codigo);    
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
 
  int httpCode = http.POST(codigo);   //Enviar la solicitud
  String payload = http.getString();    //obtener la respuesta payload
 
  Serial.println(httpCode);   //Imprimir estado de respuesta del servidor
  Serial.println(payload);    //Imprime respuestas del servicio web
 
  http.end();  //Close connection
  
  delay(5000);  //Post Data at every 5 seconds
}
//=======================================================================

