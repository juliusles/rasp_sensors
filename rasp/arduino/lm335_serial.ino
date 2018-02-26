

void setup() {
    Serial.begin(9600);
}

void loop() {
   // int raw = analogRead(0);
   //float mV = (raw / 1024.0) * 5000;
   // float K = mV / 10;
    //float C = K - 273.15;
    float c = random(16, 27);	//korvattava oikealla anturilla
    float h = random(0, 100);	// humidity
	float co2 = random(350, 1000); // ppm
	float co  = random(0, 35); 	// ppm
  int id    = random (1, 4);
	//  int l = random(0, 1023);//
    
    Serial.print("x");
    Serial.print(";");
    Serial.print(c);
    Serial.print(";");
    Serial.print(h);
    Serial.print(";");
    Serial.print(co2);
    Serial.print(";");
    Serial.print(co);
    Serial.print(";");
    Serial.println(id);
    //Serial.println(";");
    //Serial.println(l);
   
    delay(10000);
   }

 
