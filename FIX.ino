#include <DHT.h>
#include <Ethernet.h>
#include <SPI.h>

//String ip="192,168,0,11";
byte mac[] = { 0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x01 };                           // RESERVED MAC ADDRESS

char server[] = "172.20.10.3";   
IPAddress ip(172, 20, 10, 70);
EthernetClient client;

#define DHTPIN 2 // SENSOR PIN
#define DHTTYPE DHT11 // SENSOR TYPE - THE ADAFRUIT LIBRARY OFFERS SUPPORT FOR MORE MODELS
DHT dht(DHTPIN, DHTTYPE);

long previousMillis = 0;
unsigned long currentMillis = 0;
long interval = 250000; // READING INTERVAL

int t = 0;	// TEMPERATURE VAR
int h = 0;	// HUMIDITY VAR
String data;

void setup() { 
	Serial.begin(115200);
        Ethernet.begin(mac,ip);
	dht.begin(); 
	delay(10000); // GIVE THE SENSOR SOME TIME TO START

	h = (int) dht.readHumidity(); 
	t = (int) dht.readTemperature(); 

	data = "";
}

void loop(){

	currentMillis = millis();
	if(currentMillis - previousMillis > interval) { // READ ONLY ONCE PER INTERVAL
		previousMillis = currentMillis;
		h = (int) dht.readHumidity();
		t = (int) dht.readTemperature();
	}

          //data = "temp1=" + t + "&hum1=" + h;
          data+="";
  //data+="suhu=";
  //data+=(int) dht.readTemperature();
  //data+="&kelembapan=";
  //data+=(int) dht.readHumidity();
  Serial.print("Temperatur");
                  Serial.println(dht.readTemperature());
  Serial.print("Humidity");
  Serial.println(dht.readHumidity());
  
  Serial.println((int) dht.readTemperature());

	if (client.connect(server,80)) { 
		Serial.println("connected");
                client.print("GET /projekta/add.php"); 
		client.print("Host: 172.20.10.3"); // SERVER ADDRESS HERE TOO
		client.print("?suhu="); 
                client.print((int) dht.readTemperature());
		client.print("&kelembapan="); 
                client.print((int) dht.readHumidity());
		client.println();
	} 

	if (client.connected()) { 
		client.stop();	// DISCONNECT FROM THE SERVER
	}
        else {
           
            Serial.println("connection failed");
         }
	delay(1000); // WAIT FIVE MINUTES BEFORE SENDING AGAIN
}


